<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SearchByname v.2</title>
</head>
<body>
    <h1>Search_On_One_Page</h1>
    <form action="SearchByname2.php" method="GET">
    <input type="text" placeholder="Enter  Name" name="p_name">
    <br><br>
    <input type="submit">
    </form>
</body>
</html>

<?php
    require "connect.php";
    if(isset($_GET["p_name"])&&$_GET['p_name']!=null)
    {
        $sql = "SELECT * FROM patient,permissions where patient.p_id = permissions.p_cid AND p_name LIKE CONCAT('%', :p_name ,'%')";
    
        echo "<br>" . " sql =
        " .$sql . "<br>";
    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':p_name',$_GET['p_name']);
        $stmt->execute();
        ?>

        <table width="500" border="1">
        <tr>
            <th>ชื่อ</th>
            <th>ยอดหนี้</th>
            <th>บัญชีผู้ใช้</th>
        </tr>
        
        <?php
        while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
    

        <tr>
            <td><?php echo $result['p_name']; ?></td>
            <td><?php echo $result['p_debt']; ?></td>
            <td><?php echo $result['p_username']; ?></td>
        </tr>

    

    
    <?php }
    // if($_GET['P_name']==null)
    // echo "<br> NO Data... <br>";
    $conn = null;
        }
    ?>
    </table>