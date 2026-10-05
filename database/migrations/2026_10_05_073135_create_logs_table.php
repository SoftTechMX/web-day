<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('logs')) {
            return;
        }
        
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->text('mensaje');
            $table->unsignedBigInteger('linea');
            $table->string('archivo', 250);
            $table->unsignedBigInteger('id_usuario')->nullable(true);
            $table->timestamps();

            $table->foreign('id_usuario')
                  ->references('id')
                  ->on('users')
                  ->onDelete('CASCADE')
                  ->onUpdate('CASCADE');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
