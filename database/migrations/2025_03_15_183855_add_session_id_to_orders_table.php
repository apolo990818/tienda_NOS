<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('orders', function (Blueprint $table) {
       // $table->string('session_id')->nullable()->after('estado'); // Agrega la columna
       $table->string('session_id')->nullable();

    });
}

public function down()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->dropColumn('session_id');
    });
}

    
};
