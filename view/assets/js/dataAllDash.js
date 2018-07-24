//Retorna e seta os dados a serem compartilhados em todas as telas do dashboard.

//seta nome e imagem.
var dataTrade = returnJson("?controller=Dashboard&action=returnTradeInfo");
$("#tradeProfile").attr("src",dataTrade[0]['trade_image']);
$("#nameTrade").text(dataTrade[0]['trade_name']);


//gera os alerts
var alerts = returnJson("?controller=Dashboard&action=returnNotifications");
var html = "";

for(var i=0;i<alerts.length;i++){

    html+="<a class='lv-item' href='"+alerts[i]['notifications_url']+"&notRef="+alerts[i]['notifications_id']+"'>"+
            "<div class='media'>"+
            "<div class='pull-left'>"+
            "</div>"+
            "<div class='media-body'>"+
            "<div class='lv-title'>"+alerts[i]['notifications_title']+"</div>"+
            "<small class='lv-small'>"+alerts[i]['notifications_description']+"</small>"+
            "</div>"+
            "</div>"+
            "</a>";

}

if(alerts.length > 0){
    $("#ss").append("<i  class='tm-icon zmdi zmdi-notifications'></i> <i id='counts-notification' class='tmn-counts'>"+alerts.length+"</i>");
} else {
    $("#ss").append("<i  class='tm-icon zmdi zmdi-notifications'></i>");
}

$("#count-notification").text("Notificações ("+alerts.length+")");
$("#alerts-notification").append(html);





