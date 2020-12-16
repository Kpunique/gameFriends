  
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
          

           <form action="../controller.php" method="post">
                <input type="hidden" name="action" value="addApex"/>

             

                <div id="apexFriends">
                 <h1>Update Kills</h1>
                  <label> User Name:</label>
                     <span> <?php echo htmlspecialchars($user_name); ?> </span><br>
                     
                    <label>Gamer Tag:</label>
                    <span> <?php echo htmlspecialchars($user_name); ?> </span><br> 
                   
                    <br>

                    <label>Kills:</label>
                    <input type="text" name="kills"
                           value="<?php echo htmlspecialchars($kills); ?>"> <label>&nbsp;</label>
                    <br>

               

               
                <div id="buttons">

                    <input type="submit" value="add">
                    <input type="hidden" name="action" value="addApex"/><br>
                     <label>&nbsp;</label>
                     
                   

                    <input type="submit" value="update">
                    <input type="hidden" name="action" value="updateApex"/><br>
                     <label>&nbsp;</label>
                </div>
                
               
                </div>
               </form>
                <br>
            

          
        </main>
    </body>
</html>

