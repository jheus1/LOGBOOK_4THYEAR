<?php
   include '../classes/logbook.php';
   $database = new Database();
   $db = $database->connect(); 
   $addLogs = new AddLogs($db);
   
   $data = $addLogs->getAllGuest();
   ?>
<!DOCTYPE html>
<html lang="en">
   <title>Log Dashboard</title>
   <?php include '../includes/head_dashboard.php';?>
   <?php include '../includes/topbar2.php';?>
   <body>
      <div class="background_img"></div>
      <div class="container">
      <div class="noprint">
         <div class="row justify-content-end mt-3">
            <div class="col-auto">
               <div class="card">
                  <div class="card-body">
                     <button type="button" class="btn btn-outline-primary" id="btnPrint" onclick="printPage()">   
                     Print <i class="fa-solid fa-print"></i>
                     </button>
                  </div>
               </div>
            </div>
         </div>
         </div>
         <div class="row justify-content-center mt-3">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-body">
                     <div class="row justify-content-end mt-2">
                        <div class="col-auto">
                           <button type="button" class="btn-close" aria-label="Close" onclick="window.location.href='./admin.php'" aria-label="Close" style="background-color: #ff0000;"></button>
                        </div>
                     </div>
                     <h4 class="text-center t1"><strong>GUEST DASHBOARD</strong></h4>
                     <div class="table-responsive">
                        <table class="table table-hover t2" id="myTable">
                           <thead class="bg-warning t2">
                              <tr>
                                 <th>User ID</th>
                                 <th>Title</th>
                                 <th>Username</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($data as $row) { ?>
                              <tr>
                                 <td><?= strtoupper($row['guest_id']); ?></td>
                                 <td><?= strtoupper($row['title']); ?></td>
                                 <td><?= strtoupper($row['firstname']) . ' ' . strtoupper($row['middlename']) . ' ' . strtoupper($row['lastname']); ?></td>
                              </tr>
                              <?php } ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php include '../includes/libraries.php';?>
      <script type="text/javascript" src="../js/data_table.js"></script>
   </body>
</html>