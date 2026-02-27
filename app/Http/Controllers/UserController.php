<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function adminIndex(Request $request)
    {
        $users = User::query()
            ->with('roles:id,name')
            ->when($request->filled('search'), function ($query) use ($request) {
                $term = '%' . mb_strtolower(trim($request->search)) . '%';
                $query->where(function ($q) use ($term) {
                    $q->whereRaw('LOWER(full_name) LIKE ?', [$term])
                        ->orWhereRaw('LOWER(email) LIKE ?', [$term]);
                });
            })
            ->when($request->filled('role'), function ($query) use ($request) {
                $query->role($request->role);
            })
            ->when($request->filled('verified'), function ($query) use ($request) {
                $request->boolean('verified')
                    ? $query->whereNotNull('email_verified_at')
                    : $query->whereNull('email_verified_at');
            })
            ->when($request->filled('from'), fn($q) => $q->whereDate('created_at', '>=', $request->from))
            ->when($request->filled('to'),   fn($q) => $q->whereDate('created_at', '<=', $request->to))
            ->orderBy(
                in_array($request->sort_by, ['full_name', 'email', 'created_at'])
                    ? $request->sort_by
                    : 'created_at',
                $request->sort_dir === 'asc' ? 'asc' : 'desc'
            )
            ->select(['id', 'full_name', 'email', 'avatar', 'email_verified_at', 'created_at'])
            ->paginate($request->input('per_page', 15));

        $users->through(fn(User $user) => tap($user, function () use ($user) {
            $user->role = $user->roles->first()?->name;
            unset($user->roles);
        }));

        return $this->paginatedResponse($users, 'Users fetched successfully', 200);
    }
}
