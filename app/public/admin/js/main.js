document.addEventListener("DOMContentLoaded", function(){

    //Datetime picker initializer
    if($.datetimepicker){
        $.datetimepicker.setLocale("ca");
        $("[data-toggle=datetimepicker]").each(function(){
            var $this = $(this);
            var defaults = {
                format: "Y-m-d H:i",
                dayOfWeekStart: 1
            };

            /* Set up time options
             * Creates an array of values with format HH:MM
             * from 00:00 to 23:50 on intervals of 10 minutes.
             */
            var times = [];
            for(var h = 0; h < 24; h++){
                for(var i = 0; i < 60; i += 10){//Increment on interval of 10 minutes
                    //Format padding with 0 in front, in case of 1 digit number
                    var h_text = ("0"+h).slice(-2);
                    var i_text = ("0"+i).slice(-2);
                    times.push(h_text+":"+i_text);
                }
            }
            defaults.allowTimes = times;

            var options = $this.data();
            delete options.toggle;
            options = $.extend({}, defaults, options);

            $this.datetimepicker(options);
        });
    }

});
