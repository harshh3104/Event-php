<?php 
session_start();
if(!isset($_SESSION['mail'])){
   header("Location: index.php");
   exit();
}
   include 'connection.php';
   $str="SELECT r.id, u.id AS user_id, u.name AS user_name, e.id AS event_id, e.title AS event_title, r.registered_at 
         FROM registrations r 
         INNER JOIN users u ON r.user_id = u.id 
         INNER JOIN events e ON r.event_id = e.id 
         ORDER BY r.id DESC"; 
   $res=mysqli_query($conn,$str);   
?>

<?php
      if(isset($_GET['id']))
      {   
         $id=$_GET['id'];
         $sql="delete from registrations where id=".$id."";
         mysqli_query($conn,$sql);
         header("location:show_registrations.php");
      }
?>

<html>
   <head>
      <title>Manage Registrations | Admin</title>
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
                              <h2>Manage Registrations</h2>
                           </div>
                        </div>
                     </div>
                  </div>
                  <form method="POST"> 
                    <table class="table">
                        <tr class="thead-dark">
                           <th>ID</th>
                           <th>USER_ID</th>
                           <th>USER_NAME</th>
                           <th>EVENT_ID</th>
                           <th>EVENT_TITLE</th>
                           <th>REGISTERED_AT</th>
                           <th>ACTION</th>
                        </tr>
                        <?php while($row=mysqli_fetch_array($res)){?>
                        <tr>
                           <td><?php echo $row['id'];?></td>
                           <td><?php echo $row['user_id'];?></td>
                           <td><?php echo $row['user_name'];?></td>
                           <td><?php echo $row['event_id'];?></td>
                           <td><?php echo $row['event_title'];?></td>
                           <td><?php echo $row['registered_at'];?></td>
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