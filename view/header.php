<!DOCTYPE html>
    <?php session_start();?>
    <head>
        <link rel="stylesheet" href="/view/css/style.css">
        <link href="/view/css/bootstrap.min.css" rel="stylesheet">
        <title>Kochtopf</title>
    </head>
    <body>
        <div id="wrapper" >
            <div id="navigation">
            <ul id="navigation-liste">
                <li>
                    <a href="#">
                        <span class="glyphicon glyphicon-user"></span>
                    </a>
                </li>
                <li>
                    <a href="/home">
                        <span class="glyphicon glyphicon-home"></span>
                    </a>
                </li>
                <li>
                    <a href="/">
                        <span class="glyphicon glyphicon-remove-circle"></span>
                        <?php session_destroy();?>
                    </a>
                </li>
            </ul>
            </div>
                
                
                
                
