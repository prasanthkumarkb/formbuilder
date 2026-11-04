<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('form_sections')) {
            Schema::create('form_sections', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('form_id');

            $table->unsignedBigInteger('screen_id');

            $table->string('code');

            $table->string('name');

            $table->integer('sort_order')
            ->default(0);

            $table->timestamps();

            $table->foreign('form_id')
            ->references('id')
            ->on('forms')
            ->onDelete('cascade');

            $table->foreign('screen_id')
            ->references('id')
            ->on('form_screens')
            ->onDelete('cascade');
            });
            }
    }

    public function down(): void
    {
        Schema::dropIfExists('form_sections');
    }
};
