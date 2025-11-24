<?php
session_start();
if(!isset($_SESSION['mail'])){
   header("Location:index.php");
   exit();
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Dashboard | Admin</title>
      <?php 
         include 'links.php';
      ?>
      <style>
         .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
         }
         .card-icon {
            font-size: 2.5rem;
         }
      </style>
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
                     <h1 class="mt-4">Admin Dashboard</h1>
                     <br>
                     <?php
                        if (isset($_SESSION['success_message'])) 
                        {
                           echo '<div class="alert alert-success text-center" role="alert">' . $_SESSION['success_message'] . '</div>';
                           unset($_SESSION['success_message']);
                        }
                     ?>
                     <br>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="card text-white bg-primary mb-3">
                              <div class="card-body d-flex justify-content-between align-items-center">
                                 <div>
                                    <h5 class="card-title">Total Events</h5>
                                    <p class="card-text h2">25</p>
                                 </div>
                                 <i class="fa fa-calendar-check-o card-icon"></i>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="card text-white bg-success mb-3">
                              <div class="card-body d-flex justify-content-between align-items-center">
                                 <div>
                                    <h5 class="card-title">Total Participants</h5>
                                    <p class="card-text h2">540</p>
                                 </div>
                                 <i class="fa fa-users card-icon"></i>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="card text-white bg-info mb-3">
                              <div class="card-body d-flex justify-content-between align-items-center">
                                 <div>
                                    <h5 class="card-title">Upcoming Events</h5>
                                    <p class="card-text h2">3</p>
                                 </div>
                                 <i class="fa fa-calendar-plus-o card-icon"></i>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="card text-white bg-warning mb-3">
                              <div class="card-body d-flex justify-content-between align-items-center">
                                 <div>
                                    <h5 class="card-title">Total Users</h5>
                                    <p class="card-text h2">150</p>
                                 </div>
                                 <i class="fa fa-user-circle-o card-icon"></i>
                              </div>
                           </div>
                        </div>
                     </div>
                  
                     <div class="card mt-4">
                        <div class="card-header" style="font-weight:bold">Upcoming Events</div>
                        <div class="card-body">
                           <table class="table table-striped">
                              <thead>
                                 <tr>
                                    <th>Event</th>
                                    <th>Date</th>
                                    <th>Category</th>
                                    <th>Participants</th>
                                    <th>Status</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>Cultural Fest</td>
                                    <td>4 Oct 2025</td>
                                    <td>Cultural</td>
                                    <td>120</td>
                                    <td><span class="badge bg-warning">Upcoming</span></td>
                                 </tr>
                                 <tr>
                                    <td>Hackathon</td>
                                    <td>15 Oct 2025</td>
                                    <td>Technical</td>
                                    <td>85</td>
                                    <td><span class="badge bg-warning">Upcoming</span></td>
                                 </tr>
                                 <tr>
                                    <td>Box Cricket</td>
                                    <td>31 Oct 2025</td>
                                    <td>Sports</td>
                                    <td>60</td>
                                    <td><span class="badge bg-warning">Upcoming</span></td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                     
                     <div class="card mt-4">
                        <div class="card-header" style="font-weight:bold">Recently Registered Users</div>
                        <div class="card-body">
                           <table class="table table-striped">
                              <thead>
                                 <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Registration Date</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>John Doe</td>
                                    <td>john.doe@example.com</td>
                                    <td>20 Sep 2025</td>
                                 </tr>
                                 <tr>
                                    <td>Jane Smith</td>
                                    <td>jane.smith@example.com</td>
                                    <td>19 Sep 2025</td>
                                 </tr>
                                 <tr>
                                    <td>Peter Jones</td>
                                    <td>peter.jones@example.com</td>
                                    <td>18 Sep 2025</td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>

                     <div class="card mt-4">
                        <div class="card-header" style="font-weight:bold">Popular Events</div>
                        <div class="card-body">
                           <table class="table table-striped">
                              <thead>
                                 <tr>
                                    <th>Event</th>
                                    <th>Participants</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>Annual Gala</td>
                                    <td>500</td>
                                 </tr>
                                 <tr>
                                    <td>Tech Summit</td>
                                    <td>350</td>
                                 </tr>
                                 <tr>
                                    <td>Startup Pitch Night</td>
                                    <td>200</td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
               </div>
         </div>
      </div>
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/animate.js"></script>
      <script src="js/bootstrap-select.js"></script>
      <script src="js/owl.carousel.js"></script> 
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <script src="js/chart_custom_style1.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>