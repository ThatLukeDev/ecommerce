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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('address1')->nullable()->change();
            $table->string('address2')->nullable()->change();
            $table->string('postcode')->nullable()->change();
            $table->string('county')->nullable()->change();
            $table->string('city')->nullable()->change();
            $table->string('country')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('address1')->change();
            $table->string('address2')->change();
            $table->string('postcode')->change();
            $table->string('county')->change();
            $table->string('city')->change();
            $table->string('country')->change();
        });
    }
};
