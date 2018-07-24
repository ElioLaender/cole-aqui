$("#calc-points").click(function(){

    var pointsValue = returnJson("?controller=Dashboard&action=returnPointsValue");
    var inserValue = $("#value-score").val();
    var calcResult = inserValue/pointsValue[0]['vtp_value_points'];

    $("#resp").remove();

    if(inserValue == ''){
        $("#points-result").append("<span id='resp' style='color:red;'>Favor, inserir o valor da compra para que a conversão seja realizada.</span>");
    } else {
        $("#points-result").append("<span id='resp' style='color:forestgreen;'>O valor inserido será convertido em "+calcResult.toFixed(2)+" pontos.</span>");
    }

});