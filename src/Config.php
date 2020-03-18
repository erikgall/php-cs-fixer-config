<?php

namespace ErikGall\PhpCsFixer;

use PhpCsFixer\Config as BaseConfig;

/**
 * PHP-CS-Fixer configuration manager.
 *
 * @author Erik Galloway <erikgalloway8@gmail.com>
 */
class Config extends BaseConfig
{
    /**
     * Constant representing the php-cs-fixer configuration name.
     */
    public const CONFIG_NAME = 'erikgall';

    /**
     * Constant representing the relative path to the rules config file.
     */
    public const RULES_PATH = '../config/rules.php';

    /**
     * Create a new Config instance.
     */
    public function __construct()
    {
        parent::__construct(static::CONFIG_NAME);

        $this->boot();
    }

    /**
     * Setup and configure the instance.
     *
     * @return void
     */
    protected function boot(): void
    {
        $this->setUsingCache(false)
            ->setRiskyAllowed(true)
            ->setRules($this->getConfig());
    }

    /**
     * Load the configuration rules file.
     *
     * @return array
     */
    protected function getConfig(): array
    {
        return require $this->getConfigPath();
    }

    /**
     * Get the configuration file's path.
     *
     * @return string
     */
    protected function getConfigPath(): string
    {
        return __DIR__.'/'.static::RULES_PATH;
    }
}
