<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">#calendar{margin: 0; width: 355px;}</style>
</head>
<body>
    <div id="calendar"></div>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui-datepicker.min.js"></script>
    <script>
        $('#calendar').datepicker({
            inline: true,
            firstDay: 1,
            showOtherMonths: true,
            dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
        });
    </script>

</body>