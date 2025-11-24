<?php 
session_start();
if(!isset($_SESSION['mail'])){
   header("Location: index.php");
   exit();
}
   include 'connection.php';
   $str="select * from events";
   $res=mysqli_query($conn,$str);   
?>

<?php
      if(isset($_GET['id']))
      {   
         $id=$_GET['id'];
         $sql="delete from events where id=".$id."";
         mysqli_query($conn,$sql);
         header("location:show_events.php");
      }
?>

<html>
   <head>
      <title>Manage Events | Admin</title>
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
                              <h2>Manage Events</h2>
                           </div>
                        </div>
                     </div>
                  </div>
                  <form method="POST">
                     <label for="sr" style="font-size:18px; color:black; font-weight:bold;">Search Events</label>&nbsp;&nbsp;<input type="text" name="search" id="sr"> &nbsp;
                     <input type="submit" value="Search" name="sr" class="btn btn-primary"><br><br>
                     <?php 
                        if(isset($_POST['sr']))
                        {
                           $str="select * from events where title='".$_POST['search']."'";
                        }
                        else
                        {
                           $str="select * from events";
                        }
                        $res=mysqli_query($conn,$str);
                     ?>
                     <table class="table">
                        <tr class="thead-dark">
                           <th>ID</th>
                           <th>Profile</th>
                           <th>TITLE</th>
                           <th>DESCRIPTION</th>
                           <th>VENUE</th>
                           <th>DATE</th>
                           <th>TIME</th>
                           <th>CAPACITY</th>
                           <th>ACTION</th>
                        </tr>
                        <?php while($row=mysqli_fetch_array($res)){?>
                        <tr>
                           <td><?php echo $row['id'];?></td>
                           <td><img src="images/img/<?php echo $row['Profile'];?>" height="100px" width="100px" style="border-radius:30px"></td>
                           <td><?php echo $row['title'];?></td>
                           <td><?php echo $row['description'];?></td>
                           <td><?php echo $row['venue'];?></td>
                           <td><?php echo $row['date'];?></td>
                           <td><?php echo $row['time'];?></td>
                           <td><?php echo $row['capacity'];?></td>
                           <td><a class="fa fa-trash fa-lg" onclick="return confirm('Do you want to delete this record?')" href="?id=<?php echo $row['id'];?>"></a> | <a class="fa fa-pencil fa-lg" href="add_events.php?id=<?php echo $row['id'];?>"></a></td>
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