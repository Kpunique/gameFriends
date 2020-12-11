<?php include('navigation.php'); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="main.css">
        <title>Game Friends</title>

    </head>
    <body>
        <main>
            <div id="data">
                <h1> Welcome Home Gamer </h1>
                You can now <a href="enterApexInfo.php"> Update Apex Kills</a>
              You can now <a href="enterFortniteInfo.php"> Update Fortnite Kills</a>
              <div id="buttons">

                    <form action="controller.php" method="POST" >
                <input type="hidden" name="action" value="find_friends">
                <input type="submit" value="Find Apex Friends">
            </form>
                </div>
                <label>&nbsp;</label>
                <br>
              
          
                <h2> People You Follow</h2>
               
                
        </main> 
    </body>

</html>

