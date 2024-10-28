<?php include("include/header.php"); ?>
<?php include("include/navigation-bar.php"); ?>

<!-- Banner Start -->



<div class="sigma_banner banner-1">

  <div class="sigma_banner-slider">


    <?php
       $banner=$crud->Read("banner","1 order by `banner_id` desc");
       if($banner){
        foreach($banner as $bannerkey){
      
    ?>

    <!-- Banner Item Start -->

    <div class="sigma_banner-slider-inner bg-cover  bg-center bg-norepeat"
      style="background-image: url(chc-admin/<?php echo $bannerkey["banner_img"]; ?>); height:700px;">
      <div class="sigma_banner-text">
        <div class="container position-relative ">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <div class="sigma_box primary-bg banner-cta">

                <div class="banner-title">
                <h1 class="text-white title" style="font-size:1.3rem;">
                  <?php echo $bannerkey["banner_title"]; ?>
                </h1>
                </div>
               
                <p class="blockquote light light-border mb-0">
                  <?php 
                    if(strlen($bannerkey["banner_desc"])>=250){
                      echo substr($bannerkey["banner_desc"],0,250)." ...";
                    }else{
                      echo $bannerkey["banner_desc"];
                    }
                  ?>
                  
                </p>
                <div class="section-button d-flex align-items-center justify-content-center">
                  <a href="contact-us.php" class="sigma_btn-custom secondary">Join Us <i class="far fa-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- <img class="d-none d-lg-block" src="" alt="png"> commented  =====   -->
        </div>
      </div>
    </div>

    <!-- Banner Item End -->

    <?php 
    }}else{

    ?>

    <!-- Banner Item Start -->
    <div class="sigma_banner-slider-inner bg-cover  bg-center bg-norepeat"
      style="background-image: url();">
      <div class="sigma_banner-text">
        <div class="container position-relative ">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <div class="sigma_box primary-bg banner-cta">
                <h1 class="text-white title">
                  Banner Title Here
                </h1>
                <p class="blockquote light light-border mb-0">
                  Banner Description Here
                </p>
                <div class="section-button d-flex align-items-center justify-content-center">
                  <a href="contact-us.php" class="sigma_btn-custom secondary">Join Us <i class="far fa-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- <img class="d-none d-lg-block" src="" alt="png"> commented  =====   -->
        </div>
      </div>
    </div>
    <!-- Banner Item End -->

    <!-- Banner Item Start -->
    <div class="sigma_banner-slider-inner bg-cover  bg-center bg-norepeat"
      style="background-image: url();">
      <div class="sigma_banner-text">
        <div class="container position-relative">
          <div class="row align-items-center">
            <div class="offset-lg-6 col-lg-6">
              <div class="sigma_box primary-bg banner-cta">
                <h1 class="text-white title">
                  Banner Title Here
                </h1>
                <p class="blockquote light light-border mb-0">
                  Banner Description Here
                </p>
                <div class="section-button d-flex align-items-center justify-content-center">
                  <a href="contact-us.php" class="sigma_btn-custom secondary">Join Us <i class="far fa-arrow-right"></i>
                  </a>

                </div>
              </div>
            </div>
          </div>
          <!-- <img class="left d-none d-lg-block" src="" alt="png">   commented  =====  -->
        </div>
      </div>
    </div>
    <!-- Banner Item End -->

    <?php } ?>


  </div>

</div>





<!-- Banner End -->
<!-- Broadcast Start -->

<?php 
  $firstBroadCast=$crud->Read("broadcast","1 order by `broadcast_id` desc limit 1");
  if($firstBroadCast){
    $headBroadCast=$firstBroadCast[0];
  
 ?>

<div class="section section-padding">
  <div class="container">
    <div class="section-title text-center">
      <p class="subtitle">Watch Video</p>
      <h4 class="title">Our Live Broadcast</h4>
    </div>
    <div class="row sigma_broadcast-video">
      <div class="col-12 mb-5">
        <div class="row g-0">
        <div class="col-lg-6">
            <div class="sigma_video-popup-wrap">
              <img src="chc-admin/<?php echo $headBroadCast["broadcast_banner"] ; ?>" alt="video"
              style="height:500px;width:650px;">
              <a href="<?php echo $headBroadCast["broadcast_link"] ; ?>" class="sigma_video-popup popup-youtube">
                <i class="fas fa-play"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="sigma_box m-0 h-100 d-flex align-items-center">
              <div>
                <p class="custom-primary mb-0 fw-600 fs-16">
                  <?php echo $headBroadCast["broadcast_date"] ; ?>
                </p>
                <h4 class="title">
                  <?php echo $headBroadCast["broadcast_title"] ; ?>
                </h4>
                <p class="m-0">
                  <?php echo $headBroadCast["broadcast_description"] ; ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php 
          $curr_b_id = $headBroadCast['broadcast_id'];
          $readBroadCast=$crud->Read("broadcast","`broadcast_id`!='$curr_b_id' order by `broadcast_id` desc limit 4");
          if($readBroadCast){
            foreach($readBroadCast as $readkey){
           
        ?>

      <div class="col-lg-3 col-sm-6 mb-30">
        <div class="sigma_video-popup-wrap">
          <img src="chc-admin/<?php echo $readkey["broadcast_banner"] ; ?>" alt="video"
          style="height:250px;width:350px;" > 
          <a href="<?php echo $readkey["broadcast_link"] ; ?>" class="sigma_video-popup popup-sm popup-youtube">
            <i class="fas fa-play"></i>
          </a>
        </div>
        <h6 class="mb-0 mt-3">
          <?php echo $readkey["broadcast_title"] ; ?>
        </h6>
        <p class="m-0">
          <?php echo $readkey["broadcast_date"] ; ?>
        </p>

      </div>

      <?php    
            }
          }
        ?>

    </div>
  </div>
</div>
<?php 
    } else {
      
    ?>
<div class="section section-padding">
  <div class="container">
    <div class="section-title text-center">
      <p class="subtitle">Watch Video</p>
      <h4 class="title">Our Live Broadcast</h4>
    </div>
    <div class="row sigma_broadcast-video">
      <div class="col-12 mb-5">
        <div class="row g-0">
          <div class="col-lg-6">
            <div class="sigma_video-popup-wrap">
              <img src="path_to_dummy_thumbnail>" alt="live broadcast video">
              <a href="javascript:void()" class="sigma_video-popup ">
                <i class="fas fa-play"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="sigma_box m-0 h-100 d-flex align-items-center">
              <div>
                <p class="custom-primary mb-0 fw-600 fs-16">Broadcast Date Here</p>
                <h4 class="title">Nothing Found in the databse(Broadcast Title)</h4>
                <p class="m-0">No description(add broadcasts here)</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php } ?>
<!-- Broadcast End -->



<!-- About Start -->

<?php
    $readabout=$crud->Read("about","1 order by `about_id` desc");
    if($readabout){
      $about_intro=$readabout[0]["about_intro"];
      $about_title=$readabout[0]["about_title"];
      $about_desc=$readabout[0]['about_desc'];
      $about_img=$readabout[0]["about_img"];
      $about_link=$readabout[0]["about_link"];
  
?>

<section class="section pt-0">
  <div class="container">
    <h1 class="text-center">About US</h1>
    <div class="row" style="display: flex; justify-content: space-evenly;padding: 0px 60px;">
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="sigma_counter bg-cover bg-norepeat bg-center"
          style="background-image: url(chc-admin/<?php echo $about_img ; ?>)">

        </div>
      </div>
      <div class="col-lg-8 col-md-6 col-sm-12">
        <div class="me-lg-30">
          <div class="section-title mb-0 text-start">
            <p class="subtitle">
              <a href="service-details.php"><?php echo $about_intro; ?></a>
            </p>
            <h4>
              <?php echo $about_title; ?>
            </h4>
          </div>
          <p class="blockquote bg-transparent">
            <?php
              if(strlen($about_desc)>=150){
                echo substr($about_desc,0,150) . " ... "; 
              }else echo $about_desc; 
            ?>
          </p>
          <div class="row">
            <div class="col-lg-6">
              <div class="sigma_icon-block icon-block-3">
                <div class="icon-wrapper">
                  <i class="flaticon-church-2"></i>
                </div>
                <div class="sigma_icon-block-content">
                  <h5>Vision</h5>
                  <p>
                  "City Harvest Church envisions a community where love, compassion, and faith converge to uplift and empower individuals. Our vision is to cultivate a vibrant spiritual family that fosters personal growth, inspires service to others, and spreads hope throughout our city.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="sigma_icon-block icon-block-3">
                <div class="icon-wrapper">
                  <i class="flaticon-charity"></i>
                </div>
                <div class="sigma_icon-block-content">
                  <h5>Mission </h5>
                  <p>
                  "City Harvest Church is dedicated to spreading the message of God's love and grace, reaching out to every corner of our city with compassion and understanding. Our mission is to empower individuals to discover their purpose, grow in their faith, and make a positive impact in the world."
                  </p>
                </div>
              </div>
            </div>
          </div>

          <?php

          if( !isset($readkey["broadcast_link"])) { ?>

          <a href="#" class="sigma_video-popup popup-sm popup-youtube">
            <i class="fas fa-play"></i>
          </a>

         <?php } else { ?>

            <a href="<?php echo $readkey["broadcast_link"] ; ?>" class="sigma_video-popup popup-sm popup-youtube">
            <i class="fas fa-play"></i>
          </a>
        
        <?php }

          ?>

          
          <span class="mx-3">
            Play Link
          </span>
        </div>
      </div>
    </div>

  </div>
</section>

<?php 
    }else{
?>

<section class="section pt-0">
  <div class="container">
    <h1 class="text-center">About US</h1>
    <div class="row" style="display: flex; justify-content: space-evenly;padding: 0px 60px;">
      <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="sigma_counter bg-cover bg-norepeat bg-center"
          style="background-image: url(chc-admin/images/about-img/empty image.png)">


        </div>
      </div>
      <div class="col-lg-8 col-md-6 col-sm-12">
        <div class="me-lg-30">
          <div class="section-title mb-0 text-start">
            <p class="subtitle">
              <a href="service-details.php">About Intro Here</a>
            </p>
            <h4>
             About Title Here
            </h4>
          </div>
          <p class="blockquote bg-transparent">
            About Description Here
          </p>
          <div class="row">
            <div class="col-lg-6">
              <div class="sigma_icon-block icon-block-3">
                <div class="icon-wrapper">
                  <i class="flaticon-church-2"></i>
                </div>
                <div class="sigma_icon-block-content">
                  <h5>Vision</h5>
                  <p>
                  "City Harvest Church envisions a community where love, compassion, and faith converge to uplift and empower individuals. Our vision is to cultivate a vibrant spiritual family that fosters personal growth, inspires service to others, and spreads hope throughout our city.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="sigma_icon-block icon-block-3">
                <div class="icon-wrapper">
                  <i class="flaticon-charity"></i>
                </div>
                <div class="sigma_icon-block-content">
                  <h5>Mission </h5>
                  <p>
                  "City Harvest Church is dedicated to spreading the message of God's love and grace, reaching out to every corner of our city with compassion and understanding. Our mission is to empower individuals to discover their purpose, grow in their faith, and make a positive impact in the world."
                  </p>
                </div>
              </div>
            </div>
          </div>
          <a href="javascript:void()" class="sigma_video-popup popup-sm popup-youtube">
            <i class="fas fa-play"></i>
          </a>
          <span class="mx-3">
           Live Broadcast Play Link
          </span>
        </div>
      </div>
    </div>

  </div>
</section>

<?php } ?>




<!-- About End -->

<!-- CTA Start -->
<div class="section pt-0">
  <div class="container">

    <div class="row position-relative">
      <div class="col-lg-5 col-md-5">
        <div class="sigma_cta lg secondary-bg">
          <!-- <img class="d-none d-lg-block" src="assets/img/cta/3.png" alt="cta"> -->
          <div class="sigma_cta-content">
            <span class="fw-600 custom-primary">WhatsApp:  </span>
            <a href="https://wa.me/+917086159073" target="_blank"><h4 class="text-white">+91 7086159073</h4></a>
          </div>
        </div>
      </div>
      <div class="col-lg-7 col-md-7 position-relative">
        <div class="sigma_cta sm primary-bg">
          <span class="sigma_cta-sperator d-none d-lg-flex">or</span>
          <div class="sigma_cta-content">
            <form method="post" action="newsletter.php" >
              <label class="mb-0 text-white">Our Church Newsletter</label>
               
              <div style="display: flex; ; gap: 12px; align-items: center;">

                <div class="sigma_search-adv-input" style="width: 70%;">
                  <input type="text" class="form-control" placeholder="Enter email address" name="email" value="" required id="subscribe_email">
  
                  <button  name="submit">
                     <span id="validIcon" style="color: rgb(53, 185, 53);"></span> 
  
                    </button>
                </div>
  
                <button id="submit" style="background: linear-gradient(to right, blue, rgb(236, 85, 224) 92%); border-radius: 22px; "  class="sigma_btn-custom mt-3"
                onmouseover="this.style.background = 'blue';"
                onmouseout="this.style.background = 'linear-gradient(to right, blue, rgb(236, 85, 224) 92%)';">
                Subscribe
                </button>

              </div>
              
             
            </form>


            <div style="color: rgb(130, 182, 52); display: none;" class="fw-bold" id="subscribed">
                <span><i class="fa-solid fa-circle-check"></i></span> Thanks for subscribing us.
              </div>

              <div style="color: rgb(130, 182, 52); display: none;" class="fw-bold" id="allreadySubscribed">
                <span><i class="fa-solid fa-circle-check"></i></span> You are already subscribed us.
              </div>

              <div style="color: rgb(231, 90, 25); display: none;" class="fw-bold" id="subscribederror">
                <span><i class="fa-solid fa-circle-xmark"></i></span> Error occurred while subscribing.
              </div>

          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- CTA End -->



<!-- Mass timing Start -->
<div class="section section-padding pt-0">
  <div class="container">
    <div class="section-title text-center">
      <p class="subtitle">Time Table</p>
      <h4 class="title">Our Service Timing</h4>
    </div>
    <!-- Timing Table Start -->
    <div class="table-responsive-lg">
      <table class="sigma_mass-timing">
        <thead>
          <tr>
            <th>Sunday</th>
            <th>Wednesdays</th>
            <th>Saturday</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="sigma-time-table">
                <p><span>10:30 AM</span> Worship & the Word , Harvest Kids</p>
              </div>
            </td>
            <td>
              <div class="sigma-time-table">
                <p><span>7:00 PM</span>Wednesday Bible Study</p>
              </div>
            </td>
            <td>
              <div class="sigma-time-table">
                <p><span> 5:00 PM to 6:00 PM</span>Prayer Meeting</p>
              </div>
            </td>
          </tr>
                   
        </tbody>
      </table>

      <div class="mt-5">
        <img src="service-timings.PNG" alt="">
      </div>

    </div>
    <!-- Timing Table End -->
  </div>
</div>
<!-- Mass timing End -->

<!-- Ministries Start -->
   <!-- Categories Start -->
   <div class="section section-padding light-bg">
    <div class="container">

      <div class="section-title text-start flex-title">
        <div>
          <p class="subtitle">Ministries</p>
          <h4 class="title mb-lg-0">Our Ministries</h4>
        </div>
        <div class="text-center filter-items me-0 mb-0">
          <h5 class="active portfolio-trigger" data-filter="*">All</h5>
          <h5 class="portfolio-trigger" data-filter=".Bible">Bible</h5>
          <h5 class="portfolio-trigger" data-filter=".Church">Church</h5>
          <h5 class="portfolio-trigger" data-filter=".Religion">Religion</h5>
          <h5 class="portfolio-trigger" data-filter=".Relations">Relations</h5>
        </div>
      </div>

     <div class="portfolio-filter row">

     <?php

      $readsermon=$crud->Read("children_gallery","1 order by ch_g_id desc");
      if($readsermon){
        foreach($readsermon as $sermonkey){
        
      ?>

     <div class="col-lg-4 <?php echo $sermonkey["ch_g_keyword"] ; ?>">
          <div class="sigma_portfolio-item">
            <img src="chc-admin/<?php echo $sermonkey["ch_g_img"] ; ?>"  alt="portfolio"  style="height:400px;width:100%" >
            <div class="sigma_portfolio-item-content">
              <div class="sigma_portfolio-item-content-inner">
                <h5> <a href="children-ministry-details.php?ministryId=<?php echo $sermonkey["ch_g_id"] ; ?>">
                <?php echo $sermonkey["ch_g_title"] ; ?></a> </h5>
                <p>
                  <?php
                if(strlen($sermonkey["ch_g_desc"])>=100){
                echo substr($sermonkey["ch_g_desc"],0,100)."   . . . . . . . . " ; ?>
             <a href="children-ministry-details.php?ministryId=<?php echo $sermonkey["ch_g_id"] ; ?>" style="color:white;">   See More </a>
             
             <?php } 
                else {
                 echo $sermonkey["ch_g_title"] ;
                  }?>
              
              </p>
                
              </div>
              <a href="children-ministry-details.php?ministryId=<?php echo $sermonkey["ch_g_id"] ; ?>"><i class="fal fa-plus"></i></a>
            </div>
          </div>
        </div>

        <?php }
      } else{ ?>
       <div class="container">
          <div class="text-center filter-items">
          <h3>No Content Found !!!</h3>
          </div>
      </div>
       <?php }
        ?>


        </div> 
      </div>

    </div>
  </div>
 <!-- Categories end -->
<!-- Ministries End -->



<!-- volunteers Start -->

<div class="section section-padding bg-cover secondary-overlay bg-center bg-norepeat">
  <div class="container">

    <div class="section-title text-center">
      <p class="subtitle text-white">chc</p>
      <h4 class="title text-white">Our Ushers</h4>
    </div>

    <div class="row">

      <?php
       $Readusher=$crud->Read("usher_details","1 ");
       if($Readusher){
        foreach($Readusher as $usherkey){     ?>

      <div class="col-lg-3 col-md-6">
        <div class="sigma_volunteers volunteers-4">
          <div class="sigma_volunteers-thumb">
            <img src="chc-admin/<?php echo $usherkey["usher_photo"] ; ?>" alt="volunteers" style="height:200px;
            width:200px;">
            <ul class="sigma_sm">
              <li> <a href="#" class="trigger-volunteers-socials"> <i class="fal fa-plus"></i> </a> </li>
              <li> <a href="tel:<?php echo $usherkey["usher_phone"] ; ?>"> <i class="fa-solid fa-phone"></i> </a> </li>
              <li> <a href="mailto:<?php echo $usherkey["usher_email"] ; ?>"> <i class="fa-regular fa-envelope"></i>
                </a> </li>
              <!-- <li> <a href="#"> <i class="fab fa-facebook-f"></i> </a> </li> -->
            </ul>
          </div>
          <div class="sigma_volunteers-body">
            <div class="sigma_volunteers-info">
              <p class="text-white">
                <?php echo $usherkey["usher_name"] ; ?>
              </p>

            </div>
          </div>
        </div>
      </div>

      <?php 
      }
    }else{
      echo '<h3 class="text-center text-warning">Ushers Details Section</h3>';
      echo '<h3 class="text-center text-warning">No Ushers Data Present In Database.</h3>'; ?>
      
      <div class="col-lg-3 col-md-6">
            <div class="sigma_volunteers volunteers-4">
              <div class="sigma_volunteers-thumb">
                <img src="chc-admin\images\ushers\empty user.jpg" alt="volunteers" style="height:200px;
                width:200px;">


                <ul class="sigma_sm">
                  <li> <a href="#" class="trigger-volunteers-socials"> <i class="fal fa-plus"></i> </a> </li>
                  <li> <a href=""> <i class="fa-solid fa-phone"></i> </a>
                  </li>
                  <li> <a href=> <i class="fa-regular fa-envelope"></i>
                    </a> </li>
                  <!-- <li> <a href="#"> <i class="fab fa-facebook-f"></i> </a> </li> -->
                </ul>
              </div>
              <div class="sigma_volunteers-body">
                <div class="sigma_volunteers-info">
                  <p class="text-white">
                
                  </p>

                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="sigma_volunteers volunteers-4">
              <div class="sigma_volunteers-thumb">
                <img src="chc-admin\images\ushers\empty user.jpg" alt="volunteers" style="height:200px;
                width:200px;">


                <ul class="sigma_sm">
                  <li> <a href="#" class="trigger-volunteers-socials"> <i class="fal fa-plus"></i> </a> </li>
                  <li> <a href=""> <i class="fa-solid fa-phone"></i> </a>
                  </li>
                  <li> <a href=> <i class="fa-regular fa-envelope"></i>
                    </a> </li>
                  <!-- <li> <a href="#"> <i class="fab fa-facebook-f"></i> </a> </li> -->
                </ul>
              </div>
              <div class="sigma_volunteers-body">
                <div class="sigma_volunteers-info">
                  <p class="text-white">
                
                  </p>

                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="sigma_volunteers volunteers-4">
              <div class="sigma_volunteers-thumb">
                <img src="chc-admin\images\ushers\empty user.jpg" alt="volunteers" style="height:200px;
                width:200px;">


                <ul class="sigma_sm">
                  <li> <a href="#" class="trigger-volunteers-socials"> <i class="fal fa-plus"></i> </a> </li>
                  <li> <a href=""> <i class="fa-solid fa-phone"></i> </a>
                  </li>
                  <li> <a href=> <i class="fa-regular fa-envelope"></i>
                    </a> </li>
                  <!-- <li> <a href="#"> <i class="fab fa-facebook-f"></i> </a> </li> -->
                </ul>
              </div>
              <div class="sigma_volunteers-body">
                <div class="sigma_volunteers-info">
                  <p class="text-white">
                
                  </p>

                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="sigma_volunteers volunteers-4">
              <div class="sigma_volunteers-thumb">
                <img src="chc-admin\images\ushers\empty user.jpg" alt="volunteers" style="height:200px;
                width:200px;">


                <ul class="sigma_sm">
                  <li> <a href="#" class="trigger-volunteers-socials"> <i class="fal fa-plus"></i> </a> </li>
                  <li> <a href=""> <i class="fa-solid fa-phone"></i> </a>
                  </li>
                  <li> <a href=> <i class="fa-regular fa-envelope"></i>
                    </a> </li>
                  <!-- <li> <a href="#"> <i class="fab fa-facebook-f"></i> </a> </li> -->
                </ul>
              </div>
              <div class="sigma_volunteers-body">
                <div class="sigma_volunteers-info">
                  <p class="text-white">
                
                  </p>

                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="sigma_volunteers volunteers-4">
              <div class="sigma_volunteers-thumb">
                <img src="chc-admin\images\ushers\empty user.jpg" alt="volunteers" style="height:200px;
                width:200px;">


                <ul class="sigma_sm">
                  <li> <a href="#" class="trigger-volunteers-socials"> <i class="fal fa-plus"></i> </a> </li>
                  <li> <a href=""> <i class="fa-solid fa-phone"></i> </a>
                  </li>
                  <li> <a href=> <i class="fa-regular fa-envelope"></i>
                    </a> </li>
                  <!-- <li> <a href="#"> <i class="fab fa-facebook-f"></i> </a> </li> -->
                </ul>
              </div>
              <div class="sigma_volunteers-body">
                <div class="sigma_volunteers-info">
                  <p class="text-white">
                
                  </p>

                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="sigma_volunteers volunteers-4">
              <div class="sigma_volunteers-thumb">
                <img src="chc-admin\images\ushers\empty user.jpg" alt="volunteers" style="height:200px;
                width:200px;">


                <ul class="sigma_sm">
                  <li> <a href="#" class="trigger-volunteers-socials"> <i class="fal fa-plus"></i> </a> </li>
                  <li> <a href=""> <i class="fa-solid fa-phone"></i> </a>
                  </li>
                  <li> <a href=> <i class="fa-regular fa-envelope"></i>
                    </a> </li>
                  <!-- <li> <a href="#"> <i class="fab fa-facebook-f"></i> </a> </li> -->
                </ul>
              </div>
              <div class="sigma_volunteers-body">
                <div class="sigma_volunteers-info">
                  <p class="text-white">
                
                  </p>

                </div>
              </div>
            </div>
          </div>

          
 <?php   }
    ?>



    </div>

  </div>
</div>

<!-- volunteers End -->


<!-- Testimonials Start -->
<section class="section sigma_testimonial-sec style-4">

  <div class="container testimonial-section style-4">
    <div class="row">
      <div class="col-lg-5">
        <div class="section-title text-start">
          <a href="bible-archive.php"><p class="subtitle">Testimonial</p></a>
          <h4 class="title"> Reviews</h4>
          <p>We are a church that belives in Jesus christ and the followers. </p>
          <p> In the bustling streets, City Harvest Church shines bright,
            Where voices raise in praise to Jesus, guiding light,
            Gathering souls, His love ignites, in His presence, hearts unite.</p>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="sigma_testimonial style-4" style="height:400px">
          <div class="sigma_testimonial-body">
            <div class="sigma_testimonial-image d-none d-lg-block" style="height:150px">
              <div class="row justify-content-center align-items-center g-0" style="position:relative; bottom:150px; ">
                <div class="col-md-3">
                  <img src="j1.png" alt="img">
                </div>
                <div class="col-md-5 ms-3">
                  <img src="j2.png" alt="img">
                </div>
                <div class="col-md-3 ms-3">
                  <img src="j3.png" alt="img">
                </div>
              </div>
            </div>
            <i class="flaticon-right-quote icon"></i>
            <div class="sigma_testimonial-slider-1">
              <div class="sigma_testimonial-slider-item">
                <p>I really got encouragement after i went to this Church, I got to know more about the need to be close
                  to God in our life.</p>
                <div class="sigma_testimonial-author">
                  <cite>Jony Darlong</cite>
                </div>
              </div>
              <div class="sigma_testimonial-slider-item">
                <p>I've been to this church when it was inside a hall in a hotel. As a non Christian I don't visit
                  churches often. But this one was unique, I felt welcomed here. The people of the church are humble and
                  they love everyone.
                  My recommendation for anyone who is seeking for a church must try going to this church.
                  I would love to visit this church again.</p>
                <div class="sigma_testimonial-author">
                  <cite>Norjit Brahma</cite>
                </div>
              </div>
              <div class="sigma_testimonial-slider-item">
                <p>"No perfect people is allowed"
                  Felt so blessed by getting to know this 💐. Now CITY HARVEST CHURCH is more than a family and I would
                  like to Thank Lord for accepting me for what I am.
                </p>
                <div class="sigma_testimonial-author">
                  <cite>Dhruvajyoti Borsaikia Official (Xuvi)</cite>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
<!-- Testimonials End -->



<!-- sermon Start -->
<div class="section section-padding">
  <div class="container">

    <div class="row">

      <div class="col-lg-4 col-md-6">
        <a href="javascript:void()" class="sigma_service border style-1 bg-white">
          <div class="sigma_service-thumb">
            <i class="flaticon-church"></i>
            <span></span>
            <span></span>
          </div>
          <div class="sigma_service-body">
            <h5>Our Church</h5>
            <p>"Embracing diversity, spreading kindness, and uniting in worship - that's the heartbeat of our church."
            </p>
          </div>
        </a>
      </div>

      <div class="col-lg-4 col-md-6">
        <a href="javascript:void()" class="sigma_service border style-1 primary-bg">
          <div class="sigma_service-thumb">
            <i class="text-white flaticon-speech"></i>
            <span></span>
            <span></span>
          </div>
          <div class="sigma_service-body">
            <h5 class="text-white">Ministries</h5>
            <p class="text-white">"Ministry: where passion meets purpose, and every act becomes a testament to the power
              of faith."</p>
          </div>
        </a>
      </div>

      <div class="col-lg-4 col-md-6">
        <a href="javascript:void()" class="sigma_service border style-1 secondary-bg">
          <div class="sigma_service-thumb">
            <i class="custom-primary flaticon-praying"></i>
            <span></span>
            <span></span>
          </div>
          <div class="sigma_service-body">
            <h5 class="text-white">Events</h5>
            <p class="text-white">"With Jesus at the center, our events radiate with divine presence, connection, and
              boundless grace." </p>
          </div>
        </a>
      </div>

    </div>

  </div>
</div>
<!-- sermon End -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 


<script>


      $("#subscribe_email").on("change", function(){
     
     var email = $("#subscribe_email").val();
     var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Regular expression for email validation
    if (emailRegex.test(email)) {
      $("#validIcon").html(`<i class="fa-regular fa-circle-check fa-xl"></i>`);
  } else {
      $("#validIcon").html(`<i class="fa-solid fa-triangle-exclamation fa-xl" style="color: #722a0a;"></i>`);
  }
  })





  $("#submit").on("click",function(e){
           e.preventDefault();

          

    var email = $("#subscribe_email").val();
    if(email==null || email==""){
      $("#subscribederror").css("display", "block");
                console.log("unsuccess");
                setTimeout(function() {
                    $("#subscribederror").css("display", "none");
                }, 5000); // 5000 milliseconds delay
                console.error("Error:", error);
    }
    

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Regular expression for email validation
    if (emailRegex.test(email)) {
        // Perform AJAX request if email is valid


           $.ajax({
            type: 'POST',
            url: 'newsletter.php',
            data: {
                email: email
            },
            success: function(response) {
                if (response.successMessage) {
                    $("#subscribed").css("display", "block");
                    console.log("success1");
                    console.log(response);
                    setTimeout(function() {
                        $("#subscribed").css("display", "none");
                    }, 5000); // 5000 milliseconds delay
                }else if(response.alreadySubscribed){

                  $("#allreadySubscribed").css("display", "block");
                    console.log("success2");
                    console.log(response);
                    setTimeout(function() {
                        $("#allreadySubscribed").css("display", "none");
                    }, 5000); // 5000 milliseconds delay

                } else {
                    $("#subscribederror").css("display", "block");
                    console.log("success3");
                    console.log(response);
                    setTimeout(function() {
                        $("#subscribederror").css("display", "none");
                    }, 5000); // 5000 milliseconds delay
                }
            },
            error: function(xhr, status, error) {
                $("#subscribederror").css("display", "block");
                console.log("unsuccess");
                console.log(response);
                setTimeout(function() {
                    $("#subscribederror").css("display", "none");
                }, 5000); // 5000 milliseconds delay
                console.error("Error:", error);
            }
        });




      


        
    } else {
        // Handle invalid email here if needed
        console.log("Invalid email");
     
    }
  })






  </script>



<?php include("include/footer.php") ?>