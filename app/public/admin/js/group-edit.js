$(function(){
    $(document.forms["group-form"]).on("ajax:done", function(ev, response){
        utils.redirectnext(location.protocol+"//"+location.host+"/admin/groups.php");
    }).on("ajax:fail", function(ev, jqxhr){
        modal.modalAlert(jqxhr.responseText, "Error");
    });
});
