<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->increments('id');
            $table->text('groupName');
            $table->text('links');
            $table->text('categories')->nullable();
            $table->integer('subscribers')->nullable();
            $table->integer('reachingYourAudience')->nullable();
            $table->integer('unicVisitors')->nullable();
            $table->double('price',10,4);
            $table->double('priceWithDiscount',10,4);
            $table->text('requisitesPurse')->nullable();
            $table->text('requisites')->nullable();
            $table->text('dateWhenPostWasPublishedTextFormat');
            $table->text('numberNamePost');
            $table->text('screenshot')->nullable();
            $table->integer('numberOfPost')->nullable();
            $table->text('canWeComment')->nullable();
            $table->integer('reposts')->nullable();
            $table->integer('likes')->nullable();
            $table->text('statusForCurrentPublications')->nullable();
            $table->text('comments')->nullable();
            $table->text('nameAndSurname');
            $table->text('adminContact');
            $table->text('answersFromTheAdvertisers')->nullable();
            $table->text('idPostOnOurAdvertisingPlatform')->nullable();
            $table->text('linksToFotoOrPostForMyAdvert')->nullable();
            $table->text('idPostOnAdvertisingPlatform')->nullable();
            $table->text('statusForPayment')->nullable();
            $table->text('colors')->nullable();
            $table->text('nameOfGoalForCurrentMonth')->nullable();
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
        Schema::drop('publications');
    }
}
