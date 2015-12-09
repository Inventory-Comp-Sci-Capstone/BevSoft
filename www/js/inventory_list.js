$(document).ready(function(){
    var output = $('#output');     

    $.ajax({

        url: 'http://127.0.0.1/DBconnect.php',

        dataType: 'jsonp',

        jsonp: 'jsoncallback',

        timeout: 5000,

        success: function(data, status){

            $.each(data, function(i,item){

                var landmark = '<h1>'+item.name+'</h1>'

                + '<p>'+item.brand_id+'<br>'

                + item.type_id+'</p>';

                 

                output.append(landmark);

            });

        },

        error: function(){

            output.text('There was an error loading the data.');

        }

    });
});
