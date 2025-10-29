<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->unsignedBigInteger('departemen_id')->after('tanggal_masuk');
            $table->unsignedBigInteger('jabatan_id')->after('departemen_id');

            $table->foreign('departemen_id')
                ->references('id')
                ->on('departemens')
                ->constrained('departemens')
                ->onDelete('cascade');

            $table->foreign('jabatan_id')
                ->references('id')
                ->on('positions')
                ->constrained('positions')
                ->onDelete('cascade');

        });
    }

    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign(['departemen_id']);
            $table->dropForeign(['jabatan_id']);
            $table->dropColumn(['departemen_id', 'jabatan_id']);
        });
    }
};
