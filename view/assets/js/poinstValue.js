function poinstValue(){
    var pointsValue = returnJson("?controller=Dashboard&action=returnPointsValue");
    var calcExValue = (pointsValue[0]['vtp_value_points'] * 4);
    var calcExPoints = (calcExValue/pointsValue[0]['vtp_value_points']);
    $(".point-value").text(pointsValue[0]['vtp_value_points']);
    $("#points").text(calcExPoints);
    $("#calcExValue").text(calcExValue);
}
poinstValue();

