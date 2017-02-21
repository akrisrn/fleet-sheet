<?php

require "libs/smarty/Smarty.class.php";
require "libs/tool.php";
require "configs/cache-conf.php";
require "configs/db-conf.php";

$smarty = new Smarty;

$smarty->caching = $caching;
$smarty->cache_lifetime = $cache_lifetime;

$smarty->assign("title", "深海装备列表");
$smarty->assign("type", "equip");
$smarty->assign("search", "装备名");

$smarty->assign("button", array(
  array("btn0", "显示全部", "button big primary", "#"),
  array("btn1", "主炮系", "button big", "#"),
  array("btn2", "副炮系", "button big", "#"),
  array("btn3", "鱼雷系", "button big", "#"),
  array("btn4", "电探系", "button big", "#"),
  array("btn5", "舰载机", "button big", "#"),
  array("btn6", "水上机", "button big", "#"),
  array("btn8", "对潜系", "button big", "#"),
  array("btn9", "对空系", "button big", "#"),
  array("btn11", "强化系", "button big", "#"),
  array("btn12", "其他系", "button big", "#")
));

$con = new mysqli($db_host, $db_user, $db_password, $db_name);
mysqli_query($con, 'set names utf8');
$query = "select  api_distance,api_saku,api_leng,api_tais,api_baku,api_raig,
                  api_tyku,api_houg,api_name,api_houm,
                  api_houk,api_souk,api_type_2,api_name_s,api_remark
          from equipment where api_id > 500";
$result = $con->query($query);
$tbody = array();
$id = 0;
while ($row = $result->fetch_array()) {
  $q = "SELECT group_concat(api_remark) 
        FROM ship_type 
        WHERE api_equip_type_" . $row["api_type_2"] . " = 1";
  $r = $con->query($q);
  $o = $r->fetch_row();
  $id++;
  $tbody[] = array(
    $id,
    $row["api_name_s"],
    tool::convertEquipType($row["api_type_2"]),
    $row["api_houg"],
    $row["api_houm"],
    $row["api_houk"],
    $row["api_souk"],
    $row["api_tyku"],
    $row["api_baku"],
    $row["api_raig"],
    $row["api_saku"],
    $row["api_tais"],
    tool::convertLeng($row["api_leng"]),
    $row["api_distance"],
    str_replace(",", "、", $o[0]),
    $row["api_name"],
    $row["api_remark"]
  );
}
$con->close();
$smarty->assign("thead", array(
  "id",
  "装备名",
  "装备类型",
  "火力",
  "命中",
  "回避",
  "装甲",
  "对空",
  "爆装",
  "雷装",
  "索敌",
  "对潜",
  "射程",
  "航程",
  "可装备舰",
  "装备名(日文)",
  "备注"
));
$smarty->assign("tbody", $tbody);

$url = md5($_SERVER['REQUEST_URI']);
$smarty->display('show.tpl', $url);