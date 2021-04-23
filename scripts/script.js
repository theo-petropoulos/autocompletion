$(function(){

    //Catch enter and delete keys
    $("#search_input").on({
        'keydown':function(e){
            if(e.which=='13'){
                e.preventDefault();
                //
                // ACTION ON ENTER
                //
            }
            if(e.which=='46' || e.which=='8'){
                //
                // ACTION ON DELETE
                //
            }
        },
        'keyup':function(e){
            $("#results_box").empty();
            search = $('#search_input').val();
            if(search.length>2){
                var post=$.post('php/search.php',
                {
                    search:search
                },function(data,status){
                    let results=JSON.parse(data);
                    $("#results_box").empty();
                    $(results).each(function(arrkey, object){
                        $("#results_box").prepend('<p>' + object['nom'] + '</p>')
                    })
                })
                // .done(function(){
                //     clog('sent')
                // })
                // .fail(function(){
                //     clog('not sent')
                // })
                // .always(function(){
                //     clog('anyway')
                // })
            }
        },
        'blur':function(e){
            $("#results_box").empty();
        },
        'focus':function(e){
            if(search!==undefined) $("#search_input").trigger('keyup');
        }
    });

    //Prevent form submit
    $("#search_form").on('submit', function(e){
        e.preventDefault();
    });
});

function clog(x){
    return console.log(x);
}