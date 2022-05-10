<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopper</title>
    <link rel="stylesheet" href="/phpdemo/eShopper/public/css/main.css">
    <link rel="stylesheet" href="/phpdemo/eShopper/public/css/base.css">
    <link rel="stylesheet" href="/phpdemo/eShopper/public/img/fontawesome-free-5.12.1-web/css/all.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <?php require_once "./mvc/views/layouts/header.php" ?>
    <div class="container">
        <?php require_once "./mvc/views/pages/".$data["page"].".php" ?>
    </div>

    <?php require_once "./mvc/views/layouts/footer.php" ?>
</body>
<script src="/phpdemo/eShopper/public/js/main.js"></script>
<script src="/phpdemo/eShopper/public/js/details.js"></script>
</html>