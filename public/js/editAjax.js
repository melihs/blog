function editAjax(url,alertMsg) {
    let form = $('#ajax-form');
    let form_data = $('#ajax-form').serialize();
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type : 'PUT',
        url  : url,
        data : form_data,
        error : function() {
            swal({
                title : 'İşlem başarısız!',
                type  : 'error',
                timer : 99999999999,
                showConfirmButton: true
            });
        },
        success : function () {
            swal({
                title : alertMsg,
                text  : 'Lütfen bekleyin...',
                type  : 'success',
                timer : 2000,
                showConfirmButton: false
            });
        }
    });
    return false;
}
