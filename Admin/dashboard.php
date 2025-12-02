<?php
   session_name('admin_session');
   session_start();
   if(!isset($_SESSION['email'])){
      header("Location:index.php");
      exit();
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Dashboard | Admin</title>
   <!-- SweetAlert2 -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <link rel="stylesheet" href="css/dashboard.css">
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

               <!-- PAGE TITLE -->
               <h1 class="page-title mt-3">Admin Dashboard</h1>
               <p class="text-muted mb-4"><i class="fa fa-home"></i> / Admin / Dashboard</p>

               <!-- DASHBOARD CARDS -->
               <div class="row">
                  <div class="col-md-3 mb-4">
                     <div class="stat-card bg-blue">
                        <div>
                           <p class="stat-title">Total Events</p>
                           <h1 class="stat-value">20</h1>
                           <small>+3 added this month</small>
                        </div>
                        <i class="fa fa-calendar-check-o stat-icon"></i>
                     </div>
                  </div>

                  <div class="col-md-3 mb-4">
                     <div class="stat-card bg-green">
                        <div>
                           <p class="stat-title">Total Participants</p>
                           <h1 class="stat-value">500</h1>
                           <small>+120 vs last month</small>
                        </div>
                        <i class="fa fa-users stat-icon"></i>
                     </div>
                  </div>

                  <div class="col-md-3 mb-4">
                     <div class="stat-card bg-purple">
                        <div>
                           <p class="stat-title">Upcoming Events</p>
                           <h1 class="stat-value">5</h1>
                           <small>2 this week</small>
                        </div>
                        <i class="fa fa-calendar-plus-o stat-icon"></i>
                     </div>
                  </div>

                  <div class="col-md-3 mb-4">
                     <div class="stat-card bg-yellow">
                        <div>
                           <p class="stat-title">Total Users</p>
                           <h1 class="stat-value">150</h1>
                           <small>5 new today</small>
                        </div>
                        <i class="fa fa-user-circle-o stat-icon"></i>
                     </div>
                  </div>

               </div>
               
               <div class="row">
                  <div class="col-lg-5 mb-4">
                     <div class="card">
                        <div class="card-header">Overview (Last 6 Months)</div>
                        <div class="card-body">
                           <canvas id="overviewChart" height="180"></canvas>
                        </div>
                     </div>
                     
                     <div class="card mt-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                           <span class="card-section-title">Quick Actions</span>
                        </div>
                        <div class="card-body">
                           <div class="d-flex flex-wrap">
                              <a href="add_events.php" class="btn btn-light btn-sm mr-2 mb-2">
                                 <i class="fa fa-plus-circle mr-1"></i> Create Event
                              </a>
                              <a href="show_events.php" class="btn btn-light btn-sm mr-2 mb-2">
                                 <i class="fa fa-calendar mr-1"></i> Manage Events
                              </a>
                              <a href="show_users.php" class="btn btn-light btn-sm mr-2 mb-2">
                                 <i class="fa fa-users mr-1"></i> View Users
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="col-lg-7 mb-4">
                     <div class="card">
                        <div class="card-header">Upcoming Events</div>
                        <div class="card-body">
                           <table class="table table-hover">
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
                                    <td>14 Dec 2025</td>
                                    <td><span class="badge bg-info text-white">Cultural</span></td>
                                    <td>120</td>
                                    <td><span class="badge bg-warning text-dark">Upcoming</span></td>
                                 </tr>
                                 <tr>
                                    <td>Hackathon</td>
                                    <td>26 Dec 2025</td>
                                    <td><span class="badge bg-primary">Technical</span></td>
                                    <td>85</td>
                                    <td><span class="badge bg-warning text-dark">Upcoming</span></td>
                                 </tr>
                                 <tr>
                                    <td>Box Cricket</td>
                                    <td>08 Jan 2026</td>
                                    <td><span class="badge bg-success">Sports</span></td>
                                    <td>70</td>
                                    <td><span class="badge bg-warning text-dark">Upcoming</span></td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>

               </div>
               
               <div class="row">
                  <div class="col-lg-6 mb-4">
                     <div class="card">
                        <div class="card-header">Recently Registered Users</div>
                        <div class="card-body">
                           <table class="table table-hover">
                              <thead>
                                 <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date</th>
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
                                    <td>08 Apr 2025</td>
                                 </tr>
                                 <tr>
                                    <td>Peter Jones</td>
                                    <td>peter.jones@example.com</td>
                                    <td>26 Oct 2025</td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>

                  <div class="col-lg-6 mb-4">
                     <div class="card">
                        <div class="card-header">Popular Events</div>
                        <div class="card-body">
                           <table class="table table-hover">
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

   </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/Chart.min.js"></script>

<script>
var ctx = document.getElementById("overviewChart");

new Chart(ctx, {
   type: "line",
   data: {
      labels: ["Jun", "Jul", "Aug", "Sep", "Oct", "Nov"],
      datasets: [{
         label: "Registrations",
         data: [80, 120, 150, 200, 260, 300],
         backgroundColor: "rgba(52, 152, 219,0.2)",
         borderColor: "#3498db",
         borderWidth: 3,
         tension: 0.4,
         fill: true
      }]
   },
   options: {
      responsive: true,
      plugins: {
         legend: { display: false }
      }
   }
});
</script>
<?php if (isset($_SESSION['done'])): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Logged in successful',
        text: 'You have logged in successfully.',
        confirmButtonColor: '#4c6fff'
    });
</script>
<?php unset($_SESSION['done']); endif; ?>
</body>
</html>