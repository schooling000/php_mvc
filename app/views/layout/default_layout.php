<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?=$this->get_title()?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php echo $this->_head;?>
</head>

<body>
    <script>
        sidebar = document.getElementById('sidebar');

        console.log(sidebar.classList.contains('w3-hide-small'));

        function w3_open() {
            if (sidebar.classList.contains('w3-hide-small') || sidebar.classList.contains('w3-hide-medium')){
                sidebar.classList.remove('w3-hide-small');
                sidebar.classList.remove('w3-hide-medium');
            } else{
                sidebar.classList.add('w3-hide-small');
                sidebar.classList.add('w3-hide-medium');
            }
        }
    </script>
</body>

</html>