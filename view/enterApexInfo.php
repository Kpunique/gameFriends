  
<?php
if (!isset($user_name)) {
    $user_name = '';
}

if (!isset($gamerTag)) {
    $gamerTag = '';
}

if (!isset($kills)) {
    $kills = '';
}


?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../main.css">
        <title>Game Friends</title>
    </head>
    <body>
        <main>
          <div id="apexFriends">

           <form action="controller.php" method="post">
                <input type="hidden" name="action" value="addApex"/>

               <h1>Game Friends Login Page</h1>

                <div id="data">

                  <label> User Name:</label>
                     <span> <?php echo htmlspecialchars($user_name); ?> </span><br>
                     
                    <label>Gamer Tag:</label>
                    <input type="text" name="gamerTag" 
                           value="<?php echo htmlspecialchars($gamerTag); ?>"> &nbsp; 
                   
                    <br>

                    <label>Kills:</label>
                    <input type="text" name="kills"
                           value="<?php echo htmlspecialchars($kills); ?>"> <label>&nbsp;</label>
                    <br>

                </div>

                <div id="buttons">

                    <input type="submit" value="add">
                    <input type="hidden" name="action" value="addApex"/><br>

                </div>
                <label>&nbsp;</label>
                <br>
            </form>

          </div>
        </main>
    </body>
</html>


