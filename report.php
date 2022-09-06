
<?php

$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "online_notice";

 $conn = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>



<form action="" method="post">
<select name="user">
    <option value="">user</option>
    <?php 
    $query ="SELECT  notice_id,user,subject,status FROM notice";
    $result = $conn->query($query);
    if($result->num_rows> 0){
        while($optionData=$result->fetch_assoc()){
        $option =$optionData['user'];
        $id =$optionData['notice_id'];
        $sub=$optionData['subject'];
        $statu=$optionData['status'];
    ?>
    <option value="<?php echo $id; ?>" ><?php echo $option; ?> </option>
   <?php
    }}
    ?>
</select>
<input type="submit" name="submit">
</form>



<?php
/// edit data
if(isset($_POST['user']) && isset($_POST['submit'])){
    $notice_id= $_POST['user'];
    $query ="SELECT notice_id,user,subject,status FROM notice WHERE notice_id='$notice_id'";
    $result = $conn->query($query);
    if($result->num_rows> 0){
      $notices= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }else{
     $notices=[];
    }
}
?>


    <?php
    if(isset($notices)>0)
    {
    ?>
    <table border="1" cellspacing="0" cellpadding="5">
    <tr>
        
        <th>notice_id</th>
        <th>user</th>
         <th>Subject</th>
         <th>Status</th>
    </tr>
    <?php
       if(count($notices)>0)
       {
   // $sn=1;
    foreach ($notices as $note) {
     ?>
<tr>
  
    <td><?php echo $note['notice_id']; ?></td>
    <td><?php echo $note['user']; ?></td>
 <td><?php echo $note['subject']; ?></td>
<td><?php echo $note['status']; ?></td>
</tr>
     <?php
  // $sn++; 
   }
}else{
    echo "<tr><td colspan='3'>No Data Found</td></tr>";
}
?>
</table>
<?php
}
?>