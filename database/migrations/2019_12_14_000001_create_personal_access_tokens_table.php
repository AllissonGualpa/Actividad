<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
    
            // Especificar longitud máxima para tokenable_type
            $table->string('tokenable_type', 191);
    
            // Cambiar a unsignedBigInteger para tokenable_id
            $table->unsignedBigInteger('tokenable_id');
    
            // Aquí cambiamos la forma en que se crea el índice
            $table->index(['tokenable_type', 'tokenable_id']);
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
