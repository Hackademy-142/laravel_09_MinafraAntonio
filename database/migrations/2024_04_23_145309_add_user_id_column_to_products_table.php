<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('user_id')->nullable()->after('price');//definire una colonna con dentro un dato intero numerico molto grande solo numeri positivi

            $table->foreign('user_id')->references('id')->on('users'); //per collegare la colonna dei prodotti all id degli user


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->dropForeign(['user_id']);//elimino il collegamento
            $table->dropColumn('user_id');//elimino la colonna
        });
    }
};
