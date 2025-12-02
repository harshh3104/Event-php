<!-- <?php 
    // include 'connection.php';
?> -->

<html>
<style>
    .nav-link.dropdown-toggle::after {
        display: none !important;
    }
    .sp
    {
        font-size: xx-large;
        font-family: math;
        font-weight: bold;
        color: white;
    }
</style>
<div class="topbar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="full">
        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
        <div class="logo_section">
            <a href="dashboard.php">&nbsp;<p class="sp">&nbsp;&nbsp;Eventura</p></a>
        </div>
        <div class="right_topbar">
            <div class="icon_info">
            <ul class="user_profile_dd">
                <li>
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img class="img-responsive rounded-circle" src="images/layout_img/user_logo.png" alt="#" />
                    <span class="name_user"><?php echo isset($_SESSION['email']) ? ucfirst($_SESSION['email']) : 'Guest'; ?></span><i class="fa fa-caret-down" style="font-size:20px;"></i></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="logout.php"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                    </div>
                </li>
            </ul>
            </div>
        </div>
        </div>
    </nav>
</div>
</html>