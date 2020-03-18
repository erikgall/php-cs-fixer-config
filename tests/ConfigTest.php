<?php

namespace ErikGall\PhpCsFixer\Tests;

use ErikGall\PhpCsFixer\Config;
use PhpCsFixer\ConfigInterface;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    /**
     * The Config instance being tested.
     *
     * @var \ErikGall\PhpCsFixer\Config
     */
    protected $config;

    /**
     * Setup the testing environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->config = new Config();
    }

    /** @test */
    public function it_disables_using_the_php_cs_fixer_cache_by_default(): void
    {
        $this->assertFalse($this->config->getUsingCache());
    }

    /** @test */
    public function it_enables_risky_fixers_by_default(): void
    {
        $this->assertTrue($this->config->getRiskyAllowed());
    }

    /** @test */
    public function it_implements_the_php_cs_fixer_config_interface(): void
    {
        $this->assertInstanceOf(ConfigInterface::class, $this->config);
    }

    /** @test */
    public function it_sets_the_php_cs_fixer_config_name(): void
    {
        $this->assertEquals(Config::CONFIG_NAME, $this->config->getName());
    }

    /** @test */
    public function it_sets_the_rules_from_the_config_rules_file(): void
    {
        $rules = require __DIR__.'/../config/rules.php';

        $this->assertEquals($rules, $this->config->getRules());
    }
}
