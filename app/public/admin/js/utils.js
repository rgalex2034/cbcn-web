var utils = {
    defer: function (fn){
        return setTimeout(fn, 0);
    },
    redirectnext: function (url){
        return this.defer(function(){
            location.href = url;
        });
    }
};
