<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::dropIfExists('saved_jobs'); // Drop if exists
        Schema::create('saved_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('job_id')->constrained('jobs')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['user_id', 'job_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('saved_jobs');
    }
};
