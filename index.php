<?php

require "libs/smarty/Smarty.class.php";
require "configs/cache-conf.php";

$smarty = new Smarty;

$smarty->caching = $caching;
$smarty->cache_lifetime = $cache_lifetime;

$smarty->assign("title", "舰表");
$smarty->assign("type", "index");

$cover_dir = "theme/img/cover/";
$covers = scandir(dirname(__FILE__) . "/" . $cover_dir);
array_splice($covers, 0, 2);
$ran = rand(1, count($covers)) - 1;

$smarty->assign("content", array("
<h2>Fleet-Sheet(舰表)</h2>
<p>一个综合统计舰队collection游戏数据的网站，正在建设中。如果有什么意见欢迎在下面评论框中提出。</p>
<h2>简单介绍</h2>
<ul>
  <li>数据相关
    <ul>
      <li>舰娘数据 - 已录入</li>
      <li>装备数据 - 已录入(附深海)</li>
      <li>海图数据 - 已录入</li>
      <li>远征数据 - 已录入</li>
    </ul>
  </li>
  <li>检索相关
    <ul>
      <li>搜索均支持输入中文和日文，舰娘搜索额外支持平假名</li>
      <li>英文部分不区分大小写</li>
      <li>支持部分模糊搜索</li>
      <li>支持按序号搜索(如输入“1”、“1,2,3”、“1-10”之类)</li>
    </ul>
  </li>
  <li>分组与排序
    <ul>
      <li>点击表头上方对应的按钮分组查看</li>
      <li>点击表头可以排序</li>
    </ul>
  </li>
  <li>其他
    <ul>
      <li>本站只提供游戏基础数据，查询攻略请移步百科</li>
      <li>点击舰娘或装备名可直接跳转到萌百相关词条</li>
      <li>手机访问建议横屏</li>
      <li>背景图P站ID：" . split("_", $covers[$ran])[0] . "(两分钟一刷)</li>
      <li><div class='black'>↑东方图为主，舰图是彩蛋【不对</div></li>
    </ul>
  </li>
</ul>
", $cover_dir . $covers[$ran]));

$url = md5($_SERVER['REQUEST_URI']);
$smarty->display('index.tpl', $url);