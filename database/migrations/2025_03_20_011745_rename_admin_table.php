<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Rename the table from 'admins' to 'admin'
        Schema::rename('admins', 'admin');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rollback by renaming 'admin' back to 'admins'
        Schema::rename('admin', 'admins');
    }
};
