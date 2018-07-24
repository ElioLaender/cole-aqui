

$("#subPass").click(function() {


    if(upLog()){

        //envia para o back
        $.post("index.php", {
                controller: "Dashboard",
                action: "updateUserData",
                pass: $("#newPass2").val(),
                name: $("#userName").val(),
                email: $("#userEmail").val()

            },

            function (result) {

                $("#returnPass").addClass("alert alert-success");
                $("#returnPass").html(result);

            });



    } else {

        $("#returnPass").addClass("alert alert-danger");
        $("#returnPass").html("As senhas informadas não são iguais, tente novamente.");
    }


});

function upLog(){

    $newPass1 = $("#newPass1").val();
    $newPass2 = $("#newPass2").val();

    if($newPass1 == $newPass2){

        return true;

    } else {

        return false;
    }

}

$("#returnPass").click(function() {

    $("#returnPass").removeClass("alert alert-success");
    $("#returnPass").html("");
    $("#newPass1").val("");
    $("#newPass2").val("");

});

