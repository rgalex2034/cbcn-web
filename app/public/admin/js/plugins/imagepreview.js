(function($){
    $.fn.imagePreview = function(){
        return this.each(function(){
            var $input = $(this);
            if(!$input.is("input[type=file]")) return;
            var options = $input.data();
            delete options.toggle;

            if(!options && !options.target) return;

            $input.on("change", function(){
                var reader = new FileReader();
                reader.addEventListener("load", function(){
                    $(options.target).attr("src", reader.result);
                });
                reader.readAsDataURL(this.files[0]);
            });
        });
    };
})(jQuery);

$(function(){
    $("input[data-toggle=imagepreview]").imagePreview();
});
