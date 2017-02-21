<?php

class tool
{
  static function convertShipType($type)
  {
    switch ($type) {
      case 1:
        return "海防舰";
      case 2:
        return "驱逐舰";
      case 3:
        return "轻巡洋舰";
      case 4:
        return "重雷装巡洋舰";
      case 5:
        return "重巡洋舰";
      case 6:
        return "航空巡洋舰";
      case 7:
        return "轻空母";
      case 8:
        return "高速战舰";
      case 9:
        return "低速战舰";
      case 10:
        return "航空战舰";
      case 11:
        return "正规空母";
      case 12:
        return "超弩级战舰";
      case 13:
        return "潜水舰";
      case 14:
        return "潜水空母";
      case 15:
        return "补给舰";
      case 16:
        return "水上机母舰";
      case 17:
        return "扬陆舰";
      case 18:
        return "装甲空母";
      case 19:
        return "工作舰";
      case 20:
        return "潜水母舰";
      case 21:
        return "练习巡洋舰";
      case 22:
        return "补给舰";
      default:
        return "未知";
    }
  }

  static function convertEquipType($type)
  {
    switch ($type) {
      case 1:
        return "小口径主炮";
      case 2:
        return "中口径主炮";
      case 3:
        return "大口径主炮";
      case 4:
        return "副炮";
      case 5:
        return "鱼雷";
      case 6:
        return "舰上战斗机";
      case 7:
        return "舰上爆击机";
      case 8:
        return "舰上攻击机";
      case 9:
        return "舰上侦查机";
      case 10:
        return "水上侦查机";
      case 11:
        return "水上爆击机";
      case 12:
        return "小型电探";
      case 13:
        return "大型电探";
      case 14:
        return "声呐";
      case 15:
        return "爆雷";
      case 16:
        return "追加装甲";
      case 17:
        return "机关部强化";
      case 18:
        return "对空强化弹";
      case 19:
        return "对舰强化弹";
      case 20:
        return "VT信管";
      case 21:
        return "对空机枪";
      case 22:
        return "特殊潜航艇";
      case 23:
        return "应急修理要员";
      case 24:
        return "上陆用舟艇";
      case 25:
        return "自转旋翼机";
      case 26:
        return "对潜哨戒机";
      case 27:
        return "追加装甲(中型)";
      case 28:
        return "追加装甲(大型)";
      case 29:
        return "探照灯";
      case 30:
        return "简易输送部材";
      case 31:
        return "舰艇修理设施";
      case 32:
        return "潜水舰鱼雷";
      case 33:
        return "照明弹";
      case 34:
        return "司令部设施";
      case 35:
        return "航空要员";
      case 36:
        return "高射装置";
      case 37:
        return "对地装备";
      case 38:
        return "大口径主炮（II）";
      case 39:
        return "水上舰要员";
      case 40:
        return "大型声呐";
      case 41:
        return "大型飞行艇";
      case 42:
        return "大型探照灯";
      case 43:
        return "战斗粮食";
      case 44:
        return "补给物资";
      case 45:
        return "水上战斗机";
      case 46:
        return "特型内火艇";
      case 47:
        return "陆上攻击机";
      case 48:
        return "局地战斗机";
      case 93:
        return "大型电探（II）";
      case 94:
        return "舰上侦查机（II）";
      default:
        return "未知";
    }
  }

  static function convertSoku($soku)
  {
    if ($soku == 5) {
      return "低速";
    } else {
      return "高速";
    }
  }

  static function convertLeng($leng)
  {
    switch ($leng) {
      case 0:
        return "无";
      case 1:
        return "短";
      case 2:
        return "中";
      case 3:
        return "长";
      case 4:
        return "超长";
      default:
        return "未知";
    }
  }

  static function convertTime($time)
  {
    if ($time >= 60) {
      $hour = floor($time / 60);
      $min = $time % 60;
      if ($min == 0) {
        return $hour . "h";
      } else {
        return $hour . "h" . $min . "m";
      }
    } else {
      return $time . "m";
    }
  }

  static function convertArea($area)
  {
    switch ($area) {
      case 1:
        return "镇守府海域";
      case 2:
        return "南西诸岛海域";
      case 3:
        return "北方海域";
      case 4:
        return "西方海域";
      case 5:
        return "南方海域";
      case 6:
        return "中部海域";
      default:
        return "活动海域";
    }
  }

  static function convertItem($item)
  {
    switch ($item) {
      case 1:
        return "高速修复材";
      case 2:
        return "高速建造材";
      case 3:
        return "开发资材";
      case 10:
        return "家具箱(小)";
      case 11:
        return "家具箱(中)";
      case 12:
        return "家具箱(大)";
      case 31:
        return "燃料";
      case 32:
        return "弹药";
      case 33:
        return "钢材";
      case 34:
        return "铝材";
      default:
        return "其他";
    }
  }

  static function convertCost($cost)
  {
    if ($cost == 0) {
      return 0;
    } else {
      return $cost * 100 . "%";
    }
  }

  static function initShip($ship)
  {
    return preg_replace("/改.*|航| zwei| drei/", "", $ship);
  }
}