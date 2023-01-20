<html><head>
        <title> Display Selected Country Information </title>
    </head>
    <body>
        <?php
        if (isset($_GET["p_name"]))
        {
            $strp_name = $_GET["p_name"];
            echo  $strp_name;
        }
        require "connect.php";
        $sql ="SELECT * FROM patient,permissions
               WHERE patient.p_name LIKE '%".$strp_name."%'
                AND patient.p_id = permissions.p_cid ";
        $params = array($strp_name);
        $stmt = $conn->prepare($sql);
       $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
  
<!-- Detail  -->
     <table width="300" border="1">
  <tr>
    <th width="325">รหัสคนไข้</th>
    <td width="240"><?php echo $result['p_id']; ?></td>
  </tr>

  <tr>
    <th width="130">ชื่อ</th>
    <td><?php echo $result['p_name']; ?></td>
  </tr>
 
  <tr>
    <th width="130">เมลคนไข้</th>
    <td><?php echo $result['p_username']; ?></td>
  </tr>
  <tr>
    <th width="130">ยอดหนี้</th>
    <td><?php echo $result['p_debt']; ?></td>
  </tr>
  </table>
 
<?php
$conn = null;
?>
    </body>
</html>