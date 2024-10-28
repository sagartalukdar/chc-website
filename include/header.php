<?php 
 include 'classes/Crud.php';
 $crud = new Crud();
 date_default_timezone_set("Asia/Kolkata");
 $today = date("Y-m-d");
 $time = date("H:i:s");
 
 $filename = basename($_SERVER['PHP_SELF']);
 $pathinfo = pathinfo($filename);
 $pageName = basename($filename, '.' . $pathinfo['extension']);
 $pageName = ucwords(str_replace("-"," ",$pageName));
 $pageName = ucwords(str_replace("_"," ",$pageName));
 $pageName = ucfirst($pageName);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageName; ?> | City Harvest Church - Guwahati</title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">

  <!-- partial:partial/__stylesheets.html -->
  <link rel="stylesheet" href="assets/css/plugins/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
  <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">
  <link rel="stylesheet" href="assets/css/plugins/slick.css">
  <link rel="stylesheet" href="assets/css/plugins/slick-theme.css">
  <link rel="stylesheet" href="assets/css/plugins/ion.rangeSlider.min.css">

  <!-- Icon Fonts -->
  <link rel="stylesheet" href="assets/fonts/flaticon/flaticon.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="assets/css/plugins/font-awesome.min.css">
  <!-- Template Style sheet -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
  <!-- partial -->

  <!-- <link rel="stylesheet" href="assets/css/harvest-worship.css"> -->

            <!-- Pagination Style -->
  <link rel="stylesheet" href="assets/css/paginationStyle.css">

  <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>

<!-- lightbox -->
<link rel="stylesheet" href="assets/css/lightbox.css">
</head>

<body>