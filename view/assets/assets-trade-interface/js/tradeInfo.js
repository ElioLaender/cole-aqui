//seta nome e imagem.
var dataTrade = returnJson("?controller=Dashboard&action=returnTradeInfo");

$("#tradeProfile").attr("src",dataTrade[0]['trade_image']);
$("#nameTrade").text("e ganhe prêmios aqui com a "+dataTrade[0]['trade_name']);
