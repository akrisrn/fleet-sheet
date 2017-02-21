$(document).ready(function () {
  var ttr = $("tbody tr");
  $("#btn0").click(function () {
    ttr.show();
  });
  $("#btn1").click(function () {
    ttr.hide();
    ttr.has("td:eq(2):contains('小口径主炮')").show();
    ttr.has("td:eq(2):contains('中口径主炮')").show();
    ttr.has("td:eq(2):contains('大口径主炮')").show();
    ttr.has("td:eq(2):contains('大口径主炮（II）')").show();
  });
  $("#btn2").click(function () {
    ttr.hide();
    ttr.has("td:eq(2):contains('副炮')").show();
  });
  $("#btn3").click(function () {
    ttr.hide();
    ttr.has("td:eq(2):contains('鱼雷')").show();
    ttr.has("td:eq(2):contains('潜水舰鱼雷')").show();
  });
  $("#btn4").click(function () {
    ttr.hide();
    ttr.has("td:eq(2):contains('小型电探')").show();
    ttr.has("td:eq(2):contains('大型电探')").show();
    ttr.has("td:eq(2):contains('大型电探（II）')").show();
  });
  $("#btn5").click(function () {
    ttr.hide();
    ttr.has("td:eq(2):contains('舰上战斗机')").show();
    ttr.has("td:eq(2):contains('舰上爆击机')").show();
    ttr.has("td:eq(2):contains('舰上攻击机')").show();
    ttr.has("td:eq(2):contains('舰上侦查机')").show();
    ttr.has("td:eq(2):contains('舰上侦查机（II）')").show();
  });
  $("#btn6").click(function () {
    ttr.hide();
    ttr.has("td:eq(2):contains('水上侦查机')").show();
    ttr.has("td:eq(2):contains('水上爆击机')").show();
    ttr.has("td:eq(2):contains('大型飞行艇')").show();
    ttr.has("td:eq(2):contains('水上战斗机')").show();
  });
  $("#btn7").click(function () {
    ttr.hide();
    ttr.has("td:eq(2):contains('陆上攻击机')").show();
    ttr.has("td:eq(2):contains('局地战斗机')").show();
  });
  $("#btn8").click(function () {
    ttr.hide();
    ttr.has("td:eq(2):contains('声呐')").show();
    ttr.has("td:eq(2):contains('爆雷')").show();
    ttr.has("td:eq(2):contains('自转旋翼机')").show();
    ttr.has("td:eq(2):contains('对潜哨戒机')").show();
    ttr.has("td:eq(2):contains('大型声呐')").show();
  });
  $("#btn9").click(function () {
    ttr.hide();
    ttr.has("td:eq(2):contains('对空机枪')").show();
    ttr.has("td:eq(2):contains('高射装置')").show();
  });
  $("#btn10").click(function () {
    ttr.hide();
    ttr.has("td:eq(2):contains('上陆用舟艇')").show();
    ttr.has("td:eq(2):contains('特型内火艇')").show();
    ttr.has("td:eq(2):contains('对地装备')").show();
  });
  $("#btn11").click(function () {
    ttr.hide();
    ttr.has("td:eq(2):contains('追加装甲')").show();
    ttr.has("td:eq(2):contains('追加装甲(中型)')").show();
    ttr.has("td:eq(2):contains('追加装甲(大型)')").show();
    ttr.has("td:eq(2):contains('机关部强化')").show();
    ttr.has("td:eq(2):contains('对舰强化弹')").show();
    ttr.has("td:eq(2):contains('对空强化弹')").show();
    ttr.has("td:eq(2):contains('应急修理要员')").show();
  });
  $("#btn12").click(function () {
    ttr.hide();
    ttr.has("td:eq(2):contains('VT信管')").show();
    ttr.has("td:eq(2):contains('探照灯')").show();
    ttr.has("td:eq(2):contains('简易输送部材')").show();
    ttr.has("td:eq(2):contains('舰艇修理设施')").show();
    ttr.has("td:eq(2):contains('照明弹')").show();
    ttr.has("td:eq(2):contains('司令部设施')").show();
    ttr.has("td:eq(2):contains('航空要员')").show();
    ttr.has("td:eq(2):contains('水上舰要员')").show();
    ttr.has("td:eq(2):contains('大型探照灯')").show();
    ttr.has("td:eq(2):contains('战斗粮食')").show();
    ttr.has("td:eq(2):contains('补给物资')").show();
    ttr.has("td:eq(2):contains('特殊潜航艇')").show();
  });
  $("#btn13").click(function () {
    ttr.hide();
    ttr.has("td:eq(15):contains('Lat� 298B')").show();
    ttr.has("td:eq(15):contains('SBD')").show();
    ttr.has("td:eq(15):contains('TBD')").show();
    ttr.has("td:eq(15):contains('F4F-3')").show();
    ttr.has("td:eq(15):contains('F4F-4')").show();
  });
  $("#searchBtn").click(function () {
    var searchBox = $("#searchBox");
    var searchText = $.trim(searchBox.val());
    var searchName, searchNum;
    if (searchText != "") {
      searchText = searchText.split(/,|，/);
      if (parseInt(searchText) == searchText) {
        ttr.hide();
        searchNum = searchText - 1;
        $("table tr:gt(0):eq(" + searchNum + ")").show();
      } else if (searchText.length > 1) {
        ttr.hide();
        for (var i = 0; i < searchText.length; i++) {
          if (parseInt(searchText[i]) == searchText[i]) {
            searchNum = searchText[i] - 1;
            $("table tr:gt(0):eq(" + searchNum + ")").show();
          } else {
            searchName = searchText[i].toLowerCase();
            ttr.has("td:eq(1):contains('" + searchName + "')").show();
            ttr.has("td:eq(15):contains('" + searchName + "')").show();
            ttr.has("td:eq(16):contains('" + searchName + "')").show();
          }
        }
      } else if (searchText[0].match(/^\d+-\d+$/)) {
        var tmp = searchText[0].split("-");
        var first = tmp[0];
        var last = tmp[1];
        ttr.hide();
        for (var j = first - 1; j < last; j++) {
          $("table tr:gt(0):eq(" + j + ")").show();
        }
      } else {
        searchName = searchText[0].toLowerCase();
        ttr.hide();
        ttr.has("td:eq(1):contains('" + searchName + "')").show();
        ttr.has("td:eq(15):contains('" + searchName + "')").show();
        ttr.has("td:eq(16):contains('" + searchName + "')").show();
      }
    }
    searchBox.val("");
  });
});