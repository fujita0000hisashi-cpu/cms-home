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
        Schema::table('users', function (Blueprint $table) {
            $table->string('name_kana')->after('name');
            $table->string('phone')->after('password');
            $table->string('zipcode', 7)->after('phone');
            $table->string('prefecture')->after('zipcode');
            $table->string('city')->after('prefecture');
            $table->string('address')->after('city');
            $table->text('remarks')->nullable()->after('address');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
