$(document).ready(function() {
    $("#mobileMenu").click(function() {
        $(".menu").toggle();
    });
    $('select').not('#businessForm select').sSelect();
    $('#businessForm select').each(function () {
            frontPages.custom_select2.init($(this));    
    });
});