var cpfGlob = "";

function returnCliForCpf(cpf){
    var dataClient = returnJson("?controller=Client&action=returnCli&cpf="+cpf);
    $("#name-cli").text("Olá "+dataClient[0]['client_name']);
    $("#pts-client").text(dataClient[0]['client_points']);
    $("#img-trade").attr("src",dataClient[0]['trade_image']);
    $(".nomeEmpresa").text(dataClient[0]['trade_name']);
    cpfGlob = cpf;
    awardsGeneretor();
}

$("#cadastre").click(function(){

    if($("#cpf").val() == ""){
        $(".soN").text("O campo cpf deve ser preenchido");
    } else if(returnJson("?controller=Client&action=returnCli&cpf="+$("#cpf").val()) == ""){
        $(".soN").text("CPF não cadastrado nesta empresa");
    }

    returnCliForCpf($("#cpf").val());
});

function awardsGeneretor(){
    var dataAwards = returnJson("?controller=Dashboard&action=returnAwards");
    var html = "";
    for(var i=0;i<dataAwards.length;i++){
        html += "<p>"+dataAwards[i]['awards_title']+"<span>"+dataAwards[i]['awards_points']+"</span> <i></i></p>";
    }
    $("#pre-generetor").append(html);
}

function confirm(cpf) {
        var confirm = returnJson("?controller=Dashboard&action=releaseConfirm&cpf=" + cpf);
        $("#more-points").text("+"+confirm.toFixed(2));
}

$("#finali").click(function(){
    confirm(cpfGlob);
});



