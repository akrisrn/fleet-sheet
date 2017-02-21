<?php

require "libs/smarty/Smarty.class.php";
require "libs/tool.php";
require "configs/cache-conf.php";
require "configs/db-conf.php";

$smarty = new Smarty;

$smarty->caching = $caching;
$smarty->cache_lifetime = $cache_lifetime;

$smarty->assign("title", "远征列表");
$smarty->assign("type", "mission");
$smarty->assign("search", "远征名");

$smarty->assign("button", array(
  array("btn0", "显示全部", "button big primary", "#"),
  array("btn1", "镇守府海域", "button big", "#"),
  array("btn2", "南西诸岛海域", "button big", "#"),
  array("btn3", "北方海域", "button big", "#"),
  array("btn4", "西方海域", "button big", "#"),
  array("btn5", "南方海域", "button big", "#")
));

$con = new mysqli($db_host, $db_user, $db_password, $db_name);
mysqli_query($con, 'set names utf8');
$query = "select  api_maparea_id,api_use_fuel,api_time,api_win_item1_0,api_win_item1_1,
                  api_win_item2_0,api_win_item2_1,api_id,api_use_bull,api_name,
                  api_difficulty,api_name_s,api_remark
          from mission";
$result = $con->query($query);
$tbody = array();
$id = 0;
while ($row = $result->fetch_array()) {
  $item = "";
  if ($row["api_win_item1_0"] != 0) {
    $item .= tool::convertItem($row["api_win_item1_0"]) . " x " .
      $row["api_win_item1_1"] . "、";
  }
  if ($row["api_win_item2_0"] != 0) {
    $item .= tool::convertItem($row["api_win_item2_0"]) . " x " .
      $row["api_win_item2_1"] . "、";
  }
  $item = substr($item, 0, strlen($item) - 3);
  $tbody[] = array(
    $row["api_id"],
    $row["api_name_s"],
    tool::convertArea($row["api_maparea_id"]),
    $item,
    tool::convertTime($row["api_time"]),
    tool::convertCost($row["api_use_fuel"]),
    tool::convertCost($row["api_use_bull"]),
    $row["api_difficulty"],
    $row["api_name"],
    $row["api_remark"]
  );
}
$con->close();

$smarty->assign("thead", array(
  "ID",
  "远征名",
  "海域名",
  "可获得道具",
  "时间",
  "消耗燃料",
  "消耗弹药",
  "难度",
  "远征名(日文)",
  "备注"
));
$smarty->assign("tbody", $tbody);

$url = md5($_SERVER['REQUEST_URI']);
$smarty->display('show.tpl', $url);