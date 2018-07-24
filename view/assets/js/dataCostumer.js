function _GET(name)
{
    var url   = window.location.search.replace("?", "");
    var itens = url.split("&");

    for(n in itens)
    {
        if( itens[n].match(name) )
        {
            return decodeURIComponent(itens[n].replace(name+"=", ""));
        }
    }
    return null;
}

var dataCostumer = returnJson("?controller=Dashboard&action=returnCostumer&client="+_GET("client"));
var pointsValue = returnJson("?controller=Dashboard&action=returnPointsValue");
$('#nameCli').val(dataCostumer[0]['client_name']);
$('#phoCli').val(dataCostumer[0]['client_phone']);
$('#emailCli').val(dataCostumer[0]['client_email']);
$('#cpfCli').val(dataCostumer[0]['client_cpf']);
$('#point-vlue-periodo').val(pointsValue[0]['vtp_value_points']);
$('#up').val(dataCostumer[0]['client_id']);



if(dataCostumer[0]['client_sex'] == 'M'){
    $('#opM').attr("checked", true);
} else {
    $('#opF').attr("checked", true);
}

function rows(){

    var dataRele = returnJson("?controller=Dashboard&action=viewReleases&ref="+_GET("client"));
    var html = "";
    var totalPoints = 0.00;

    if(dataRele == ""){
        html += "<br/><br/><p>Este cliente não possui lançamentos de pontuação.<p>";
    } else {

        html +=  "<div class='table-responsive'>"+
        "<table class='table table-striped'>"+
        "<thead>"+
        "<tr>"+
        "<th>Lançmento</th>"+
        "<th>Descrição</th>"+
        "<th>Valor lançamento</th>"+
        "<th>Valor ponto</th>"+
        "<th>Pontos Convertidos</th>"+
        "<th>Confirmado pelo cliente</th>"+
        "<th>Ultima Atualização</th>"+
        "</tr>"+
        "</thead>"+
        "<tbody id='fu'>";

        for(var i = 0; i<dataRele.length;i++){

            html+= "<tr>"+
            "<td>"+(i+1)+"</td>"+
            "<td>"+dataRele[i]['releases_description']+"</td>"+
            "<td>R$ "+dataRele[i]['releases_value']+"</td>"+
            "<td>R$ "+dataRele[i]['releases_value_points']+"</td>"+
            "<td>"+(dataRele[i]['releases_value']/dataRele[i]['releases_value_points']).toFixed(2)+"</td>"+
            "<td>"+dataRele[i]['releases_confirm']+"</td>"+
            "<td>"+dataRele[i]['releases_accession']+"</td>"+
            "</tr>";

            var teste = (dataRele[i]['releases_value']/dataRele[i]['releases_value_points']);
            totalPoints += teste;

        }

        html += "</tbody>"+
                "</table>";


        var avaliable = (totalPoints - 0);
        $("#lancer").text(totalPoints.toFixed(2));
        $("#avaliable").text(dataRele[0]['client_points']);

    }

    return html;

}

function awardsForRescue(){

    var dataWards = returnJson("?controller=Dashboard&action=awardsRescueCli&ref="+_GET('client'));
    var html = "";


    if(dataWards  == ""){
        html += "<br/><br/><p>Este cliente não possui prêmios disponíveis para resgate.<p>";
    }else {

        html += "<table class='table table-striped'>"+
        "<thead>"+
        "<tr>"+
        "<th>ID</th>"+
        "<th>Titulo</th>"+
        "<th>Pontos Necessários</th>"+
        "<th>Prêmio atualizado em</th>"+
        "<th>Disponível para Resgate</th>"+
        "</tr>"+
        "</thead>"+
        "<tbody >";

        for(var i = 0; i< dataWards.length;i++){

            html+= "<tr>"+
            "<td>"+(i+1)+"</td>"+
            "<td>"+dataWards[i]['awards_title']+"</td>"+
            "<td>"+dataWards[i]['awards_points']+"</td>"+
            "<td>"+dataWards[i]['awards_create']+"</td>"+
            "<td><a href='?controller=Dashboard&action=AwRescued&awRef="+dataWards[i]['awards_id']+"&cRef="+dataWards[i]['client_id']+"' class='zmdi zmdi-balance-wallet btn bgm-blue waves-effect'> Resgatar</a></td>"+
            "</tr>";

        }

        "</tbody>"+
        "</table>";


    }


    return html;


}



function awardsRes(){

    var rescued = returnJson("?controller=Dashboard&action=retResCli&cRef="+_GET('client'));
    var html = "";


   if(rescued == ""){

       html += "<br/><br/><p>Este cliente não possui prêmios resgatados.<p>";
       $("#rescue").text(0);
   } else {

       html += "<table class='table table-striped'>"+
       "<thead>"+
       "<tr>"+
       "<th>ID</th>"+
       "<th>Titulo</th>"+
       "<th>Pontuação Gasta</th>"+
       "<th>Resgatado Em</th>"+
       "</tr>"+
       "</thead>"+
       "<tbody>";

        var sun = parseFloat(0);

       for(var i = 0; i< rescued.length;i++){

           html+= "<tr>"+
           "<td>"+(i+1)+"</td>"+
           "<td>"+rescued[i]['awards_title']+"</td>"+
           "<td>"+rescued[i]['awards_points']+"</td>"+
           "<td>"+rescued[i]['ar_data_rescue']+"</td>"+
           "</tr>";


           sun +=  parseFloat(rescued[i]['awards_points']);


       }

       html +=   "</tbody>"+
       "</table>";


           $("#rescue").text(sun);


   }




    return html;


}





$("#rescued-history").append(awardsRes());
$("#fu").append(rows());
$("#awards-rescue").append(awardsForRescue());









