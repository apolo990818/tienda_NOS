<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGuestIdToChatMessagesTable extends Migration
{
    public function up()
    {
        Schema::table('chat_messages', function (Blueprint $table) {
            $table->string('guest_id')->nullable()->after('user_id');
        });
    }

    public function down()
    {
        Schema::table('chat_messages', function (Blueprint $table) {
            $table->dropColumn('guest_id');
        });
    }
}
