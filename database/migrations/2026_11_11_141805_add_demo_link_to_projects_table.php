<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // nullable = boleh kosong (tidak wajib diisi)
            $table->string('demo_link')->nullable()->after('image');
            $table->string('repo_link')->nullable()->after('demo_link');
            $table->string('tech_stack')->nullable()->after('repo_link');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['demo_link', 'repo_link', 'tech_stack']);
        });
    }
};