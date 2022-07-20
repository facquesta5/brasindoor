<?php
$_SESSION["host1"] = ''; //essa linha deve ser comentada quando enviar pro servidor
$user = new User;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brasindoor - Gerenciar</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/1cff018945.js" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="shortcut icon" href="/favicon.png" />
</head>

<body>
    <div class="container">
        <header class="bg-top">
            <a href="index.php"><img class="logo" src="images/logoBranco.png" /></a>
        </header>
        <nav class="breadcrumb admin" aria-label="breadcrumb">
            <ol class="breadcrumb">
            <?php 
            echo'ADMIN' 
            ?>
            </ol>
        </nav>
    </div>
    

    <div class="container">

        <div class="row" id="container" style="grid-auto-flow: row dense;">


