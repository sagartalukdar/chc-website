<?php include("include/header.php"); ?>
<?php include("include/navigation-bar.php"); ?>

<!-- partial:partia/__subheader.html -->
<div class="sigma_subheader dark-overlay dark-overlay-2"
  style="background-image: url(assets/img/subheader.jpg);opacity:0.7;">

  <div class="container" style="opacity:1;">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Ushers</h1>
        <p class="blockquote light"> We are a church that belives in Jesus christ and the followers .</p>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Usher</li>
        </ol>
      </nav>
    </div>
  </div>

</div>
<!-- partial -->

<!-- Categories Start -->
<div class="section section-padding">
  <div class="container">
   <?php
     $backimg=$crud->Read("about","1 order by `about_id` desc");
     if($backimg){
      $backbanner=$backimg[0];
    }
   ?>
    <div class="section section-padding bg-cover secondary-overlay bg-center bg-norepeat"
  >
      <div class="container">

        <div class="section-title text-center">
          <p class="subtitle text-white">chc</p>
          <h4 class="title text-white">Our Ushers</h4>
        </div>

        <div class="row">

          <?php
       $Readusher=$crud->Read("usher_details","1 order by `usher_id` desc ");
       if($Readusher){
        foreach($Readusher as $usherkey){

    ?>

          <div class="col-lg-3 col-md-6">
            <div class="sigma_volunteers volunteers-4">
              <div class="sigma_volunteers-thumb">
                <img src="chc-admin/<?php echo $usherkey["usher_photo"] ; ?>" alt="volunteers" style="height:200px;
                width:200px;">


                <ul class="sigma_sm">
                  <li> <a href="#" class="trigger-volunteers-socials"> <i class="fal fa-plus"></i> </a> </li>
                  <li> <a href="tel:<?php echo $usherkey['usher_phone'] ;?>"> <i class="fa-solid fa-phone"></i> </a>
                  </li>
                  <li> <a href='mailto:<?php echo $usherkey["usher_email"] ; ?>'> <i class="fa-regular fa-envelope"></i>
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
    }else{ ?>

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

          


    <?php  
     
    }
    ?>



        </div>

      </div>
    </div>

  </div>
</div>
<!-- Categories End -->



<?php include("include/footer.php") ?>