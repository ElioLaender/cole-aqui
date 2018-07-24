
function rowNotifications(){

    var allnt = returnJson("?controller=Dashboard&action=allNotifi");
    var html = "";



    for(var i=0;i<allnt.length;i++){

        html += "<tr>"+
        "<td>"+(i+1)+"</td>"+
        "<td>"+allnt[i]['notifications_title']+"</td>"+
        "<td>"+allnt[i]['notifications_description']+"</td>"+
        "<td>"+allnt[i]['notifications_view']+"</td>"+
        "<td>"+allnt[i]['notifications_data']+"</td>"+
        "<td><a href='"+allnt[i]['notifications_url']+"&notRef="+allnt[i]['notifications_id']+"'><span class=\"zmdi zmdi-edit\"></span> Visualizar</a></td>"+
        "</tr>";

    }


    return html;


}

$("#fu").append(rowNotifications());