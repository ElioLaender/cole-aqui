


function rowAllCli(){

    var allCli = returnJson("?controller=Dashboard&action=cliAll");
    var html = "";

    for(var i=0;i<allCli.length;i++){

    html += "<tr>"+
            "<td>"+allCli[i]['client_id']+"</td>"+
            "<td>"+allCli[i]['client_name']+"</td>"+
            "<td>"+allCli[i]['client_cpf']+"</td>"+
            "<td>"+allCli[i]['client_points']+"</td>"+
            "<td>"+allCli[i]['client_points']+"</td>"+
            "<td>"+allCli[i]['client_accession']+"</td>"+
            "</tr>";

    }

    return html;
}

$("#fu").append(rowAllCli());


