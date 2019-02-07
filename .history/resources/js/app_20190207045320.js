//This is for js scripts that are not using Vue.js

//Custom jQuery

$(".open_close_dropdown").on("click", function (event) {
    event.preventDefault();
    
    if ($(".has-treeview").hasClass("menu-open")) {
        //open
        $(".has-treeview").removeClass("menu-open");
        $(".nav-treeview").slideUp();
    }
});

$(".other_dropdown_menu").on("click", function (event) {
    event.preventDefault();

    if(!$(this).hasClass("menu-open")){
        $('.has-treeview').not(this).each(function(){
            $(".has-treeview").removeClass("menu-open");
            $(".nav-treeview").slideUp();
        });
    }    
});

$("#one_love").on("click", function (event) {
    event.preventDefault();

    if(!$(this).hasClass("menu-open")){
        $('.has-treeview').not(this).each(function(){
            $(".has-treeview").removeClass("menu-open");
            $(".nav-treeview").slideUp();
        });
    }    
});