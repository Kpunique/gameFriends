<!DOCTYPE html>
<?php
//include('navigation.php');
if (!isset($fortniteKills)) {
    $fortniteKills = '';
}


?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="main.css">
        <title>APEX</title>
    </head>

    <body>
        <main>
            <h1>UPDATE FORTNITE KILLS</h1>
            <form action="controller.php" method="post">
                <input type="hidden" name="action" value="updateApex"/>


                <div id="data">

                    <label>UserName:</label>
                    

                    <label>Kills:</label>
                    <input type="text" name="fortniteKills" 
                           value="<?php echo htmlspecialchars($fortniteKills); ?>"> &nbsp; 
                    <?php if (!empty($errorKills)) { ?> <span class="error"><?php echo htmlspecialchars($errorKills); ?></span> <?php } ?>
                    <br>   
                </div>

                    <div id ="buttons">

                    <input type="submit" value="Update">
                    <input type="hidden" name ="action" value="updateFortnite"/><br>
                </div>
                <label>&nbsp;</label>
                <br>  
            </form>
        </main>
    </body>
</html>

