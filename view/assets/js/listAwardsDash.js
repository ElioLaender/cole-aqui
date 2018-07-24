

function listAwardsForTrade(){

    var allCli = returnJson("?controller=Dashboard&action=returnAwards");
    var html = "";

    for(var i=0;i<allCli.length;i++){




        html += "<div class='card bs-item z-depth-2'>"+

        "<div class='card-header paiPro'>"+
            "<ul class='actions'>"+
                "<li class='dropdown action-show'>"+
                    "<a href='#' data-toggle='dropdown'>"+
                        "<i style='#' class='zmdi zmdi-more-vert'></i>"+
                    "</a>"+

                    "<ul class='dropdown-menu dropdown-menu-right'>"+
                        "<li>"+
                        "<a class='zmdi zmdi-edit' href=''> Editar</a>"+
                        "</li>"+
                        "<li>"+
                           "<a class='zmdi zmdi-delete' href=''> Excluir</a>"+
                        "</li>"+
                    "</ul>"+
                "</li>"+
            "</ul>"+
                "<span><i class='zmdi zmdi-bookmark-outline'> Título - </i> "+allCli[i]['awards_title']+"</span>"+
                "<span><i class='zmdi zmdi-star'> Pontuação -  </i> Resgate com "+allCli[i]['awards_points']+" Pontos"+
                "<span><i class='zmdi zmdi-calendar-alt'> Criado em - </i> "+allCli[i]['awards_create']+" Horas</span>"+
                "<span><i class='zmdi zmdi-badge-check'> Quantidades de regates - </i> "+allCli[i]['awards_rescue_amount']+"</span>"+
        "</div>"+
        "</div>";

    }

    return html;
}



$("#fu").append(listAwardsForTrade());

