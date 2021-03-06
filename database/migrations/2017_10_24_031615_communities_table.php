<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communities_table', function (Blueprint $table){
           $table->increments('id');//コミュニティID
           $table->string('community_title',255);//コミュニティ名
           $table->text('community_contents');//コミュニティコンテンツ
           $table->integer('authority_id');//権限ID
           $table->timestamps();
           $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('communities_table');
    }
}
