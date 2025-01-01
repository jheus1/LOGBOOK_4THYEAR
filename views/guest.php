<!DOCTYPE html>
<html lang="en">
   <title>Register Guest</title>
   <?php include '../includes/head_registration.php';?>
   <?php include '../includes/topbar3.php';?>
   <body id="page-top" onload="startTime()">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-md-4">
               <div class="card mt-2">
                  <a class="row justify-content-center" href="login.php">
                  <img src="../image/neust_logo.png" class="card-img-top mt-3" alt="card-img-top" style="height: 200px; width: 225px">
                  </a>
                  <div class="card-body">
                     <form action="" method="post" enctype="multipart/form-data">
                        <h3 class="text-center t2">GUEST REGISTRATION</h3>
                        <div class="form-outline mb-3">
                           <input type="text" name="first name" id="first_name" placeholder="Enter First Name" class="form-control border border-info" required>
                        </div>
                        <div class="form-outline mb-3">
                           <input type="text" name="last name" id="last_name" placeholder="Enter Last Name" class="form-control border border-info" required>
                        </div>
                        <div class="form-outline mb-3">
                           <input type="text" name="middle name" id="middle_name" placeholder="Enter Middle Name" class="form-control border border-info" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                        </div>
                        <div class="form-outline mb-3 position-relative">
                           <select id="login_input_guess" class="form-control border border-info" name="guess" required>
                              <option value="" disabled selected>Select Purpose</option>
                              <option value="consultation">Consultation</option>
                              <option value="others">Others</option>
                           </select>
                           <span class="fas fa-chevron-down position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%); pointer-events: none;"></span>
                        </div>
                        <button type="submit" class="btn btn-outline-success btn-block border border-dark" name="register" value="Register" title="Register"><i class="fas fa-save"></i>&nbsp;&nbsp;Register</button>
                        <a href="../index.php" class="btn btn-outline-danger btn-block border border-dark" class="btn btn-lg btn-warning btn-block text-uppercase" name="cancel" value="Cancel" title="Cancel"><i class="fa-solid fa-xmark"></i>&nbsp;&nbsp;Cancel</a>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>