<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFileStrorageChangeId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('file_storage', function (Blueprint $table) {
            $table->string('id',32)->change();
            $table->text('name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('file_storage', function (Blueprint $table) {
            $table->bigInteger('id',20)->change();
            $table->dropColumn('name');


        });
    }
}
