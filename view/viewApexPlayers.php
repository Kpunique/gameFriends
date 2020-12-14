<?php include('navigation.php'); ?>

<!DOCTYPE html>

<html>
    <head>
        <title>All Users</title>
       <link rel="stylesheet" type="text/css" href="view/main.css">  
    </head>
    
        
    
    <body>
        <main>
        <h1>Apex Players</h1>
        <table>
            <tr>
     
            <th> user name</th>
            <th> gamer tag</th>
            <th> kills </th>
            </tr>
            
            <?php foreach ($apexGamers as $apex): ?>
            
            <tr>
                
            
                <td> <?php echo htmlspecialchars ($apex->getUserName()); ?> </td>
                <td> <?php echo htmlspecialchars ($apex->getGamerTag()); ?> </td>
                <td><?php echo htmlspecialchars($apex->getKills()); ?></td>
            <td><a href="controller.php?action=follow&userName=<?php echo htmlspecialchars ($apex->getUserName()); ?>">visit</a></td>
            <?php  endforeach;?>
                 </tr>
            
        </table>
        </main>
    </body>
 
</html>
               
               
               
               
               
              

