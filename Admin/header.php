<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<!-- Sidebar  -->
   <nav id="sidebar">
      <div class="sidebar_blog_1">
         <div class="sidebar-header">
            <div class="logo_section">
               <a href="dashboard.php"><img class="logo_icon img-responsive" height="50px" width="90px" src="images/logo/logo1.jpg" alt="#" /></a>
            </div>
         </div>
         <div class="sidebar_user_info">
            <div class="icon_setting"></div>
            <div class="user_profle_side">
               <div class="user_img"><img class="img-responsive" src="images/layout_img/user_logo.png" alt="#" /></div>
               <div class="user_info">
                  <h6><?php echo isset($_SESSION['email']) ? ucfirst($_SESSION['email']) : 'Guest'; ?></h6>
                  <span style="font-size: 12px;">Admin</span>
               </div>
            </div>
         </div>
      </div>
      <div class="sidebar_blog_2">
         <h4>General</h4>
         <ul class="list-unstyled components">
            <li class="active">
               <a href="dashboard.php"><i class="fa fa-dashboard white_color"></i> <span>Dashboard</span></a>               
            </li>
            <li>
               <a href="#events" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="bi bi-calendar-event"></i> <span>Events</span></a>
               <ul class="collapse list-unstyled" id="events">
                  <li><a href="add_events.php"> <span>Add Events</span></a></li>
                  <li><a href="show_events.php"> <span>Manage Events</span></a></li>
               </ul>
            </li>
            <li>
               <a href="#users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-group"></i> <span>Users</span></a>
               <ul class="collapse list-unstyled" id="users">
                  <li><a href="show_users.php"> <span>Manage Users</span></a></li>
               </ul>
            </li>
            <li>
               <a href="#registrations" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="material-icons white_color">assignment</i> <span>Registrations</span></a>
               <ul class="collapse list-unstyled" id="registrations">
                  <li><a href="show_registrations.php"> <span>Manage Registrations</span></a></li>
               </ul>
            </li>
            <li class="active">
               <a href="logout.php"><i class="fa fa-sign-out"></i> <span>Logout</span></a>
            </li>
         </ul>
      </div>
   </nav>
</html>