<?php

namespace ErikGall\PhpCsFixer\Commands;

use Exception;
use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

/**
 * Run the PHP-CS-Fixer fix command.
 *
 * @author Erik Galloway <erikgalloway8@gmail.com>
 */
class RunPhpCsFixer extends Command
{
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the PHP-CS-Fixer configuration.';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (! $this->hasConfig()) {
            return $this->error('No config file found -- run install command [php artisan fixer:install]');
        }

        $process = (new Process(
            [PHP_BINARY, 'vendor/bin/php-cs-fixer', 'fix'],
        ))->setTimeout(null);

        try {
            $this->info("\u{1F4DD} Linting & Fixing Files...");

            $process->run(function ($type, $line): void {
                $this->output->write($line);
            });

            return $this->info("\u{2705} Linting & Fixing Complete...");
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    /**
     * Determine if the PHP-CS-Fixer config exists in the current working directory.
     *
     * @return bool
     */
    protected function hasConfig(): bool
    {
        if (file_exists($this->laravel->basePath('.php_cs'))) {
            return true;
        }

        return file_exists($this->laravel->basePath('.php_cs.dist'));
    }
}
