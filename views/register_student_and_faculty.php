<?php
include '../classes/logbook.php';
$database = new Database();
$db = $database->connect(); 
$addLogs = new AddLogs($db);

$addLogs->user_submit();

?>
<!DOCTYPE html>
<html lang="en">
   <title>Register Faculty/Student</title>
   <?php include '../includes/head_registration.php';?>
   <?php include '../includes/topbar2.php';?>
   <body id="page-top" onload="startTime()" style="background-color:#3ba0ff;">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-md-4">
               <div class="card mt-2">
                  <a class="row justify-content-center" href="login.php">
                  <img src="../image/neust_logo.png" class="card-img-top mt-3" alt="card-img-top" style="height: 200px; width: 225px">
                  </a>
                  <div class="card-body">
                     <form action="" method="post" enctype="multipart/form-data">
                        <h3 class="text-center t2">REGISTER NOW</h3>
                        <div class="form-outline mb-1">
                           <input id="#reg_input_user_no" class="form-control border border-info" type="text" name="user_no" placeholder="Faculty/Student No." required autofocus />
                           <div class="badge" id="student-no-check-feedback"></div>
                           <!-- Feedback for User_no -->
                           <p class="text-muted" style="font-size: 11px; color: black;">Faculty/Student No. (e.g., SIC2024-0000)</p>
                        </div>
                        <div class="form-outline mb-3 position-relative">
                           <select id="login_input_user" class="form-control border border-info" name="title" required>
                              <option value="" disabled selected>Select Title</option>
                              <option value="Faculty">Faculty</option>
                              <option value="Student">Student</option>
                           </select>
                           <span class="fas fa-chevron-down position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%); pointer-events: none;"></span>
                        </div>
                        <div class="form-outline mb-3">
                           <input type="text" name="firstname" id="firtsname" placeholder="Enter First Name" class="form-control border border-info" required>
                        </div>
                        <div class="form-outline mb-3">
                           <input type="text" name="lastname" id="lastname" placeholder="Enter Last Name" class="form-control border border-info" required>
                        </div>
                        <div class="form-outline mb-3">
                           <input type="text" name="middlename" id="middlename" placeholder="Enter Middle Name" class="form-control border border-info" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                        </div>
                        <button type="submit" class="btn btn-outline-success btn-block border border-dark" name="user_submit" ><i class="fas fa-save"></i>&nbsp;&nbsp;Register</button>
                        <a href="../index.php" class="btn btn-outline-danger btn-block border border-dark" class="btn btn-lg btn-warning btn-block text-uppercase" name="cancel" value="Cancel" title="Cancel"><i class="fa-solid fa-xmark"></i>&nbsp;&nbsp;Cancel</a>  
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
