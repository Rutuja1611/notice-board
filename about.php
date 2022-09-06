
<?php 
$q=mysqli_query($conn,"select * from all_notice ");
$rr=mysqli_num_rows($q);
if(!$rr)
{
echo "<h2 style='color:red'>No any Notice found !!!</h2>";
}
else
{
?>


<table class="table table-bordered">
	<tr>
		<th colspan="7"><h4>General Notices</h4></th>
	</tr>
	<Tr class="success">
		<th>Sr.No</th>
		<th>Date</th>
		<th>Class</th>
		<th>Subject</th>
		<th>Details</th>
		<th>Image</th>
		
		
	</Tr>
		<?php 


$i=1;
while($row=mysqli_fetch_assoc($q))
{
$nid=$row['nid'];
echo "<Tr>";
echo "<td>".$i."</td>";
echo "<td>".$row['ndt']."</td>";
echo "<td>".$row['for_class']."</td>";
echo "<td>".$row['subject']."</td>";
echo "<td>".$row['details']."</td>";
echo "<td><a href='admin/all_notices/$nid.jpg'><img src='admin/all_notices/$nid.jpg' width='60px' /></a></td>";
?>


<?php 

echo "</Tr>";
$i++;
}
		?>
		
</table>
<?php }?>