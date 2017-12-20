<?php

namespace lintrue\composer;

use Composer\Composer;
use Composer\Installer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class Plugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $composer->getInstallationManager()->addInstaller(new LintrueFramework($io,$composer));
    }
}