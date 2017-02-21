$(document).ready(function () {
  var ttr = $("tbody tr");
  $("#btn0").click(function () {
    ttr.show();
  });
  $("#btn1").click(function () {
    ttr.hide();
    ttr.has("td:eq(2):contains('驱逐舰')").show();
  });
  $("#btn2").click(function () {
    ttr.hide();
    ttr.has("td:eq(2):contains('轻巡洋舰')").show();
    ttr.has("td:eq(2):contains('练习巡洋舰')").show();
    ttr.has("td:eq(2):contains('重雷装巡洋舰')").show();
  });
  $("#btn3").click(function () {
    ttr.hide();
    ttr.has("td:eq(2):contains('重巡洋舰')").show();
    ttr.has("td:eq(2):contains('航空巡洋舰')").show();
  });
  $("#btn4").click(function () {
    ttr.hide();
    ttr.has("td:eq(2):contains('正规空母')").show();
    ttr.has("td:eq(2):contains('装甲空母')").show();
    ttr.has("td:eq(2):contains('轻空母')").show();
  });
  $("#btn5").click(function () {
    ttr.hide();
    ttr.has("td:eq(2):contains('高速战舰')").show();
    ttr.has("td:eq(2):contains('低速战舰')").show();
    ttr.has("td:eq(2):contains('航空战舰')").show();
  });
  $("#btn6").click(function () {
    ttr.hide();
    ttr.has("td:eq(2):contains('潜水舰')").show();
    ttr.has("td:eq(2):contains('潜水空母')").show();
  });
  $("#btn7").click(function () {
    ttr.hide();
    ttr.has("td:eq(2):contains('扬陆舰')").show();
    ttr.has("td:eq(2):contains('工作舰')").show();
    ttr.has("td:eq(2):contains('水上机母舰')").show();
    ttr.has("td:eq(2):contains('补给舰')").show();
    ttr.has("td:eq(2):contains('潜水母舰')").show();
  });
  $("#btn8").click(function () {
    ttr.hide();
    ttr.has("td:eq(19):contains('藤波')").show();
    ttr.has("td:eq(19):contains('松風')").show();
    ttr.has("td:eq(19):contains('伊13')").show();
    ttr.has("td:eq(19):contains('伊14')").show();
  });
  $("#btn9").click(function () {
    $("table tr td:nth-child(17)").each(function (i) {
      if ($(this).text() != 0 && $(this).text() < 85 && $(this).text() != 15) {
        $("table tr:gt(0):eq(" + i + ")").hide();
      }
    });
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
            ttr.has("td:eq(19):contains('" + searchName + "')").show();
            ttr.has("td:eq(20):contains('" + searchName + "')").show();
            ttr.has("td:eq(21):contains('" + searchName + "')").show();
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
        ttr.has("td:eq(19):contains('" + searchName + "')").show();
        ttr.has("td:eq(20):contains('" + searchName + "')").show();
        ttr.has("td:eq(21):contains('" + searchName + "')").show();
      }
    }
    searchBox.val("");
  });
});