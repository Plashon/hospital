<html><head>
        <title> คนไข้ </title>
    </head>
    <body>
        <?php
        if (isset($_GET['p_id'])) 
        {
            $strp_id = $_GET['p_id'];
            echo $strp_id;
        }
        require 'connect.php';
        $sql = "SELECT patient.p_id,patient.p_name,permissions.p_username
                FROM patient,permissions
                WHERE patient.p_id = permissions.p_cid
                AND  patient.p_id =? ";
        $params = [$strp_id];
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
  </table>

<?php $conn = null; ?>
    </body>
</html>