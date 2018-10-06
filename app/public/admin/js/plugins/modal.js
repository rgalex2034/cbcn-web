function modalAlert(message, title = ""){
    if(!message) return;

    var $template = $("#alert-modal");
    if($template.length < 1) return;

    var template = $template.get(0);
    var clone = document.importNode(template.content, true);
    $(".modal-title", clone).text(title);
    $(".modal-body", clone).text(message);

    $(clone.querySelector(".modal")).on("hide.bs.modal", function(){
        $(this).remove();
    }).modal({show: true});
}
