$(function(){
    $(document.forms["event-form"]).on("ajax:done", function(ev, response){
        utils.redirectnext(location.protocol+"//"+location.host+"/admin/events.php");
    }).on("ajax:fail", function(ev, jqxhr){
        modal.modalAlert(jqxhr.responseText, "Error");
    });
});
