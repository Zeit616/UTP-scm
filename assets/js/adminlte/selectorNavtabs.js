$(".nav-link").on("click", function(){
    $(".tab-pane").removeClass("show");
    $(".tab-pane").removeClass("active");
    $(this).addClass("show active");
});