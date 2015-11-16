(function ( $ ) {
  "use strict";

    $(function () {
        $(".shortest-switcher").click(function(){
            var checkbox = $(this).find("input");
            var switcher = $(this).find(".switch");
            var options = $("."+$(this).attr("id"));
            options.toggleClass("active");


            if($(this).hasClass("active")){
                checkbox.removeAttr("checked");
                checkbox.checked = false;
                checkbox.attr("value",0);

                switcher.removeClass("on");
                $(this).removeClass("active");
            }
            else{
                checkbox.attr("checked","checked");
                checkbox.checked = true;
                checkbox.attr("value",1);

                switcher.addClass("on");
                $(this).addClass("active");
            }
        });
        $("#shst_es_types").change(function(){
            var optSelected = $(this).find("option:selected");
            var optSelectedCont = $(".js-timeout-opt");
            if(optSelected.hasClass("js-timeout")){
                optSelectedCont.addClass("active");
            }
            else{
                optSelectedCont.removeClass("active");
            }
        });
    });


}(jQuery));