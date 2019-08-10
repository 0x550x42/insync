$(window).resize(function(){

    $("#title").css({
        position:'absolute',
        left: ($(window).width() - $("#title").outerWidth())/2,
        top: ($(window).height() - $("#title").outerHeight())/2
    });

});

$(window).resize();