<?php 
   session_name('admin_session');
   session_start();
   if(!isset($_SESSION['email'])){
      header("Location: index.php");
      exit();
   }
   include 'connection.php';
   $title=$desc=$venue=$img=$pro=$date=$time=$cap="";
   $maxDate = date('Y-m-d', strtotime('+1 year'));

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
      $eventDate = $_POST['date'];
      $today     = date('Y-m-d');
      $maxLimit  = date('Y-m-d', strtotime('+1 year'));

      if ($eventDate < $today || $eventDate > $maxLimit) {
         echo "<script>
                  Swal.fire({
                     icon: 'error',
                     title: 'Invalid Event Date',
                     text: 'Event date must be within 1 year from today.',
                     confirmButtonColor: '#d33'
                  });
               </script>";
         exit();
      }

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
      <!-- SweetAlert2 -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <?php 
         include 'links.php';
      ?>

      <style>
         label {
            font-weight: bold;
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

                  <!-- Add Event Form -->
                  <form method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                     <label for="title">Title</label>
                     <input type="text" name="title" placeholder="Enter Title" value="<?php echo $title;?>" id="title" class="form-control">
                  </div>

                  <div class="form-group">
                     <label for="desc">Description</label>
                     <textarea name="desc" id="desc" placeholder="Enter Description" class="form-control"><?php echo $desc;?></textarea>
                  </div>

                  <div class="form-group">
                     <label for="venue">Venue</label>
                     <input type="text" name="venue" id="venue" placeholder="Enter Venue" value="<?php echo $venue;?>" class="form-control">
                  </div>

                  <div class="form-group">
                     <label for="profile">Event Image</label>
                     <input type="file" name="profile" id="profile" class="form-control"><?php echo $pro;?>
                  </div>

                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="date">Date</label>
                           <input type="date" name="date" id="date" value="<?php echo $date;?>" min="<?php echo date('Y-m-d'); ?>" max="<?php echo $maxDate; ?>" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="time">Time</label>
                           <input type="time" name="time" id="time" value="<?php echo $time;?>" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="cap">Capacity</label>
                           <input type="text" name="capacity" id="cap" placeholder="Enter Capacity" value="<?php echo $cap;?>" class="form-control">
                        </div>
                     </div>
                  </div>
                  <div class="form-group">                  
                     <input type="submit" style="height: 40px" name="btn" value="<?php if(isset($_GET['id'])){ echo 'Update'; } else { echo 'Insert'; }?>" class="btn btn-success w-25">
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
      <?php if (isset($_POST['btn'])): ?>
      <script>
         Swal.fire({
            icon: 'success',
            title: 'Event Added Successfully',
            text: 'New event has been added',
            confirmButtonColor: '#4c6fff'
         });
      </script>
      <?php unset($_SESSION['added']); endif; ?>
   </body>
</html>