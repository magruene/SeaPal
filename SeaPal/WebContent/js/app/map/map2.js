function CallURL(){
       $.ajax({

    url: 'https://www.googleapis.com/freebase/v1/text/en/bob_dylan',


    type: "GET",
    dataType: "jsonp",
    async:false,
     success: function (msg) {
         JsonpCallback(msg);
    },
    error: function () {
        ErrorFunction();
    }

});

}


function JsonpCallback(json)
{
 document.getElementById('summary').innerHtml=json.result;

}