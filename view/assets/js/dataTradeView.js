//Retorna dados para os inputs da página de gerência da empresa.

//Dados da empresa
var dataTrade = returnJson("?controller=Dashboard&action=returnTradeInfo");

$("#name").val(dataTrade[0]['trade_name']);
$("#cnpj").val(dataTrade[0]['trade_cnpj']);
$("#boxes").val(dataTrade[0]['trade_boxes']);
$("#phone").val(dataTrade[0]['trade_phone']);
$("#address").val(dataTrade[0]['trade_address']);
$("#complement").val(dataTrade[0]['trade_complement']);
$("#district").val(dataTrade[0]['trade_district']);
$("#city").val(dataTrade[0]['trade_city']);
$("#state").val(dataTrade[0]['trade_state']);
$("#tradeProfile").attr("src",dataTrade[0]['trade_image']);
$("#nameTrade").text(dataTrade[0]['trade_name']);
//Dados do usuário da empresa
var dataUserTrade = returnJson("?controller=Dashboard&action=tradeUserData");
$("#userName").val(dataUserTrade[0]['tu_name']);
$("#userEmail").val(dataUserTrade[0]['tu_email']);

