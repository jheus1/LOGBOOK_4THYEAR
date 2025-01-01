<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login_admin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
   <?php include '../includes/head_admin.php';?>
   <?php include '../includes/topbar4.php';?>
   <body>
      <div class="container">
      <div class="background_img"></div>
         <div class="row justify-content-center">
            <div class="col-md-4 c1">
               <select class="form-select" id="floatingSelect" aria-label="Floating label select example" onchange="location = this.value;">
                  <option selected="">Choose your Service</option>
                  <option value="../views/log_dashboard.php">Log Dashboard</option>
                  <option value="../views/user_dashboard.php">User Dashboard</option>
                  <option value="../views/guest_dashboard.php">Guest Dashboard</option>
               </select>
            </div>
         </div>
      </div>
   </body>
</html>