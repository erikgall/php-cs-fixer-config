<?php

namespace ErikGall\PhpCsFixer\Commands;

use Illuminate\Console\Command;

/**
 * Install the PHP-CS-Fixer config command.
 *
 * @author Erik Galloway <erikgalloway8@gmail.com>
 */
class InstallPhpCsFixer extends Command
{
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the PHP-CS-Fixer configuration.';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fixer:install';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->hasConfig()) {
            return $this->error('PHP-CS-Fixer config already exists!');
        }

        if (! $this->copyStubToProject()) {
            return $this->line("\u{274C} Error: PHP-CS-Fixer config could not be created.");
        }

        $this->info("\u{2705} PHP-CS-Fixer config (.php_cs) file created successfully.");
    }

    /**
     * Copy the stub file to the root of the project.
     *
     * @return bool
     */
    protected function copyStubToProject(): bool
    {
        return copy(
            $this->getStub(),
            $this->laravel->basePath('.php_cs')
        );
    }

    /**
     * Get the PHP-CS-Fixer config file stub path.
     *
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__.'/stubs/php_cs.stub';
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
