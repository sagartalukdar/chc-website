<?php include("include/header.php"); ?>
<?php include("include/navigation-bar.php"); ?>

 <!-- partial:partia/__subheader.html -->

 <?php 
  $firstBroadCast=$crud->Read("broadcast","1 order by `broadcast_id` desc limit 1");
  if($firstBroadCast){
    $headBroadCast=$firstBroadCast[0];
  
 ?>

<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(assets/img/subheader.jpg);opacity:0.7;">

<div class="container" style="opacity:1;">
  <div class="sigma_subheader-inner">
    <div class="sigma_subheader-text">
      <h1>Broadcast</h1>
      <p class="blockquote light"> <?php echo $headBroadCast["broadcast_title"] ; ?></p>
    </div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="btn-link" href="index.php">Home</a></li>
        <li class="breadcrumb-item" aria-current="page" >
        <a href="<?php echo $headBroadCast["broadcast_link"] ; ?>" class="popup-youtube breadcrumb-item active">
              Broadcast Link
        </a>
        </li>
      </ol>
    </nav>
  </div>
</div>

</div>


<?php }else{ ?>

  <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(assets/img/subheader.jpg);opacity:0.7;">

<div class="container" style="opacity:1;">
  <div class="sigma_subheader-inner">
    <div class="sigma_subheader-text">
      <h1>Broadcast</h1>
      <p class="blockquote light">Broadcast title</p>
    </div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="btn-link" href="index.php">Home</a></li>
        <li class="breadcrumb-item" aria-current="page" ><a class="breadcrumb-item active" aria-current="page">Broadcast Link</a></li>
      </ol>
    </nav>
  </div>
</div>

</div>

<?php } ?>
 
<?php 
  $firstBroadCast=$crud->Read("broadcast","1 order by `broadcast_id` desc limit 1");
  if($firstBroadCast){
    $headBroadCast=$firstBroadCast[0];
?>

<!-- partial -->

<!-- Broadcast Start -->
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
                <img src="chc-admin/<?php echo $headBroadCast["broadcast_banner"] ; ?>" alt="video">
                <a href="<?php echo $headBroadCast["broadcast_link"] ; ?>" target="_blank" class="sigma_video-popup " >
                  <i class="fas fa-play"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="sigma_box m-0 h-100 d-flex align-items-center">
                <div>
                <p class="custom-primary mb-0 fw-600 fs-16"><?php echo $headBroadCast["broadcast_date"] ; ?></p>
                <h4 class="title"><?php echo $headBroadCast["broadcast_title"] ; ?></h4>
                <p class="m-0"><?php echo $headBroadCast["broadcast_description"] ; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php 
            $curr_b_id = $headBroadCast['broadcast_id'];
            $readBroadCast=$crud->Read("broadcast","`broadcast_id`!='$curr_b_id' order by `broadcast_id` desc");
            if($readBroadCast){
              foreach($readBroadCast as $readkey){
           
        ?>

        <div class="col-lg-3 col-sm-6 mb-30">
          <div class="sigma_video-popup-wrap">
            <img src="chc-admin/<?php echo $readkey["broadcast_banner"] ; ?>" alt="video" style="height:250px;width:350px;" >
            <a href="<?php echo $readkey["broadcast_link"] ; ?>" class="sigma_video-popup popup-youtube">
                  <i class="fas fa-play"></i>
            </a>
          </div>
          <h6 class="mb-0 mt-3"><?php echo $readkey["broadcast_title"] ; ?></h6>
          <p class="m-0"><?php echo $readkey["broadcast_date"] ; ?></p>
         
        </div>

        <?php    
            }
          }
        ?>

      </div>
    </div>
  </div>
  <!-- Broadcast End -->

<?php }else { ?>

  <!-- partial -->

<!-- Broadcast Start -->
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
                <img src="" alt="video">
                <a href="" target="_blank" class="sigma_video-popup " >
                  <i class="fas fa-play"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="sigma_box m-0 h-100 d-flex align-items-center">
                <div>
                <p class="custom-primary mb-0 fw-600 fs-16">Broadcast Date </p>
                <h4 class="title">Broadcast Title</h4>
                <p class="m-0">Broadcast Description </p>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
  <!-- Broadcast End -->

<?php } ?>  
 

  <?php include("include/footer.php") ?>
