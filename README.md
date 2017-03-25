# MW-YunGenTie
163 YunGenTie for MediaWiki

在维基上使用[网易云跟帖](https://gentie.163.com/)服务

## Installation
* Clone the respository, rename it to YunGenTie and copy to extensions folder
* Add `require_once "$IP/extensions/YunGenTie/YunGenTie.php";` to your LocalSettings.php
* Done

## Configuration
* `$wgYunGenTieEnabled = true;` 开启云跟帖功能
* `$wgYunGenTieNamespaces = array( NS_MAIN, NS_USER );` 选择使用云跟帖的命名空间，对讨论页、分类和文件命名空间无效
* `$wgYunGenTieClassName = 'cloud-tie-wrapper';` 云跟帖所在div的ClassName，默认就好
* `$wgYunGenTieProductKey = '';` 云跟帖提供的ProductKey，必须写上
* `$wgYunGenTieLoaderKey = '';` 云跟帖提供的JS中的Loader里还有一个Key，也需要写上
* 另外可在`MediaWiki:Yungentie-header`设定评论框上的标题内容，默认为`访客评论`

## Caution
网易云跟帖有少量设计缺陷和潜在安全漏洞，慎用
