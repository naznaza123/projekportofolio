<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil', function (Blueprint $table) {
            
            $table->string('nis');
            $table->string('nama',40);
            $table->enum('jk',['L','P']);
            $table->string('ttl');
            $table->string('pendidikan');
            $table->text('alamat');
            $table->text('foto');
            $table->string('about');
            $table->primary('nis');
            
    
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
        Schema::dropIfExists('profil');
    }
}
