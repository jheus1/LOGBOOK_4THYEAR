<div class="row justify-content-start">
      <div class="col-md-5">
         <div class="card cb1">
            <div class="card-body">
               <form method="POST" action="">
                  <div class="">
                     <input type="search" class="form-control border border-primary " name="user_no" placeholder="Faculty/Student No. (e.g., SIC2024-0000)" aria-label="Search" value="<?php echo $_POST['user_no'] ?? ''; ?>" />
                     <button type="submit" name="search" class="btn d-none" >
                     </button>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="col-md-1">
         <div class="card cb1">
            <div class="card-body">
            <div class="row">
                  <button class="button btn btn-outline-success" id="guestButton" aria-label="Floating label select example" onclick="showForm()">
                  Guest
                  </button>
               </div>
            </div>
         </div>
      </div>