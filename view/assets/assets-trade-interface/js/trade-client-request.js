function returnJson(link){

    var retorno;

    $.ajax({
        url: link,
        type:   "post",
        dataType:"json",
        data:   "",
        async: false,

        success: function(data){
            retorno = data;

        }
    });

    return retorno;
}