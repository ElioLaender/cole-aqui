var totalRescued = returnJson("?controller=Dashboard&action=allAwRescued");
$("#total-rescued").text(totalRescued[0]['COUNT(ar_id)']);

var sexInfo = returnJson("?controller=Dashboard&action=returnCountSex");
$("#total-client").text(sexInfo[0]['total']);
$("#percent-fem").text(sexInfo[0]['percentFem'].toFixed(1));
$("#percent-male").text(sexInfo[0]['percentMale'].toFixed(1));
$("#pm").attr("data-percent",sexInfo[0]['percentMale']);
$("#pf").attr("data-percent",sexInfo[0]['percentFem']);

var maxValue = returnJson("?controller=Dashboard&action=returnMaxValue");
$("#max-value").text("R$ "+maxValue[0]['SUM(releases_value)']);

var maxPoints = returnJson("?controller=Dashboard&action=totalPoints");
$("#max-points").text(maxPoints[0]['totalPoints'].toFixed(2)+" Pontos");

var valuePoint = returnJson("?controller=Dashboard&action=returnPointsValue");
$("#value-point").text("R$ "+valuePoint[0]['vtp_value_points']);

var spent = returnJson("?controller=Dashboard&action=spentSex");
$("#spent-fem").text("R$ "+spent[0]['fem']+" Reais");
$("#spent-male").text("R$ "+spent[0]['male']+" Reais");

$("#percent-spent-fem").text(spent[0]['percentFem'].toFixed(1));
$("#spent-spent-male").text(spent[0]['percentMale'].toFixed(1));

$("#psm").attr("data-percent",spent[0]['percentMale']);
$("#psf").attr("data-percent",spent[0]['percentFem']);