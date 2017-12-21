# static-installer
composer-plugin 
## Overview
composer 自定义 *lintrue-static* 安装类型安装器，只要定义包类型为 *lintrue-static* ，并将此包加入依赖，即可使用此安装器
## Usage
```
{
  ...
  "type":"lintrue-static",
  "extra":{
    "static-path":"public/static",//安装路径
  }
  ...
}
```
