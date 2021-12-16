$(document).ready(function(){
    $('.dscription').each(function(f){
        var newstr = $(this).text().substring(0,100);
        $(this).text(newstr);
    });
});

 