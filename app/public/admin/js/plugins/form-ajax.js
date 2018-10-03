/**
 * @author Alex Ruiz
 * jQuery Form Ajax plugin
 *
 * Makes any form act as an ajax request.
 * Fire events on ajax response and uses the own html form attributes
 * to create the request.
 *
 * Events applied on form element:
 *
 *  - ajax:before(jqxhr, params)
 *      Executes before the ajax request executes.
 *      Recieve the jqxhr object and the params used to create it.
 *
 *  - ajax:done(response, stats, jqxhr)
 *      Executed after the request, when nothing has failed.
 *      Receive response as extra paramater, status text and jqxhr object.
 *
 *  - ajax:fail(jqxhr, status)
 *      Executed after the request, when something has gone wrong.
 *      Receive jqxhr object as extra parameter, status text and jqxh object.
 *
 *  - ajax:always
 *      Executed always, event if it fails. No parameters.
 */
(function($){
    var submit_handler = function(ev){
        //Prevent default behavior, so no submit really happens.
        ev.preventDefault();
        var $form = $(this);

        var has_files = $("input[name][type=file]:not([disabled])", $form).length > 0;

        var url = $form.attr("action");
        //Default to current page if no action provided
        if(!url) url = location.protocol+"//"+location.hostname+":"+location.port+location.pathname;
        var method = $form.attr("method");
        var data = !has_files ? $form.serialize() : new FormData(this);

        var params = {
            url: url,
            type: method,
            data: data
        };

        //Disable data processing of jQuery if there a files.
        if(has_files){
            params.processData = false;
            params.contentType = false;
        }

        $form.trigger("ajax:before", req, params);

        var req = $.ajax(params).then(function(response, textStatus, jqxhr){
            $form.trigger("ajax:done", response, textStatus, jqxhr);
        }).catch(function(jqxhr, textStatus){
            $form.trigger("ajax:fail", jqxhr, textStatus);
        }).always(function(){
            $form.trigger("ajax:always");
        });

    };

    $.fn.formAjax = function(){
        return this.on("submit", submit_handler);
    };
})(jQuery);

//Autoinit
$(function(){
    $("[data-toggle=form-ajax]").formAjax();
});
