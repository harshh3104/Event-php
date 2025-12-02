<?php 
   session_name('admin_session');
   session_start();
   if(!isset($_SESSION['email'])){
      header("Location: index.php");
      exit();
   } 

   include 'connection.php';

   // SEARCH HANDLING
   if(isset($_POST['sr'])) {
      $search = mysqli_real_escape_string($conn, $_POST['search']);
      $str = "SELECT * FROM users WHERE name LIKE '%$search%' OR email LIKE '%$search%' ORDER BY id DESC";
   } else {
      $str = "SELECT * FROM users ORDER BY id DESC";
   }
   $res = mysqli_query($conn,$str);   

   // DELETE HANDLING
   if(isset($_GET['id'])) {   
      $id = $_GET['id'];
      $sql = "DELETE FROM users WHERE id = $id";
      mysqli_query($conn,$sql);
      header("location:show_users.php");
      exit();
   }
?>

<html>
   <head>
      <title>Manage Users | Admin</title>
      <?php include 'links.php'; ?>

      <style>
         body {
            background: #f5f7fa;
         }

         /* Page Header */
         .page-header-custom {
            background: linear-gradient(135deg, #0ea5e9, #6366f1);
            padding: 25px 30px;
            border-radius: 12px;
            color: #fff;
            margin-bottom: 25px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
         }

         /* Search bar */
         .search-box {
            max-width: 420px;
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
         }

         /* Card wrapper */
         .card-custom {
            padding: 25px;
            border-radius: 12px;
            background: #ffffff;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
         }

         /* Table styling */
         .table-custom {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.07);
         }
         .table-custom thead {
            background: #1e293b;
            color: #fff;
         }
         .table-custom tbody tr:hover {
            background: #f1f5f9;
            transition: 0.2s;
         }
         .table td, .table th {
            vertical-align: middle;
            font-size: 14px;
         }

         /* User type badge */
         .badge-role {
            padding: 5px 10px;
            border-radius: 999px;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .06em;
         }
         .badge-user {
            background: #e0f2fe;
            color: #0369a1;
         }
         .badge-admin {
            background: #fee2e2;
            color: #b91c1c;
         }

         /* Action button */
         .btn-action {
            padding: 6px 10px;
            margin: 2px;
            border-radius: 6px;
            font-size: 14px;
         }
         .btn-delete {
            background: #dc2626;
            color: white;
         }
         .btn-delete:hover {
            background: #b91c1c;
         }

         /* Password appearance */
         .pwd-text {
            font-family: "Courier New", monospace;
            font-size: 13px;
            color: #4b5563;
            word-break: break-all;
         }

      </style>
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
                              <h2>Manage Users</h2>
                           </div>
                        </div>
                     </div>
                  </div>
                     <!-- MAIN CARD -->
                     <div class="card-custom">

                        <!-- SEARCH BAR -->
                        <form method="POST" class="search-box">
                           <input type="text" name="search" id="sr" class="form-control"
                                  placeholder="Search by name or email..." />
                           <button type="submit" name="sr" class="btn btn-primary">
                              <i class="fa fa-search"></i>
                           </button>
                        </form>

                        <!-- USERS TABLE -->
                        <div class="table-responsive">
                           <table class="table table-custom">
                              <thead>
                                 <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Confirm Password</th>
                                    <th>User Type</th>
                                    <th class="text-center">Action</th>
                                 </tr>
                              </thead>

                              <tbody>
                                 <?php while($row = mysqli_fetch_array($res)) { ?>
                                    <tr>
                                       <td><?php echo $row['id']; ?></td>
                                       <td><strong><?php echo $row['name']; ?></strong></td>
                                       <td><?php echo $row['email']; ?></td>
                                       <td class="pwd-text"><?php echo $row['password']; ?></td>
                                       <td class="pwd-text"><?php echo $row['cpassword']; ?></td>
                                       <td>
                                          <?php if(strtolower($row['utype']) == 'admin') { ?>
                                             <span class="badge-role badge-admin">Admin</span>
                                          <?php } else { ?>
                                             <span class="badge-role badge-user">User</span>
                                          <?php } ?>
                                       </td>
                                       <td class="text-center">
                                          <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $row['id']; ?>)" class="btn-action btn-delete">
                                             <i class="fa fa-trash"></i>
                                          </a>
                                       </td>
                                    </tr>
                                 <?php } ?>
                              </tbody>
                           </table>
                        </div>
                     </div> <!-- /card-custom -->

                  </div>
               </div>
               <!-- end dashboard inner -->

            </div>
         </div>
      </div>

      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/animate.js"></script>
      <script src="js/owl.carousel.js"></script> 
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <script src="js/custom.js"></script>
      <script src="js/chart_custom_style1.js"></script>
      <?php include "scripts.php"; ?>
   </body>
</html>