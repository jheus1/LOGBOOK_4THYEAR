<div class="section">
            <div class="row justify-content-end">
               <div class="col-md-7 mt-4">
                  <div class="card cb1 mt-3 mb-3">
                     <div class="card-body">
                        <h4 class="text-center t1"><strong>LOGS DASHBOARD</strong></h4>
                        <div class="table-responsive">
                           <table class="table table-hover t2" id="myTable">
                              <thead class="bg-warning t2">
                                 <tr>
                                    <th>ID</th>
                                    <th>User No</th>
                                    <th>Title</th>
                                    <th>Name</th>
                                    <th>Purpose</th>
                                    <th>Time</th>
                                    <th>Date</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 
                                 <?php foreach ($data as $row) { ?>
                                    
                                 <tr>
                                    <td><?= strtoupper($row['log_id']); ?></td>
                                    <td><?= strtoupper($row['user_no']); ?></td>
                                    <td><?= strtoupper($row['log_title']); ?></td>
                                    <td><?= strtoupper ($row['log_firstname'] . ' ' . $row['log_middlename'] . ' ' . $row['log_lastname']); ?></td>
                                    <td><?= strtoupper($row['log_purpose']); ?></td>
                                    <td><?= date('h:i A', strtotime($row['date'])); ?></td>
                                    <td><?= date('l, F j, Y', strtotime($row['date'])); ?></td>
                                 </tr>
                                 <?php } ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- User Form (displayed only if user is found) -->
               <?php if ($userData): ?>
               <div class="col-md-5 mt-4">
                  <div class="card mt-3 mb-3 ms-3 me-3 cb1">
                     <h3 class="text-center t1 mt-5">User Form</h3>
                     <div class="card-body">
                        <form action="" method="POST">
                           <!-- Display user details (disabled) -->
                           <div class="form-group row justify-content-center">
                              <label class="col-sm-5 col-form-label form-label-highlight mb-3 t2">Faculty/Student No.</label>
                              <div class="col-sm-5">
                                 <input type="text" class="form-control border border-primary mb-3 t3" name="user_no" placeholder="Faculty/Student No." disabled value="<?php echo $userData['user_no']; ?>">
                                 <input type="hidden" name="user_id" value="<?php echo $userData['user_id']; ?>"> <!-- Hidden field to submit user_no -->
                              </div>
                           </div>
                           <div class="form-group row justify-content-center">
                              <label class="col-sm-5 col-form-label form-label-highlight mb-3 t2">Name</label>
                              <div class="col-sm-5">
                                 <input type="text" class="form-control border border-primary mb-3 t3" name="fullname" placeholder="Full Name" disabled value="<?php echo $userData['firstname'] . ' ' . $userData['middlename'] . ' ' . $userData['lastname']; ?>">
                              </div>
                           </div>
                           <div class="form-group row justify-content-center">
                              <label class="col-sm-5 col-form-label form-label-highlight mb-3 t2">Title</label>
                              <div class="col-sm-5">
                                 <input type="text" class="form-control border border-primary mb-3 t3" name="title" placeholder="Title" disabled value="<?php echo $userData['title']; ?>">
                              </div>
                           </div>
                           <!-- Select purpose -->
                           <div class="form-group row justify-content-center">
                              <label class="col-sm-5 col-form-label form-label-highlight mb-3 t2">Purpose</label>
                              <div class="col-sm-5">
                                 <select class="form-control border border-primary mb-3 t3" name="purpose">
                                    <option value="None"selected>Select Purpose</option>
                                    <option value="Consultation">Consultation</option>
                                    <option value="Visitation">Visitation</option>
                                 </select>
                              </div>
                           </div>
                           <div class=" me-2 mt-3">
                              <div class="form-group text-center">
                                 <button type="submit" name="log_submit" class="btn btn-outline-success"><i class="fas fa-save"></i>&nbsp;&nbsp;SUBMIT</button>
                                 <a href="./index.php" class="btn btn-outline-danger btn-block border border-dark" class="btn btn-lg btn-warning btn-block text-uppercase" name="cancel" value="Cancel" title="Cancel"><i class="fa-solid fa-xmark"></i>&nbsp;&nbsp;Cancel</a>

                              </div>
                           </div>
                        </form>
                     </div>
                     <?php else: ?>
                     <div class="col-md-5 mt-4">
                         <div class="row justify-content-start">
                             <div class="alert alert-danger mt-3 text-center fw-bold">User not found. Please insert your Faculty/Student no. on the search button.</div>
                         </div>
                        <!-- Guest form (hidden by default) -->
                        <div id="guestForm" class="hidden">

                           <div class="section">
                              <div class="row justify-content-center">
                                 <div class="card cb1">
                                    <h3 class="text-center t1">Guest Form</h3>
                                    <div class="card-body">

                                       <form action="" method="POST">
                                          <div class="form-group row justify-content-center">
                                             <label class="col-sm-5 col-form-label form-label-highlight mb-3 t2">Purpose</label>
                                             <div class="col-sm-5">
                                                <select class="form-control border border-primary mb-3 t3" name="g_purpose" >
                                                   <option value="None" selected>Select Purpose</option>
                                                   <option value="Consultation">Consultation</option>
                                                   <option value="Submit Proposal">Submit Proposal</option>
                                                   <option value="Get Documents">Get Documents</option>
                                                   <option value="Visitation">Visitation</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="form-group row justify-content-center">
                                             <label class="col-sm-5 col-form-label form-label-highlight mb-3 t2">First Name</label>
                                             <div class="col-sm-5">
                                                <input type="text" class="form-control border border-primary mb-3 t3" name="firstname" placeholder="First Name" required>
                                                
                                             </div>
                                          </div>
                                          <div class="form-group row justify-content-center">
                                             <label class="col-sm-5 col-form-label form-label-highlight mb-3 t2">Middle Name</label>
                                             <div class="col-sm-5">
                                                <input type="text" class="form-control border border-primary mb-3 t3" name="middlename" placeholder="Middle Name" >
                                             </div>
                                          </div>
                                          <div class="form-group row justify-content-center">
                                             <label class="col-sm-5 col-form-label form-label-highlight mb-3 t2">Last Name</label>
                                             <div class="col-sm-5">
                                                <input type="text" class="form-control border border-primary mb-3 t3" name="lastname" placeholder="Last Name" required>
                                             </div>
                                          </div>
                                          
                                          <div class=" me-2 mt-3">
                                          <div class="form-group text-center">
                                             <button type="submit" name="g_submit" class="btn btn-outline-success"><i class="fas fa-save"></i>&nbsp;&nbsp;SUBMIT</button>
                                             <a href="./index.php" class="btn btn-outline-danger btn-block border border-dark" class="btn btn-lg btn-warning btn-block text-uppercase" name="cancel" value="Cancel" title="Cancel"><i class="fa-solid fa-xmark"></i>&nbsp;&nbsp;Cancel</a>
                                          </div>
                                       </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>

                     </div>
                     <?php endif; ?>
                  </div>
               </div>
            </div>
         </div>