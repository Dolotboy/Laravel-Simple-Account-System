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
        Schema::create('zuser', function (Blueprint $table) {
            $table->id('iduser');
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->string('salt');
            $table->boolean('emailConfirmed');
            $table->date('lastConnection')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zuser');
    }
};
