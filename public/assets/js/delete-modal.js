(function(){
    var curr_id = -1;
    var delete_modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    window.onDelete = function(id){
        curr_id = id;
        delete_modal.show();
    }
    window.confirmDelete = function(url){
        var newUrl = url.replace('test',curr_id);
        delete_modal.hide();
        window.location.replace(newUrl);
    }
})();
