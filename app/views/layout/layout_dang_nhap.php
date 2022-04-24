<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo $this->get_web_element(self::WEB_ELEMENT_TITLE); ?></title>
</head>

<body>
    <?php require_once ROOT_PATH . DS . 'app' . DS . 'views' . DS . 'body' . DS . 'body_content.php'; ?>
</body>

</html>