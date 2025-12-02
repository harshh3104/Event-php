<?php 
   session_name('admin_session');
   session_start();
   if(!isset($_SESSION['email'])){
      header("Location: index.php");
      exit();
   }

   include 'connection.php';

   // Get all registrations
   $str = "SELECT r.id, u.id AS user_id, u.name AS user_name, 
                  e.id AS event_id, e.title AS event_title, 
                  r.registered_at 
           FROM registrations r 
           INNER JOIN users u ON r.user_id = u.id 
           INNER JOIN events e ON r.event_id = e.id 
           ORDER BY r.id DESC";

   $res = mysqli_query($conn,$str);   

   if(isset($_GET['id'])) 
   {   
      $id = $_GET['id'];
      $st="DELETE FROM registrations WHERE id=$id";
      mysqli_query($conn,$st);
      header("location:show_registrations.php");
      exit();
   }
?>

<html>
<head>
    <title>Manage Registrations | Admin</title>
    <?php include 'links.php'; ?>

    <style>
        body {
            background: #f5f7fa;
        }

        /* Header */
        .page-header-custom {
            background: linear-gradient(135deg, #06b6d4, #6366f1);
            padding: 25px 30px;
            border-radius: 12px;
            color: #fff;
            margin-bottom: 25px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        /* Card */
        .card-custom {
            background: #ffffff;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.10);
        }

        /* Table */
        .table-custom {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
        .table-custom thead {
            background: #1e293b;
            color: white;
        }
        .table-custom tbody tr:hover {
            background: #f1f5f9;
            transition: 0.2s ease-in-out;
        }

        /* Pills (User/Event styling) */
        .pill {
            padding: 6px 12px;
            border-radius: 40px;
            font-size: 13px;
            font-weight: 600;
            display: inline-block;
        }
        .pill-user {
            background: #e0f2fe;
            color: #0369a1;
        }
        .pill-event {
            background: #fce7f3;
            color: #be185d;
        }

        /* Delete button */
        .btn-delete {
            padding: 7px 10px;
            border-radius: 6px;
            background: #dc2626;
            color: #fff;
        }
        .btn-delete:hover {
            background: #b91c1c;
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
                              <h2>Manage Registrations</h2>
                           </div>
                        </div>
                     </div>
                     
                     <!-- MAIN CARD -->                     
                     <div class="card-custom">                     
                        <div class="table-responsive">
                           <table class="table table-custom">
                              <thead>
                                 <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Event</th>
                                    <th>Registered At</th>
                                    <th class="text-center">Action</th>
                                 </tr>
                              </thead>

                              <tbody>
                              <?php while($row=mysqli_fetch_array($res)) { ?>
                                 <tr>
                                    <td><strong><?php echo $row['id']; ?></strong></td>
                                    <td><span class="pill pill-user">ID: <?php echo $row['user_id']; ?> — <?php echo $row['user_name']; ?></span></td>
                                    <td><span class="pill pill-event">ID: <?php echo $row['event_id']; ?> — <?php echo $row['event_title']; ?></span></td>
                                    <td><?php echo $row['registered_at']; ?></td>
                                    <td class="text-center">
                                       <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $row['id']; ?>)" class="btn-delete">
                                          <i class="fa fa-trash"></i>
                                       </a>
                                    </td>
                                 </tr>
                              <?php } ?>
                              </tbody>
                           </table>
                        </div>
                     </div><!-- /card-custom -->
                  </div>
               </div>
            </div>
         </div>
      </div>

   <!-- Scripts -->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/animate.js"></script>
   <script src="js/owl.carousel.js"></script> 
   <script src="js/perfect-scrollbar.min.js"></script>

   <script>
      var ps = new PerfectScrollbar('#sidebar');
   </script>

   <script src="js/custom.js"></script>
   <?php include "scripts.php";?>
</body>
</html>
