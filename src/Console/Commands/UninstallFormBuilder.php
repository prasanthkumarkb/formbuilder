<?php

namespace Prasanth\FormBuilder\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class UninstallFormBuilder extends Command
{
    protected $signature = 'formbuilder:uninstall {--force : Skip confirmation}';

    protected $description = 'Remove Form Builder database tables';

    public function handle(): int
    {
        if (! $this->option('force')) {
            if (! $this->confirm('This will permanently remove all Form Builder tables and data. Continue?')) {
                return self::SUCCESS;
            }
        }

        Schema::disableForeignKeyConstraints();

        $tables = [
            'form_fields',
            'form_sections',
            'form_screens',
            'forms',
        ];

        foreach ($tables as $table) {
            Schema::dropIfExists($table);
            $this->info("Dropped table: {$table}");
        }

        Schema::enableForeignKeyConstraints();

        $this->info('Form Builder uninstalled successfully.');

        return self::SUCCESS;
    }
}