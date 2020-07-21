<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVinylModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vinyls', function (Blueprint $table) {
            $table->id();
            $table->string('vinylName');
            $table->string('bandName');
            $table->string('label');
            $table->string('musicGenre');
            $table->string('musicGenrePrimary');
            $table->string('vinylCover')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        DB::connection('mysql')->table('vinyls')->insert([
            [
                'vinylName' => 'Led Zeppelin 1 (2014 Vinyl Reissue)',
                'bandName' => 'Led Zeppelin',
                'label' => 'Atlantic / Swan Song / Warner',
                'musicGenre' => 'Rock / Hard Rock',
                'musicGenrePrimary' => 'Pop / Rock',
                'vinylCover' => '',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vinyl_models');
    }
}
