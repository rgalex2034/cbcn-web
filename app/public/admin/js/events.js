$(function(){
    //Delete button listener
    $("#events-table").on("click", ".btn-del", function(){
        var $row = $(this).closest("tr");
        var id = $row.data("id");
        console.log(id);

        $.post("events-helper.php", {
            action: "delete",
            id: id
        }).then(function(response){
            $row.remove();
        }).catch(function(){
            console.error("Something is wrong");
        });
    });
});
