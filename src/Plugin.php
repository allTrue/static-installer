<?php

namespace lintrue\composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class Plugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $composer->getPluginManager()->addInstaller(new LintrueFramework($io,$composer));
    }
}