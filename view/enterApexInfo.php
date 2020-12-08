<!DOCTYPE html>
<?php
//include('navigation.php');
if (!isset($apexKills)) {
    $apexKills = '';
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
            <h1>UPDATE APEX KILLS</h1>
            <form action="controller.php" method="post">
                <input type="hidden" name="action" value="updateApex"/>


                <div id="data">

                    <label>UserName:</label>
                    <input type="text" name="user_name"
                    value="<?php echo htmlspecialchars($user_name); ?>"> &nbsp;       

                    <label>Kills:</label>
                    <input type="text" name="ratingB" 
                           value="<?php echo htmlspecialchars($apexKills); ?>"> &nbsp; 
                    <?php if (!empty($errorKills)) { ?> <span class="error"><?php echo htmlspecialchars($errorKills); ?></span> <?php } ?>
                    <br>   
                </div>

                    <div id ="buttons">

                    <input type="submit" value="Update">
                    <input type="hidden" name ="action" value="updateApex"/><br>
                </div>
                <label>&nbsp;</label>
                <br>  
            </form>
        </main>
    </body>
</html>

