<?php include('navigation.php'); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../main.css">
        <title>Game Friends</title>

    </head>
    <body>
        <main>
            <div id="data">
                <h1> Welcome Home Gamer </h1>
                You can now <a href="enterApexInfo.php"> Update Apex Kills</a>
  
              <div id="buttons">

                    <form action="controller.php" method="POST" >
                <input type="hidden" name="action" value="find_friends">
                <input type="submit" value="Find Apex Friends">
            </form>
                </div>
                <label>&nbsp;</label>
                <br>
              
          
                <h2> Following</h2>
                <table>
                    <tr>
                        <th>gamerTag </th>
                        


                    </tr>

                    <?php foreach ($memberFollowing as $following): ?>

                        <tr>

                            <td><?php echo htmlspecialchars($following['following']); ?></td>
                           
<td><a href="controller.php?action=visit_profile&gamerTag=<?php echo htmlspecialchars ($following['following']); ?>">visit</a></td>

                        <?php endforeach; ?>
                    </tr>

                </table>
               
                
        </main> 
    </body>

</html>

