<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {

            $table->increments('id');
            // website contact information
            $table->string('title');
            $table->string('subtitle');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('fax');
            $table->string('pobox');
            $table->string('map');

            // About your website
            $table->text('desc');
            $table->string('photo')->nullable();
            $table->enum('maintenance',['open','close']);
            $table->text('keywords')->nullable();
            $table->string('copyright')->nullable();

            // Social media
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('linkedin');
            $table->string('youtube');

            $table->string('updated_by');
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
        Schema::drop('settings');
    }
}
