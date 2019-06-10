$(function(){
    $("#addUser").click(function(){
        $(".modal-header h3").text("Add User");
         $("#modal").modal('show')
                    .find('#modalContent')
                    .load($(this).attr('value'));
    });
    
    $(".editUser").click(function(){
        $(".modal-header h3").text("Edit User");     
         $("#modal").modal('show')
                    .find('#modalContent')
                    .load($(this).attr('value'));
    });
    
    $(".assignBook").click(function(){
        $(".modal-header h3").text("Lend Book");     
         $("#modal").modal('show')
                    .find('#modalContent')
                    .load($(this).attr('value'));
    });    
    
});