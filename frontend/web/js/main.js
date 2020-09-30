    $(document).ready(function () {

    $('.send-phone').click(function(){        
        var name = $('#modal-call #name').val();
        var phone = $('#modal-call #phone').val();        
        var id = $('#modal-call #id').val();        
        if(name.length==0 ){ 
            $('#modal-call #name').focus();
            return false;         
        }        
        if(phone.length == 0) {
            $('#modal-call #phone').focus();
            return false;
        }         
        $.ajax({
            type: 'post',
            url: '/send-phone',
            data: 'id='+id+'&name='+name+'&phone='+phone+'&_csrf=' + yii.getCsrfToken(), 
            dataType: 'json',
            success: function(data){
                $('#modal-call').modal('toggle');
            },
            error: function(data){
                alert( '{$server_error}'  ) ;
            }
         });
    });   

});

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})


