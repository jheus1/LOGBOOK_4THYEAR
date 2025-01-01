<?php
   include "../login/a_login.php";
   ?>
<!DOCTYPE html>
<html lang="en">
   <title>Admin Login</title>
   <?php include '../includes/head_login.php';?>
   <?php include '../includes/topbar3.php';?>
   <body id="page-top" onload="startTime()" style="background-color:#3ba0ff;">
      <div class="container">
         <div class="row justify-content-center mt-5">
            <div class="col-md-4">
               <div class="card mt-2">
                  <a class="row justify-content-center" href="../index.php">
                  <img src="../image/neust_logo.png" class="card-img-top mt-3" alt="card-img-top" style="height: 200px; width: 225px">
                  </a>
                  <div class="card-body">
                     <form action="" method="post" enctype="multipart/form-data">
                        <h3 class="text-center t2">ADMIN LOGIN</h3>
                        <p class="text-muted" style="font-size: 15px; color: black; margin-bottom:-0px;">SIGN IN to start your session.</p>
                        <div class="form-outline mb-3">
                           
                           <input type="email" name="email" id="email" placeholder="Enter email" class="form-control border border-info" required>
                        </div>
                        <div class="form-outline mb-3">
                           <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control border border-info" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                        </div>
                        <button type="submit" class="btn btn-outline-info btn-block border border-info mb-3" name="submit" value="submit" title="Login"><i class="fas fa-sign-in"></i>&nbsp;&nbsp;Sign In</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>