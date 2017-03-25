# MW-YunGenTie
163 YunGenTie for MediaWiki

在维基上使用[网易云跟帖](https://gentie.163.com/)服务

## Dependencies
* 头像功能需要[SocialProfile](https://www.mediawiki.org/wiki/Extension:SocialProfile)

## Installation
* Clone the respository, rename it to YunGenTie and copy to extensions folder
* Add `require_once "$IP/extensions/YunGenTie/YunGenTie.php";` to your LocalSettings.php
* Done
* 本扩展只支援用户信息接口功能，用户信息接口填写`http[s]://维基地址/api.php?action=tie&format=json&callback=`
## Configuration
* `$wgYunGenTieEnabled = true;` 开启云跟帖功能
* `$wgYunGenTieNamespaces = array( NS_MAIN, NS_USER );` 选择使用云跟帖的命名空间，对讨论页、分类和文件命名空间无效
* `$wgYunGenTieClassName = 'cloud-tie-wrapper';` 云跟帖所在div的ClassName，默认就好
* `$wgYunGenTieProductKey = '';` 云跟帖提供的ProductKey，必须写上
* `$wgYunGenTieLoaderKey = '';` 云跟帖提供的JS中的Loader里还有一个Key，也需要写上
* 另外可在`MediaWiki:Yungentie-header`设定评论框上的标题内容，默认为`访客评论`

## Caution
网易云跟帖有少量设计缺陷和潜在安全漏洞，慎用
* 云跟帖会对MW api提出请求，获取当前登录用户的信息（用户名、用户ID和头像），但会要求以JSONP格式返回，会有安全风险。MW api设计中就有返回JSONP的功能，但同时会禁用用户登录功能，防止泄漏用户信息。而本扩展绕过了此限制
* 获取登录信息后云跟帖并不会进行任何Cookie缓存，也不会使用ajax缓存，意味着每次打开一个页面都会请求一次API


