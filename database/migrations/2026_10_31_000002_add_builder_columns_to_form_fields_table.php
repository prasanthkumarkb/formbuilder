<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('form_fields', function (Blueprint $table) {

            $table->string('placeholder')
                  ->nullable()
                  ->after('field_type');

            $table->string('default_value')
                  ->nullable()
                  ->after('placeholder');

            $table->text('help_text')
                  ->nullable()
                  ->after('default_value');

            $table->integer('min_length')
                  ->nullable()
                  ->after('help_text');

            $table->integer('max_length')
                  ->nullable()
                  ->after('min_length');

            $table->decimal('min_value', 12, 2)
                  ->nullable()
                  ->after('max_length');

            $table->decimal('max_value', 12, 2)
                  ->nullable()
                  ->after('min_value');

            $table->string('pattern')
                  ->nullable()
                  ->after('max_value');

            $table->string('context')
                  ->default('both')
                  ->after('pattern');

            $table->string('css_class')
                  ->nullable()
                  ->after('context');

            $table->integer('column_width')
                  ->default(12)
                  ->after('css_class');

            $table->boolean('is_active')
                  ->default(true)
                  ->after('column_width');

            $table->boolean('is_readonly')
                  ->default(false)
                  ->after('is_active');

            $table->boolean('is_hidden')
                  ->default(false)
                  ->after('is_readonly');

            $table->string('tooltip')
                  ->nullable()
                  ->after('is_hidden');

        });
    }

    public function down(): void
    {
        Schema::table('form_fields', function (Blueprint $table) {

            $table->dropColumn([
                'placeholder',
                'default_value',
                'help_text',
                'min_length',
                'max_length',
                'min_value',
                'max_value',
                'pattern',
                'context',
                'css_class',
                'column_width',
                'is_active',
                'is_readonly',
                'is_hidden',
                'tooltip'
            ]);

        });
    }
};