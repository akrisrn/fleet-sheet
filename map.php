<?php

require "libs/smarty/Smarty.class.php";
require "libs/tool.php";
require "configs/cache-conf.php";
require "configs/db-conf.php";

$smarty = new Smarty;

$smarty->caching = $caching;
$smarty->cache_lifetime = $cache_lifetime;

$smarty->assign("title", "海域列表");
$smarty->assign("type", "map");
$smarty->assign("search", "海图名");

$smarty->assign("button", array(
  array("btn0", "显示全部", "button big primary", "#"),
  array("btn1", "镇守府海域", "button big", "#"),
  array("btn2", "南西诸岛海域", "button big", "#"),
  array("btn3", "北方海域", "button big", "#"),
  array("btn4", "西方海域", "button big", "#"),
  array("btn5", "南方海域", "button big", "#"),
  array("btn6", "中部海域", "button big", "#")
));

$con = new mysqli($db_host, $db_user, $db_password, $db_name);
mysqli_query($con, 'set names utf8');
$query = "select  api_item_0,api_item_1,api_item_2,api_item_3,api_id,
                  api_required_defeat_count,api_name,api_maparea_id,
                  api_max_maphp,api_level,api_name_s,api_remark
          from map_info";
$result = $con->query($query);
$tbody = array();
$id = 0;
while ($row = $result->fetch_array()) {
  $item = "";
  if ($row["api_item_0"] != 0) {
    $item .= tool::convertItem($row["api_item_0"]) . "、";
  }
  if ($row["api_item_1"] != 0) {
    $item .= tool::convertItem($row["api_item_1"]) . "、";
  }
  if ($row["api_item_2"] != 0) {
    $item .= tool::convertItem($row["api_item_2"]) . "、";
  }
  if ($row["api_item_3"] != 0) {
    $item .= tool::convertItem($row["api_item_3"]) . "、";
  }
  $item = substr($item, 0, strlen($item) - 3);
  if ($row["api_required_defeat_count"] == 0) {
    $row["api_required_defeat_count"] = 1;
  }
  $tbody[] = array(
    $row["api_id"],
    $row["api_name_s"],
    tool::convertArea($row["api_maparea_id"]),
    $item,
    $row["api_level"],
    $row["api_required_defeat_count"],
    $row["api_max_maphp"],
    $row["api_name"],
    $row["api_remark"],
  );
}
$con->close();

$smarty->assign("thead", array(
  "ID",
  "海图名",
  "海域名",
  "可获得资源",
  "难度",
  "需击破次数",
  "海图血量",
  "海图名(日文)",
  "备注"
));
$smarty->assign("tbody", $tbody);

$url = md5($_SERVER['REQUEST_URI']);
$smarty->display('show.tpl', $url);