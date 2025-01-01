<?php
session_start();
include './classes/logbook.php';

$database = new Database();
$db = $database->connect();
$addLogs = new AddLogs($db);

$userData = null;

// Handle search request for user_no
if (isset($_POST['search']) && !empty($_POST['user_no'])) {
    $user_no = $_POST['user_no'];
    // Fetch user data based on user_no
    $userData = $addLogs->getUserByNo($user_no);
}

// Handle form submission
$addLogs->handleLogSubmission();
$addLogs->handleGuestSubmission();



// Fetch all logs after handling form submission
$data = $addLogs->getAllLogs();
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Visitor Logbook</title>
      <?php include './includes/head_index.php'; ?>
      <?php include './includes/topbar1.php'; ?>
   </head>
   <body onload="startTime()">
      <div class="background_img"></div>
      <a id="upBtn" href="#top" style="overflow: hidden; position: fixed; z-index: 1000;"><i class="fa-solid fa-arrow-up fa-lg"></i></a>
      <div class="container">
      <h2 class="mt-4 dancescript"></h2>
      <!-- Search Form and Guest Form -->
      <?php include './views/search_and_guest.php'; ?>
      <div id="">
      <!-- Main Content -->
      <?php include './views/main_content.php'; ?>
      </div>
   </body>
</html>

<?php include './includes/libraries.php'; ?>
<?php include './includes/libraries2.php'; ?>