<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('poule_user', function (Blueprint $table) {
            $table->foreignId('poule_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->primary(['poule_id', 'user_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('poule_user');
    }
};
