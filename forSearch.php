<html>
  <head>
        <title> Information </title>
    </head>
    <body>
     <?php
     $count = 0;
    if(isset($_GET['p_name'])&&$_GET['p_name'] !=null)
    {
      echo "<br> get value =".$_GET['p_name'];  }
    require 'connect.php';
 
    $sql = "SELECT * FROM patient,permissions where patient.p_id = permissions.p_cid 
   AND p_name like CONCAT(:p_name,'%')";
   
   

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':p_name',$_GET['p_name']);

    $stmt->execute();
   
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    ?>
   <table width="480" border="1">
  <tr>
    <th width="90"> <div align="center">รหัสคนไข้ </div></th>
    <th width="200"> <div align="center">ชื่อ </div></th>
    <th width="120"> <div align="center">ยอดหนี้ </div></th>
    <th width="100"> <div align="center">เมลคนไข้</div></th>
    </tr>
    
<?php
    while($result = $stmt->fetch()){
       // echo $result['p_name'].''.$result['p_name']."<br/>";
        $count++;
?>
    <td width="240"> <div align="center"><?php echo $result['p_id']; ?></div></td>
      <td><?php echo $result['p_name']; ?></td>
      <td><?php echo $result['p_username']; ?></td>
      <td><?php echo $result['p_debt']; ?></td>
    
<?php
    } 
    
    ?>

    <?php
if($count==0)
echo "<h1><br>No data...<br/></h1>";
$conn = null;
?>


 
<?php
$conn = null;
?>

</body>
</html>

