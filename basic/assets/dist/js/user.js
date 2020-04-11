$(document).ready(function () {
    getTable();
    var $form = $('#addform');
    $form.on('submit', function () {
        $.ajax({
            'url': '/site/ajax-add-user',
            'method': 'post',
            'success': function (data) {
                console.log(data);
                $('#status').html(data.message);
                if (data.success) {
                    $('#status').removeClass('error');
                    $('#status').addClass('success');
                } else {
                    $('#status').removeClass('success');
                    $('#status').addClass('error');
                }
                getTable();
            }
        });
        return false;
    });
});


function getTable() {
    $.ajax({
        url: "/site/ajax-table",
        success: function (data) {
            $('#user-table').html(data);
            $('#data-table>table').DataTable();
        },
    });

}
