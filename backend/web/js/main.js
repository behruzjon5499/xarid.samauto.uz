 $(document).ready(function (e) {
        $('#delete').on('click', function (e) {

            var answer = window.confirm("Delete Vacancy");
        if (answer) {
            var url = $(this).data('url');
            var id = $(this).data('id');
                 console.log(url);
            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                data: {id: id},
                success: function (data) {
                    window.location.href = 'index';
                }
            });
        } else {

        }
        })
    })
