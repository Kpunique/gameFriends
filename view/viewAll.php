<?php include('navigation.php'); ?>

<!DOCTYPE html>

<html>
    <head>
        <title>All Users</title>
       <link rel="stylesheet" type="text/css" href="main.css">  
    </head>
    
        
    
    <body>
        <main>
        <h1>Users on this site</h1>
        <table>
            <tr>
           
            <th> First Name </th>
            <th>Last Name</th>
            <th>User Name</th>
            <th>Gamer Tag</th>
            </tr>
            
            <?php foreach ($allMembers as $member): ?>
            
            <tr>
                
                <td><?php echo htmlspecialchars($member->getFirstName()); ?></td>
                <td> <?php echo htmlspecialchars ($member->getLastName()); ?> </td>
                <td> <?php echo htmlspecialchars ($member->getUserName()); ?> </td>
                <td><?php echo htmlspecialchars($member->getGamerTag()); ?></td>
     <td><a href="controller.php?action=deleteUser&username=<?php echo htmlspecialchars ($member->getUserName()); ?>">Delete</a></td> 
            <?php  endforeach;?>
                 </tr>
            
        </table>
        </main>
    </body>
 
</html>

