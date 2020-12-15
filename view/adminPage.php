<?php 
include('navigation.php'); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="main.css">
        <title>Game Friends</title>

    </head>
    <body>
        <main>
            <div id="data">
                <h1> Hello administrator </h1>
                <a href="view/adminRegister.php" >Register a new Admin </a>
                <div id="buttons">
            <form action="controller.php" method="POST" >
                <input type="hidden" name="action" value="viewAll">
                <input type="submit" value="View All Users">
            </form>
                </div>
                
               
                
        </main> 
    </body>

</html>

