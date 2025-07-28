<?php

use App\Enums\EventStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();

            $table->string('title');
            $table->text('description')->nullable();

            $table->string('avatar')->nullable();
            $table->string('video_url')->nullable();
            $table->string('audio_url')->nullable();

            $table->date('start_date');
            $table->time('start_time');

            $table->date('end_date')->nullable();
            $table->time('end_time')->nullable();

            $table->enum('status', EventStatus::values())->index()->default(EventStatus::SCHEDULED->value);

            $table->boolean('is_live')->default(false);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
