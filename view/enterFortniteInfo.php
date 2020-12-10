<!DOCTYPE html>
<?php
//include('navigation.php');
if (!isset($kills)) {
    $kills = '0';
}
if (!isset($gamer_tag)){
    $gamer_tag = '';
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
                <input type="hidden" name="action" value="updateFortnite"/>


                <div id="data">

                     
                    
                    <label>GamerTag:</label>
                    <input type="text" name="gamer_tag"
                    value="<?php echo htmlspecialchars($gamer_tag); ?>"> &nbsp; 

                    <label>Kills:</label>
                    <input type="text" name="kills" 
                           value="<?php echo htmlspecialchars($kills); ?>"> &nbsp; 
                    <?php if (!empty($errorKills)) { ?> <span class="error"><?php echo htmlspecialchars($errorKills); ?></span> <?php } ?>
                    <br>   
                </div>
                
                 <div id ="buttons">

                    <input type="submit" value="Add">
                    <input type="hidden" name ="action" value="addFortnite"/><br>
                </div>
                <label>&nbsp;</label>
                <br> 

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

