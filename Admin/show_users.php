<?php
session_start();
if(!isset($_SESSION['mail'])){
   header("Location: index.php");
   exit();
} 
   include 'connection.php';
   $str="select * from users";
   $res=mysqli_query($conn,$str);   
?>

<?php
      if(isset($_GET['id']))
      {   
         $id=$_GET['id'];
         $sql="delete from users where id=".$id."";
         mysqli_query($conn,$sql);
         header("location:show_users.php");
      }
?>

<html>
   <head>
      <title>Manage Users | Admin</title>
      <?php 
         include 'links.php';
      ?>
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <?php
               include 'header.php';
            ?>
            <div id="content">
               <?php 
                  include 'topbar.php';
               ?>
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Manage Users</h2>
                           </div>
                        </div>
                     </div>
                  </div>
                  <form method="POST">
                     <label for="sr" style="font-size:18px; color:black; font-weight:bold;">Search Users</label>&nbsp;&nbsp;<input type="text" name="search" id="sr"> &nbsp;
                     <input type="submit" value="Search" name="sr" class="btn btn-primary"><br><br>
                     <?php 
                        if(isset($_POST['sr']))
                        {
                           $str="select * from users where name='".$_POST['search']."'";
                        }
                        else
                        {
                           $str="select * from users";
                        }
                        $res=mysqli_query($conn,$str);
                     ?>
                     <table class="table">
                        <tr class="thead-dark">
                           <th>ID</th>
                           <th>NAME</th>
                           <th>EMAIL</th>
                           <th>PASSWORD</th>
                           <th>CONFIRM PASSWORD</th>
                           <th>USER TYPE</th>
                           <th>ACTION</th>
                        </tr>
                        <?php while($row=mysqli_fetch_array($res)){?>
                        <tr>
                           <td><?php echo $row['id'];?></td>
                           <td><?php echo $row['name'];?></td>
                           <td><?php echo $row['email'];?></td>
                           <td><?php echo $row['password'];?></td>
                           <td><?php echo $row['cpassword'];?></td>
                           <td><?php echo $row['utype'];?></td>
                           <td><a class="fa fa-trash fa-lg" onclick="return confirm('Do you want to delete this record?')" href="?id=<?php echo $row['id'];?>"></a></td>
                        </tr>
                        <?php } ?>
                     </table>
                  </form>                  
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <!-- <script src="js/bootstrap-select.js"></script>
      owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <script src="js/chart_custom_style1.js"></script>
   </body>
</html>