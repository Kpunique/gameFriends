<?php //include('navigation.php');
       
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../main.css">
        <title>Game Friends</title>

    </head>
    <body>
        <main>
            <div id="data">
                <h1> Gamers On this Site </h1>

        <table>
            <tr>
            <th>gamerID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>User Name</th>
            <th>Gamer Tag</th>
            <th>is Admin</th>
            
            
            
            <?php foreach ($allMembers as $member): ?>
            
            <tr>
                <td><?php echo htmlspecialchars($member->getID()); ?></td>
                <td><?php echo htmlspecialchars($member->getFirstName()); ?></td>
                <td> <?php echo htmlspecialchars ($member->getLastName()); ?> </td>
                <td> <?php echo htmlspecialchars ($member->getUserName()); ?> </td>
                <td> <?php echo htmlspecialchars ($member->getGamerTag()); ?> </td>
                <td> <?php echo htmlspecialchars ($member->getisAdmin()); ?> </td>
               
            
            <?php  endforeach;?>
                 </tr>
            
        </table>
        
        

                
               
                
        </main> 
    </body>

</html>

