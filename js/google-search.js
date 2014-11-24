API_KEY = 'AIzaSyBGLLgFMR77pqPirmaguhmJrRgb7RUrSx0';
SEARCH_ENGINE = '015959128807523234003:qjqgbxttouw';
 

function customSearch(param){
    var host = "googlehost=google.com.br";
    var key  = "key="+API_KEY;
    var param = "q="+param;
    var cx = "cx="+SEARCH_ENGINE;
    urlSearch = "https://www.googleapis.com/customsearch/v1?"+key+"&"+cx+"&"+host+"&"+param;
    
    $.ajax({
        url:urlSearch,
        type:'GET',
        success:function(data){
            appendResult(data);
        },
        dataType:'json'
    });
}

function appendResult(data){
    $("#searchResult").html("");
    if(data.items.lenth == 0){
        $("#searchResult").text("Nenhum resultado encontrado");
    } else {
        var html = "<div class='contentNews-divider col-sm-6  col-xs-12'>";
        var metade =  5
        $(data.items).each(function(idx){
            html += " <div class='col-xs-12 contentNews'>";
            html += "<div><a href='"+this.link+"'>"+this.htmlTitle+"</a> | "+this.displayLink+"</div>";
            html += "<div>"+this.snippet+"</div>";
            html += "</div>";

            if((idx+1) == metade){
                html += "</div><div class='contentNews-divider col-sm-6  col-xs-12'>";
            }
        });
        html += "</div>";
        $("#searchResult").append(html);
    }
}



