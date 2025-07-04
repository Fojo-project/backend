@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
    <img src="https://fojo-frontend.vercel.app/_next/image?url=%2Fimages%2Fhome%2Flogo.png&w=128&q=75" class="logo" alt="Logo">
@else
{!! $slot !!}
@endif
</a>
</td>
</tr>
