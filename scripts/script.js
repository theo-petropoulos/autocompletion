window.search='';

$(function(){
    //Set focus on search bar
    $("#search_input").focus();

    //Catch enter and delete keys
    $("#search_input").on({
        'keydown':function(e){
            if(e.which=='13'){
                e.preventDefault();
                $("#search_submit").trigger('click');
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
            complete = $('#search_input').val();
            if(complete.length>0){
                var post=$.post('/autocompletion/php/search.php',
                {
                    complete:complete
                })
                .done(function(data,status){
                    try{
                        let results=JSON.parse(data);
                        $("#results_box p").remove();
                        $(results).each(function(arrkey, object){
                            $("#results_box").prepend(
                                '<p class="searchp" id="searchp' + arrkey + '">' + complete + '<span class="chars_left">' + object['nom'].substr(complete.length) + '</span></p>'
                            );
                        clearTimeout(clear);
                        });
                    }catch (e){
                        return false;
                    }
                    if($("#results_box p").length>1){
                        $("#search_input").css({
                            "border-bottom-right-radius":"0",
                            "border-bottom-left-radius":"0"
                        });
                    }
                })
                .fail(function(){
                    clog('not sent')
                })
            }
        },
        'blur':function(e){
            $(document).unbind().on('click', function(e){
                if($(e.target).attr('id')!==$("#search_input").attr('id')) $("#results_box").empty();
                if($(e.target).is('.searchp, .searchp span')){
                    $(e.target).is('span') ? 
                        $("#search_input").val($("#search_input").val() + $(e.target).html()) :
                            $("#search_input").val($("#search_input").val() + $(e.target).find('span').html())
                }
            });
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
    });
});

function clog(x){
    return console.log(x);
}