<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('form_fields', function (Blueprint $table) {

            $table->unsignedBigInteger('screen_id')
                  ->nullable()
                  ->after('form_id');

            $table->unsignedBigInteger('section_id')
                  ->nullable()
                  ->after('screen_id');

        });
    }

    public function down(): void
    {
        Schema::table('form_fields', function (Blueprint $table) {

            $table->dropColumn([
                'screen_id',
                'section_id'
            ]);

        });
    }
};