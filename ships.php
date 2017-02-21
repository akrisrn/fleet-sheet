<?php

require "libs/smarty/Smarty.class.php";
require "libs/tool.php";
require "configs/cache-conf.php";
require "configs/db-conf.php";

$smarty = new Smarty;

$smarty->caching = $caching;
$smarty->cache_lifetime = $cache_lifetime;

$smarty->assign("title", "舰娘列表");
$smarty->assign("type", "ships");
$smarty->assign("search", "舰名");

$smarty->assign("button", array(
  array("btn0", "显示全部", "button big primary", "#"),
  array("btn1", "驱逐舰", "button big", "#"),
  array("btn2", "轻巡系", "button big", "#"),
  array("btn3", "重巡系", "button big", "#"),
  array("btn4", "空母系", "button big", "#"),
  array("btn5", "战舰系", "button big", "#"),
  array("btn6", "潜水系", "button big", "#"),
  array("btn7", "其他系", "button big", "#"),
  array("btn8", "新实装船", "button big", "#"),
  array("btn9", "不显示初期舰", "button big danger", "#")
));

$con = new mysqli($db_host, $db_user, $db_password, $db_name);
mysqli_query($con, 'set names utf8');
$query = "select  api_name,api_yomi,api_name_s,api_remark,api_stype,api_taik_0,
                  api_houg_1,api_raig_1,api_tyku_1,api_souk_1,api_luck_0,api_luck_1,api_soku,
                  api_leng,api_maxeq_0,api_maxeq_1,api_maxeq_2,api_maxeq_3,api_fuel_max,
                  api_bull_max,api_buildtime,api_afterlv,api_afterfuel,api_afterbull
          from ships";
$result = $con->query($query);
$tbody = array();
$id = 0;
while ($row = $result->fetch_array()) {
  $id++;
  $maxeq = $row["api_maxeq_0"] + $row["api_maxeq_1"] + $row["api_maxeq_2"] + $row["api_maxeq_3"];
  $tbody[] = array(
    $id,
    $row["api_name_s"],
    tool::convertShipType($row["api_stype"]),
    $row["api_taik_0"],
    ($row["api_houg_1"] + $row["api_raig_1"]),
    $row["api_houg_1"],
    $row["api_raig_1"],
    $row["api_tyku_1"],
    $row["api_souk_1"],
    $row["api_luck_0"] . "(" . $row["api_luck_1"] . ")",
    $maxeq . "(" . $row["api_maxeq_0"] . "/" . $row["api_maxeq_1"] . "/"
    . $row["api_maxeq_2"] . "/" . $row["api_maxeq_3"] . ")",
    tool::convertSoku($row["api_soku"]),
    tool::convertLeng($row["api_leng"]),
    $row["api_fuel_max"],
    $row["api_bull_max"],
    tool::convertTime($row["api_buildtime"]),
    $row["api_afterlv"],
    $row["api_afterfuel"],
    $row["api_afterbull"],
    $row["api_name"],
    $row["api_yomi"],
    $row["api_remark"],
    tool::initShip($row["api_name_s"])
  );
}
$con->close();

$smarty->assign("thead", array(
  "ID",
  "舰名",
  "类型",
  "耐久",
  "火雷值",
  "火力",
  "雷装",
  "对空",
  "装甲",
  "运(满运)",
  "搭载",
  "速力",
  "射程",
  "满油",
  "满弹",
  "建造时间",
  "改造等级",
  "改造需钢",
  "改造需弹",
  "舰名(日文)",
  "舰名(平假名)",
  "备注",
  "初期舰"
));
$smarty->assign("tbody", $tbody);

$url = md5($_SERVER['REQUEST_URI']);
$smarty->display('show.tpl', $url);