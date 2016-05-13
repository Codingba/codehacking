<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhotoIdForUsers extends Migration
{

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('photo_id');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('photo_id');
        });
    }
}
