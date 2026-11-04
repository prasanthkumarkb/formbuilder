<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('form_fields')) {
        Schema::create('form_fields', function (Blueprint $table) {

            $table->id();

            $table->foreignId('form_id')
                ->constrained('forms')
                ->onDelete('cascade');

            $table->string('label');

            $table->string('field_name');

            $table->string('field_type');

            $table->boolean('required')
                ->default(false);

            $table->string('validation_rules')
                ->nullable();

            $table->text('options')
                ->nullable();

            $table->integer('sort_order')
                ->default(0);

            $table->timestamps();
        });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('form_fields');
    }
};