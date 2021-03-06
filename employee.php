<?php
// check if top.inc.php is defined. if not defined it will not work.
require('top.inc.php');
// if user is not admin he can not access employee page.
if($_SESSION['ROLE']!=1){
   // get id from url
   header('location:add_employee.php?id='.$_SESSION['USER_ID']);
   // exit current php script
	die();
}
// if get type from url && id then 
if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])){
   $id=mysqli_real_escape_string($con,$_GET['id']);
   // delete employee form database
	mysqli_query($con,"delete from employee where id='$id'");
}
// only user can see employee list
// "order by id desc" is used to show recent employee first
$res=mysqli_query($con,"select * from employee where role=2 order by id desc");
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Employee </h4>
						   <h4 class="box_title_link"><a href="add_employee.php">Add Employee</a> </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <!--width is used for give space ratio for the element-->
                                       <th width="5%">S.No</th>
                                       <th width="5%">ID</th>
                                       <th width="40%">Name</th>
									            <th width="15%">Email</th>
									            <th width="15%">Mobile</th>
                                       <th width="20%"></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
									$i=1;
									while($row=mysqli_fetch_assoc($res)){?>
									<tr>
                              <td><?php echo $i?></td>
									   <td><?php echo $row['id']?></td>
                              <td><?php echo $row['name']?></td>
									   <td><?php echo $row['email']?></td>
									   <td><?php echo $row['mobile']?></td>
									   <td><a href="add_employee.php?id=<?php echo $row['id']?>">Edit</a> <a href="employee.php?id=<?php echo $row['id']?>&type=delete">Delete</a></td>
                           </tr>
									<?php 
									$i++;
									} ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
         
<?php
require('footer.inc.php');
?>