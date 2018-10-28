$(function(){
    $(document.forms["event-form"]).on("ajax:done", function(ev, response){
        utils.redirectnext(location.protocol+"//"+location.host+location.pathname+"?id="+response);
    }).on("ajax:fail", function(ev, jqxhr){
        modal.modalAlert(jqxhr.responseText, "Error");
    });
});
