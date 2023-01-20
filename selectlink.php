<html><head>
        <title>ลูกหนี้</title>
    </head>
    <body>
<?php
require 'connect.php';
// ลองให้โชว์ข้อมูล customer
$sql = "SELECT *
        FROM patient,permissions
        WHERE patient.p_id = permissions.p_cid";

$stmt = $conn->prepare($sql);
$stmt->execute();
echo '<br>';
echo '<br>';
?>
<table width="800" border="1">
  <tr>
    <th width="90"> <div align="center">รหัสคนไข้ </div></th>
    <th width="140"> <div align="center">ชื่อ </div></th>
    <th width="100"> <div align="center">เมลคนไข้</div></th>
    </tr>
<?php while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
 
  <tr>
    <td>
      <!--อย่าเว้นวรรค เวลาลิ้งค์ ไอสัสสสสสสสสสสสส--> 
      <!--อย่าเว้นวรรค เวลาลิ้งค์ ไอสัสสสสสสสสสสสส--> 
        <a href="link.php?p_id=<?php echo $result['p_id']; ?>">
                     <?php echo $result['p_id']; ?> 
        </a>   
        <!--อย่าเว้นวรรค เวลาลิ้งค์ ไอสัสสสสสสสสสสสส-->  
        <!--อย่าเว้นวรรค เวลาลิ้งค์ ไอสัสสสสสสสสสสสส--> 
    </td>
    <td>    <?php echo $result['p_name']; ?>      </td>
    <td>    <?php echo $result['p_username']; ?>  </td>
  </tr>
 
<?php } ?>
</table> }
<?php $conn = null; ?>
    </body>
</html>
