$(document).ready(function () {
  var ttr = $("tbody tr");
  $("#btn0").click(function () {
    ttr.show();
  });
  $("#btn1").click(function () {
    ttr.hide();
    ttr.has("td:eq(2):contains('镇守府海域')").show();
  });
  $("#btn2").click(function () {
    ttr.hide();
    ttr.has("td:eq(2):contains('南西诸岛海域')").show();
  });
  $("#btn3").click(function () {
    ttr.hide();
    ttr.has("td:eq(2):contains('北方海域')").show();
  });
  $("#btn4").click(function () {
    ttr.hide();
    ttr.has("td:eq(2):contains('西方海域')").show();
  });
  $("#btn5").click(function () {
    ttr.hide();
    ttr.has("td:eq(2):contains('南方海域')").show();
  });
  $("#btn6").click(function () {
    ttr.hide();
    ttr.has("td:eq(2):contains('中部海域')").show();
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
            ttr.has("td:eq(7):contains('" + searchName + "')").show();
            ttr.has("td:eq(8):contains('" + searchName + "')").show();
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
        ttr.has("td:eq(7):contains('" + searchName + "')").show();
        ttr.has("td:eq(8):contains('" + searchName + "')").show();
      }
    }
    searchBox.val("");
  });
});