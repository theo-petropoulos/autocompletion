window.search='';

$(function(){
    //Set focus on search bar
    $("#search_input").focus();

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
            let clear=setTimeout(() => {
                $("#results_box").empty();
            }, 40);
            search = $('#search_input').val();
            if(search.length>0){
                var post=$.post('php/search.php',
                {
                    search:search
                })
                .done(function(data,status){
                    let results=JSON.parse(data);
                    $("#results_box p").remove();
                    $(results).each(function(arrkey, object){
                        $("#results_box").prepend('<p>' + search + '<span class="chars_left">' + object['nom'].substr(search.length) + '</span></p>');
                        clearTimeout(clear);
                    });
                    $("#search_input").css({
                        "border-bottom-right-radius":"0",
                        "border-bottom-left-radius":"0"
                    });
                });
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
            $("#search_input").css({
                "border-bottom-right-radius":"8px",
                "border-bottom-left-radius":"8px"
            });
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