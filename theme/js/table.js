$(document).ready(function () {
  var myTextExtraction = function (node) {
    var s = node.innerHTML.replace(/(^\s*)|(\s*$)/g, "");
    if (s.indexOf('(') > 0) {
      s = s.substring(0, s.indexOf('('));
    } else if (s == "补给舰" || s == "超长" || s == "镇守府海域") {
      s = 0;
    } else if (s == "练习巡洋舰" || s == "长" || s == "南西诸岛海域") {
      s = 1;
    } else if (s == "潜水母舰" || s == "中" || s == "北方海域") {
      s = 2;
    } else if (s == "工作舰" || s == "短" || s == "西方海域") {
      s = 3;
    } else if (s == "装甲空母" || s == "无" || s == "南方海域") {
      s = 4;
    } else if (s == "扬陆舰" || s == "中部海域") {
      s = 5;
    } else if (s == "水上机母舰" || s == "活动海域") {
      s = 6;
    } else if (s == "潜水空母") {
      s = 7;
    } else if (s == "潜水舰") {
      s = 8;
    } else if (s == "正规空母") {
      s = 9;
    } else if (s == "航空战舰") {
      s = 10;
    } else if (s == "低速战舰") {
      s = 11;
    } else if (s == "高速战舰") {
      s = 12;
    } else if (s == "轻空母") {
      s = 13;
    } else if (s == "航空巡洋舰") {
      s = 14;
    } else if (s == "重巡洋舰") {
      s = 15;
    } else if (s == "重雷装巡洋舰") {
      s = 16;
    } else if (s == "轻巡洋舰") {
      s = 17;
    } else if (s == "驱逐舰") {
      s = 18;
    } else {
      var re = /^(\d+)h(\d+)m$|^(\d+)h$|^(\d+)m$/;
      var g = s.match(re);
      if (g != null) {
        var h = 0, m = 0;
        if (g[1] != null) {
          h = g[1];
        } else if (g[3] != null) {
          h = g[3];
        }
        if (g[2] != null) {
          m = g[2];
        } else if (g[4] != null) {
          m = g[4];
        }
        s = h * 60 + m * 1;
      }
    }
    return s;
  };
  $("#showTable").tablesorter({textExtraction: myTextExtraction});

  var cellIndex, rowIndex;
  $("#showTable tr > td").hover(function () {
    cellIndex = this.cellIndex + 1;
    rowIndex = this.parentNode.rowIndex;
    $("#showTable tr:nth-child(" + rowIndex + ") > td").css({"background-color": "#EEE", "color": "#3c8dde"});
    $("#showTable tr:nth-child(" + rowIndex + ") > td a").css({"color": "#3c8dde"});
    $("#showTable tr td:nth-child(" + cellIndex + ")").css({"background-color": "#EEE", "color": "#3c8dde"});
    $("#showTable tr td:nth-child(" + cellIndex + ") a").css({"color": "#3c8dde"});
    $(this).css("background-color", "lightsteelblue");
  }, function () {
    $("#showTable tr:nth-child(" + rowIndex + ") > td").css({"background-color": "#FFF", "color": "#000"});
    $("#showTable tr:nth-child(" + rowIndex + ") > td a").css({"color": "#000"});
    $("#showTable tr td:nth-child(" + cellIndex + ")").css({"background-color": "#FFF", "color": "#000"});
    $("#showTable tr td:nth-child(" + cellIndex + ") a").css({"color": "#000"});
  });
});