<?php
require "db.php";

?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            getTable();
            var $form = $('#addform');
            $form.on('submit', function () {
                $.ajax({
                    'url': 'ajaxAddUser.php',
                    'method': 'post',
                    'success': function (data) {
                        $('#status').html(data);
                        getTable();
                    }
                });
                return false;
            });
        });


        function getTable() {
            $.ajax({
                url: "ajaxTable.php",
                success: function (data) {
                    $('#user-table').html(data);
                },
            });
        }
    </script>
</head>
<body>
<h1>Пользователи</h1>
<form id="addform">
    <button type="submit" class="btn btn-primary">Добавить</button>
</form>
<div id="status" style="margin-bottom: 10px;"></div>
<div id="user-table"></div>
</body>
</html>
