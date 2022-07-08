var $ = jQuery.noConflict();
$(document).ready(function () {

    // Custom Cate Place Sights
    var listCatePlacesights = $("#acf-list_cate_placesights .acf-checkbox-list");
    var itemLastCatePlacesights = $("#acf-list_cate_placesights .acf-checkbox-list li:last-child");
    listCatePlacesights.after("<div class='wrap-cate-place-sights-custom'><p class='lable'>・定番と言うよりは【穴場】という名所の場合は合わせて選択してください</p><ul class='list-cate-place-sights-custom'></ul></div>");
    $(".list-cate-place-sights-custom").append(itemLastCatePlacesights);

    /*
    * Check cate parent if cate child have checked
    */
    // Cate Place Sights
    $("[data-field_name='list_cate_placesights']").on('change', "input[type='checkbox']", function () {
        if($("[data-field_name='list_cate_placesights'] input[type='checkbox']:checked").length > 0){
            $("#acf-cate_placesights input[type='checkbox']").attr('checked', true);
        }else{
            $("#acf-cate_placesights input[type='checkbox']").attr('checked', false);
        }
    });

    // Cate Event
    $("#acf-list_cate_event").on('change', "input[type='checkbox']", function () {
        if($("#acf-list_cate_event input[type='checkbox']:checked").length > 0){
            $("#acf-cate_event input[type='checkbox']").attr('checked', true);
        }else{
            $("#acf-cate_event input[type='checkbox']").attr('checked', false);
        }
    });

    // Cate Gourmet
    $("#acf-list_cate_gourmet").on('change', "input[type='checkbox']", function () {
        if($("#acf-list_cate_gourmet input[type='checkbox']:checked").length > 0){
            $("#acf-cate_gourmet input[type='checkbox']").attr('checked', true);
        }else{
            $("#acf-cate_gourmet input[type='checkbox']").attr('checked', false);
        }
    });

    // Cate Course
    $("#acf-list_cate_course").on('change', "input[type='checkbox']", function () {
        if($("#acf-list_cate_course input[type='checkbox']:checked").length > 0){
            $("#acf-cate_course input[type='checkbox']").attr('checked', true);
        }else{
            $("#acf-cate_course input[type='checkbox']").attr('checked', false);
        }
    });

});