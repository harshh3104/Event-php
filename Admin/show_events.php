<?php 
   session_name('admin_session');
   session_start();
   if(!isset($_SESSION['email'])){
      header("Location: index.php");
      exit();
   }

   include 'connection.php';

   if(isset($_POST['sr'])){
      $search = mysqli_real_escape_string($conn, $_POST['search']);
      $str = "SELECT * FROM events WHERE title LIKE '%$search%' ORDER BY id DESC";
   } else {
      $str = "SELECT * FROM events ORDER BY id DESC";
   }
   $res = mysqli_query($conn,$str);

   if(isset($_GET['id'])){   
      $id = $_GET['id'];
      $sql = "DELETE FROM events WHERE id = $id";
      mysqli_query($conn,$sql);
      header("location:show_events.php");
   }
?>

<html>
<head>
   <title>Manage Events | Admin</title>
   <link rel="stylesheet" href="css/events.css">
   <?php include 'links.php'; ?>
</head>

<body class="dashboard dashboard_1">
   <div class="full_container">
      <div class="inner_container">

         <?php include 'header.php'; ?>

         <div id="content">

            <?php include 'topbar.php'; ?>

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
               
               <!-- Search + Table Card -->
               <div class="card-custom">

                  <!-- Search Bar -->
                  <form method="POST" class="search-box">
                     <input type="text" name="search" id="sr" class="form-control" placeholder="Search events..." />
                     <button type="submit" name="sr" class="btn btn-primary">
                        <i class="fa fa-search"></i>
                     </button>
                  </form>
                  
                  <div class="table-responsive">
                     <table class="table table-custom">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>Profile</th>
                              <th>Title</th>
                              <th>Description</th>
                              <th>Venue</th>
                              <th>Date</th>
                              <th>Time</th>
                              <th>Capacity</th>
                              <th>Action</th>
                           </tr>
                        </thead>

                        <tbody>
                        <?php while($row = mysqli_fetch_array($res)){ ?>
                           <tr>
                              <td><?php echo $row['id']; ?></td>
                              <td><img src="images/img/<?php echo $row['Profile']; ?>"class="event-img"></td>
                              <td><strong><?php echo $row['title']; ?></strong></td>
                              <td style="max-width:300px;"><?php echo $row['description']; ?></td>
                              <td><?php echo $row['venue']; ?></td>
                              <td><span class="badge bg-primary"><?php echo $row['date']; ?></span></td>
                              <td><?php echo $row['time']; ?></td>
                              <td><span class="badge bg-success"><?php echo $row['capacity']; ?></span></td>
                              <td>
                                 <a href="add_events.php?id=<?php echo $row['id']; ?>"class="btn-action btn-edit">
                                    <i class="fa fa-pencil"></i>
                                 </a>

                                 <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $row['id']; ?>)" class="btn-action btn-delete">
                                    <i class="fa fa-trash"></i>
                                 </a>
                              </td>
                           </tr>
                        <?php } ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- jQuery -->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/custom.js"></script>
   <?php include "scripts.php";?>
</body>
</html>