<?php include('navigation.php'); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="main.css">
        <title>Book Lovers Club</title>

    </head>
    <main>
            <body>
           <div id="data">
                <h1> Registration Completed </h1>

                <label> First Name:</label>
                <span> <?php echo htmlspecialchars ($apex->getUserName()); ?> </span> <br>

                <label> Last Name:</label>
                <span> <?php echo htmlspecialchars ($apex->getGamerTag()); ?> </span><br>

                <label> User Name:</label>
                <span> <?php echo htmlspecialchars($apex->getKills()); ?> </span><br>

                <label> Email Address:</label>
                
                You can now <a href="controller.php"> login </a>
                </main> 
    </body>

</html>
