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

function agree_rule() {
    $('.checkbox_bool').prop('checked', true)
}
document.getElementById('license').onchange = function () {
    document.getElementById('license_text').innerHTML = this.value;
};
document.getElementById('sertificate').onchange = function () {
    document.getElementById('sertificate_text').innerHTML = this.value;
};
document.getElementById('passport').onchange = function () {
    document.getElementById('passport_text').innerHTML = this.value;
};
document.getElementById('user_type_1').onchange = function () {
    $('.checked_1').removeClass('d-none');
    $('.checked_2').addClass('d-none');
};
document.getElementById('user_type_2').onchange = function () {
    $('.checked_2').removeClass('d-none');
    $('.checked_1').addClass('d-none');
};