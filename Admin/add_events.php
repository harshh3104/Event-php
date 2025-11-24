<?php 
session_start();
if(!isset($_SESSION['mail'])){
   header("Location: index.php");
   exit();
}
   include 'connection.php';
   $title=$desc=$venue=$img=$pro=$date=$time=$cap="";

   if(isset($_GET['id']))
   {
      $id=$_GET['id'];
      $str="select * from events where id=".$id."";
      $res=mysqli_query($conn,$str);
      $row=mysqli_fetch_array($res);
      $title=$row['title'];
      $desc=$row['description'];
      $venue=$row['venue'];
      $date=$row['date'];
      $time=$row['time'];
      $cap=$row['capacity'];
      $pro=$row['Profile'];
   }
   
   if(isset($_POST['btn']))
   {
      if(!empty($_GET['id']))
      {
         move_uploaded_file($_FILES['profile']['tmp_name'],"images/img/".$_FILES['profile']['name']);
         $img=$_FILES['profile']['name'];
         
         $str="update events set title='".$_POST['title']."',description='".$_POST['desc']."',venue='".$_POST['venue']."',date='".$_POST['date']."',time='".$_POST['time']."',capacity='".$_POST['capacity']."',profile='".$img."' where id=".$id."";
         $res=mysqli_query($conn,$str);
         header("location:show_events.php");
      }
      else
      {         
         move_uploaded_file($_FILES['profile']['tmp_name'],"images/img/".$_FILES['profile']['name']);
         $img=$_FILES['profile']['name'];
         
         $str="insert into events values(NULL,'".$_POST['title']."','".$_POST['desc']."','".$_POST['venue']."','".$_POST['date']."','".$_POST['time']."','".$_POST['capacity']."','".$img."')";
         $res=mysqli_query($conn,$str);
      }
   }
?>

<html>
   <head>
      <title>Add Events | Admin</title>
      <?php 
         include 'links.php';
      ?>
      <style>
         label {
            font-weight: bold; /* This will keep the bold styling */
            color: black;
         }
      </style>
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <?php
               include 'header.php';            
            ?>
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <?php 
                  include 'topbar.php';
               ?>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Add Events</h2>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php if(isset($_POST['btn'])) { if(!empty($_GET['id'])) { ?>
                  <div class='alert alert-success'>Event Updated!</div>
                  <?php } else { ?>
                  <div class='alert alert-success'>Event Added!</div>
                  <?php }  } ?>
                  <!-- Add Event Form -->
                  <form method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                     <label for="title">Enter Title</label>
                     <input type="text" name="title" value="<?php echo $title;?>"  id="title" class="form-control">
                  </div>

                  <div class="form-group">
                     <label for="desc">Enter Description</label>
                     <textarea name="desc" id="desc" class="form-control"><?php echo $desc;?></textarea>
                  </div>

                  <div class="form-group">
                     <label for="venue">Enter Venue</label>
                     <input type="text" name="venue" id="venue" value="<?php echo $venue;?>" class="form-control">
                  </div>

                  <div class="form-group">
                     <label for="profile">Enter Image</label>
                     <input type="file" name="profile" id="profile" class="form-control"><?php echo $pro;?>
                  </div>

                  <div class="form-group">
                     <label for="date">Enter Date</label>
                     <input type="date" name="date" id="date" value="<?php echo $date;?>" min="<?php echo date('Y-m-d'); ?>" class="form-control">
                  </div>

                  <div class="form-group">
                     <label for="time">Enter Time</label>
                     <input type="time" name="time" id="time" value="<?php echo $time;?>" class="form-control">
                  </div>

                  <div class="form-group">
                     <label for="cap">Enter Capacity</label>
                     <input type="text" name="capacity" id="cap" value="<?php echo $cap;?>" class="form-control">
                  </div>

                  <div class="form-group">                  
                     <input type="submit" name="btn" value="<?php if(isset($_GET['id'])){ echo 'Update'; } else { echo 'Insert'; }?>" class="btn btn-success">
                  </div>
                  </form>
                  <!-- footer -->
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