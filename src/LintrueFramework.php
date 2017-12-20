<?php
/**
 * Created by PhpStorm.
 * User: fbard
 * Date: 2017/12/19
 * Time: 17:12
 */

namespace lintrue\composer;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;
use Composer\Repository\InstalledRepositoryInterface;

class LintrueFramework extends LibraryInstaller
{
    public function install(InstalledRepositoryInterface $repo, PackageInterface $package)
    {
        parent::install($repo, $package);
    }

    public function getInstallPath(PackageInterface $package)
    {
        if ($this->composer->getPackage()) {
            $extra = $this->composer->getPackage()->getExtra();
            if (!empty($extra['static-path'])) {
                return $extra['static-path'];
            }
        }

        return 'public'.DIRECTORY_SEPARATOR.'static';
    }

    public function update(InstalledRepositoryInterface $repo, PackageInterface $initial, PackageInterface $target)
    {
        parent::update($repo, $initial, $target);
    }

    /**
     * 自定义的安装类型
     * @param $packageType
     * @return bool
     */
    public function supports($packageType)
    {
        return 'lintrue-static' === $packageType;
    }
}