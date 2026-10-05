<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('logs', 'tipo')) {
            return;
        }
        
        Schema::table('logs', function (Blueprint $table) {
            $table->string('tipo', 20)->default('error')->after('id_usuario');
        });
    }

    public function down(): void
    {
        Schema::table('logs', function (Blueprint $table) {
            $table->dropColumn('tipo');
        });
    }
};