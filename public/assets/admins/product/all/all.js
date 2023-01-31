function actionDelete(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);
    //alert(urlRequest);
    Swal.fire({
        title: 'Bạn có chắc không?',
        text: "Bạn sẽ không thể quay lại được!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xác nhận'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function (data) {
                    console.log(that.parent().parent().parent());
                    if (data.code == 200) {
                        that.parent().parent().parent().parent().remove();
                        Swal.fire(
                            'Đã xóa!',
                            'Dữ liệu đã được xóa.',
                            'success'
                        )
                    }

                },
                error: function (error) {
                    console.log(error);
                }
            });

        }
    })
}

$(function () {
    $(document).on('click', '.action_delete', actionDelete);
});
