<!DOCTYPE html>
    <?php session_start();?>
    <head>
        <link rel="stylesheet" href="/view/css/style.css">
        <link href="/view/css/bootstrap.min.css" rel="stylesheet">
        <title>Kochtopf</title>
    </head>
    <body>
        <div id="container-aussen" class="container-fluid">
            <a href="#">
                <span class="glyphicon glyphicon-user"></span>
            </a>
            <a href="/home">
                <span class="glyphicon glyphicon-home"></span>
            </a>
            <a href="/">
                <span class="glyphicon glyphicon-remove-circle"></span>
                <?php session_destroy();?>
            </a>
                
                
                
                
