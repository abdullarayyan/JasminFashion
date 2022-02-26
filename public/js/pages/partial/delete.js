let pattern = '';
if (window.location.href.indexOf("group-message") > -1) {

    pattern = '/group-message/';

} else if (window.location.href.indexOf("message-template") > -1) {

    pattern = '/message-template/';
}

var msgId;
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.delete').click(function (e) {
        Id = ($(this).data('id'))

        $('#confirm').click(function () {
            let data =
                {
                    "token": $('input[name="csrf-token"]').val(),
                    "id": Id
                }
            $.ajax({
                type: 'DELETE',
                url: pattern + Id,
                data: data,
                success: (response) => {
                    toastr.success(response.status);
                    location.reload()
                },
                error: (error) => {
                    console.error(error);
                }
            });
        })
    })
})
