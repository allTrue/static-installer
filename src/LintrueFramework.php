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

    /**
     * 定义安装路径
     * @param PackageInterface $package
     * @return mixed|string
     */
    public function getInstallPath(PackageInterface $package)
    {
        if ($this->composer->getPackage()) {
            $extra = $package->getExtra();
            if(empty($extra)){
                $extra = $this->composer->getPackage()->getExtra();
            }
            if (!empty($extra['static-path'])) {
                $extra['static-path'] = str_replace(['/','\\'],DIRECTORY_SEPARATOR,
                    trim('\\',trim('/',$extra['static-path'])));
                return $extra['static-path'];
            }
        }else{
            echo 'installing package to default path:public'.DIRECTORY_SEPARATOR.'static....';
        }

        return 'public'.DIRECTORY_SEPARATOR.'static';
    }

    /**
     * @param InstalledRepositoryInterface $repo
     * @param PackageInterface $initial
     * @param PackageInterface $target
     */
    public function update(InstalledRepositoryInterface $repo, PackageInterface $initial, PackageInterface $target)
    {
        parent::update($repo, $initial, $target);
    }

    /**
     * 支持的自定义的安装类型 lintrue-static
     * @param $packageType
     * @return bool
     */
    public function supports($packageType)
    {
        return 'lintrue-static' === $packageType;
    }
}