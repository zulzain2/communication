<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFolderUserSharingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folder_user_sharing', function (Blueprint $table) {
            $table->char('id' , 32);
            $table->char('id_folder',32);
            $table->char('id_users_from',32);
            $table->char('id_users_to',32);
            $table->tinyInteger('id_status');
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
        Schema::dropIfExists('folder_user_sharing');
    }
}
