<?php include("include/header.php"); ?>
<?php include("include/navigation-bar.php"); ?>


 <!-- partial:partia/__subheader.html -->
 <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(assets/img/subheader.jpg);opacity:0.7;">

<div class="container" style="opacity:1;">
  <div class="sigma_subheader-inner">
    <div class="sigma_subheader-text">
      <h1>Children Ministry</h1>
      <p class="blockquote light"> We are a church that belives in Jesus christ and the followers. </p>
    </div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="btn-link" href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Children Ministries</li>
      </ol>
    </nav>
  </div>
</div>

</div>
<!-- partial -->

  <!-- Categories Start -->
  <div class="section section-padding">
    <div class="container">

      <div class="text-center filter-items">
        <h5 class="active portfolio-trigger" data-filter="*">All</h5>
        <h5 class="portfolio-trigger" data-filter=".Bible">Bible</h5>
        <h5 class="portfolio-trigger" data-filter=".Church">Church</h5>
        <h5 class="portfolio-trigger" data-filter=".Religion">Religion</h5>
        <h5 class="portfolio-trigger" data-filter=".Relations">Relations</h5>
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

  <?php include("include/footer.php") ?>