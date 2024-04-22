<?php 
session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["full_name"])) {
}
else{
    header("location: ../index.php?state=redirected_not_logged_in");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1920, initial-scale=1.0">
    <title>Dashboard (Admin) - Schedule Plotting System</title>
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../assets/vendor/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../assets/vendor/chart.js/chart.js">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<div class="sidebar">
  <img src="../assets/img/school_logo_sample.jpg" alt="" height="100px">
  <a id="btn_dashboard" href="#" class="align-items-center d-flex">Dashboard <div class="material-symbols-rounded mx-3">dashboard</div> </a>
  <a id="btn_users" href="#" class="align-items-center d-flex">Users <div class="material-symbols-rounded mx-3">group</div></a>
  <!-- <a id="btn_blocks" href="#" class="align-items-center d-flex">Blocks <div class="material-symbols-rounded mx-3">grid_view</div></a> -->
  <a id="btn_schedules" href="#" class="align-items-center d-flex">Schedules <div class="material-symbols-rounded mx-3">schedule</div></a>
  <a id="btn_rooms" href="#" class="align-items-center d-flex">Rooms <div class="material-symbols-rounded mx-3">nest_multi_room</div></a>
  <a id="btn_teachers" href="#" class="align-items-center d-flex">Teachers <div class="material-symbols-rounded mx-3">person_edit</div></a>
</div>

<!-- Page content -->
<div class="content" id="content">
  
</div>
</body>
<script src="../assets/js/jquery-3.6.1.min.js"></script>
<script src="../assets/js/chart.umd.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.js"></script>
<script>
  $(document).ready(()=>{
    $("#content").load("./contents/dashboard.php");
      $("#btn_dashboard").click((e)=>{
        $("#content").load("./contents/dashboard.php");
        $("#btn_schedules").removeClass("active");
        $("#btn_dashboard").addClass("active");
        $("#btn_users").removeClass("active");
        $("#btn_blocks").removeClass("active");
        $("#btn_teachers").removeClass("active");
        $("#btn_rooms").removeClass("active");
      });
      $("#btn_schedules").click((e)=>{
        $("#content").load("./contents/schedule.php");
        $("#btn_schedules").addClass("active");
        $("#btn_dashboard").removeClass("active");
        $("#btn_users").removeClass("active");
        $("#btn_blocks").removeClass("active");
        $("#btn_teachers").removeClass("active");
        $("#btn_rooms").removeClass("active");
      });
      $("#btn_users").click((e)=>{
        $("#content").load("./contents/users.php");
        $("#btn_schedules").removeClass("active");
        $("#btn_dashboard").removeClass("active");
        $("#btn_users").addClass("active");
        $("#btn_blocks").removeClass("active");
        $("#btn_teachers").removeClass("active");
        $("#btn_rooms").removeClass("active");
      });
      $("#btn_blocks").click((e)=>{
        $("#content").load("./contents/blocks.php");
        $("#btn_schedules").removeClass("active");
        $("#btn_dashboard").removeClass("active");
        $("#btn_users").removeClass("active");
        $("#btn_blocks").addClass("active");
        $("#btn_rooms").removeClass("active");
        $("#btn_teachers").removeClass("active");
      });
      $("#btn_teachers").click((e)=>{
        $("#content").load("./contents/teachers.php");
        $("#btn_schedules").removeClass("active");
        $("#btn_dashboard").removeClass("active");
        $("#btn_users").removeClass("active");
        $("#btn_blocks").removeClass("active");
        $("#btn_rooms").removeClass("active");
        $("#btn_teachers").addClass("active");
      });   
      $("#btn_rooms").click((e)=>{
        $("#content").load("./contents/rooms.php");
        $("#btn_schedules").removeClass("active");
        $("#btn_dashboard").removeClass("active");
        $("#btn_users").removeClass("active");
        $("#btn_blocks").removeClass("active");
        $("#btn_teachers").removeClass("active");
        $("#btn_rooms").addClass("active");
      });
  });
</script>
</html>