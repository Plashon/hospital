<html><head>
        <title>ลูกหนี้</title>
    </head>
    <body>
<?php
require 'connect.php';
// ลองให้โชว์ข้อมูล customer
$sql = "SELECT patient.p_id,patient.p_name,patient.p_debt,permissions.p_username FROM patient,permissions
WHERE  patient.p_id = permissions.p_cid 
AND p_debt BETWEEN 1000 AND 3000 ";

$stmt = $conn->prepare($sql);
$stmt->execute();
echo '<br>';
echo '<br>';
?>
<table width="800" border="1">
  <tr>
    <th width="90"> <div align="center">รหัสคนไข้ </div></th>
    <th width="140"> <div align="center">ชื่อ </div></th>
    <th width="120"> <div align="center">ยอดหนี้ </div></th>
    <th width="100"> <div align="center">เมลคนไข้</div></th>
    </tr>
<?php while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
 
  <tr>
    <td>    <?php echo $result['p_id']; ?>        </td>
    <td>    <?php echo $result['p_name']; ?>              </td>
    <td>    <?php echo $result['p_debt']; ?>         </td>
    <td>    <?php echo $result['p_username']; ?>             </td>
  </tr>
 
<?php } ?>
</table>
<?php $conn = null; ?>
    </body>
</html>










