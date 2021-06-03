<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditMeetinglog2342342 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meeting_logs', function (Blueprint $table) {
            $table->string('id', 32)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meeting_logs', function (Blueprint $table) {
            $table->bigInteger('id')->change();
        });
    }
}
