<?php

use ErikGall\PhpCsFixer\Config;

/**
 * PHP-CS-Fixer configuration.
 *
 * @author Erik Galloway <erikgalloway8@gmail.com>
 */
$config = new Config();

$config->getFinder()->in(__DIR__);

$config->getFinder()->append(['.php_cs']);

return $config;
