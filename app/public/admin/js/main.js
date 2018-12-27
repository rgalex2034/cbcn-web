document.addEventListener("DOMContentLoaded", function(){

    //Datetime picker initializer
    $.datetimepicker.setLocale("es");
    $("[data-toggle=datetimepicker]").each(function(){
        var $this = $(this);
        var defaults = {};

        var options = $this.data();
        delete options.toggle;
        options = $.extend({}, defaults, options);

        console.log(options);
        $this.datetimepicker(options);
    });

});
