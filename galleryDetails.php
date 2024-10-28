<?php include("include/header.php"); ?>
<?php include("include/navigation-bar.php"); ?>

 <!-- partial:partia/__subheader.html -->
 <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(assets/img/subheader.jpg);opacity:0.7;">

<div class="container" style="opacity:1;">
  <div class="sigma_subheader-inner">
    <div class="sigma_subheader-text">
      <h1>Our Church Gallery</h1>
      <p class="blockquote light"> We are a church that belives in Jesus christ and the followers .</p>
    </div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="btn-link" href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Gallery</li>
      </ol>
    </nav>
  </div>
</div>

</div>
<!-- partial -->

  <!-- Post Content Start -->
  <div class="section sigma_post-single">
    <div class="container">

      <div class="row">
          <?php
            if(isset($_GET["gallery_id"])){
              $gid=$_GET["gallery_id"];    
              $current_img=$crud->Read("gallery","`gallery_id`=$gid");
              if($current_img){
                $this_img=$current_img[0];
              }
            }
          ?>
        <div class="col-lg-8">
          <div class="post-detail-wrapper">

            <div class="entry-content">
              <div class="sigma_post-meta">
                <div class="sigma_post-categories">
                  <a href="javascript:void()" class="sigma_post-category">About This Image</a>
                </div>
              </div>

              <a href="chc-admin/<?php echo $this_img["gallery_img"] ; ?>" class="gallery-thumb">
                <img src="chc-admin/<?php echo $this_img["gallery_img"] ; ?>" alt="post">
              </a>

              <h4 class="entry-title"><?php echo $this_img["img_title"] ; ?></h4>
              <a href="javascript:void()"> <i class="far fa-calendar"></i>
               <?php
                 $date=$this_img["added_date"];
                 $month=date("M",strtotime($date));
                 $year=date("Y",strtotime($date));
                 $day=date("d",strtotime($date));
                 echo $day. " /".$month." /".$year ;
               ?>
              </a>
              
              <p>
               <?php
                 echo $this_img["img_desc"];
               ?>
              </p>
              
             
              
              <!-- <div class="tagcloud">
               
                  <h3> <a href="javascript:void()"> <?php echo $this_img["blog_category"] ; ?> </a> </h3>

              </div> -->
              <!-- <p>
                you will found our every bolg posts here.There has lots of like this you can also get eye on those.
              </p> -->
              <hr>
           
            </div>

      
            <!-- Related Posts Start -->
            <div class="section">
              <h5>Related Image Gallery</h5>
              <div class="row">
                <?php
                 $related_post=$crud->Read("gallery","`gallery_id`!=$gid  limit 2");
                 if($related_post){
                    foreach($related_post as $rp){
                ?>
                 <!-- Article Start -->
                <div class="col-md-6">
                
                
                <article class="sigma_post">
                    <div class="sigma_post-thumb">
                    <a href="galleryDetails.php?gallery_id=<?php echo $rp["gallery_id"]; ?>">

                        <img src="chc-admin/<?php echo $rp["gallery_img"] ; ?>" alt="post" style="width:100%;height:250px;">
                      </a>
                    </div>
                    <div class="sigma_post-body">
                      <div class="sigma_post-meta" style="min-height: 60px;">
                        <div class="me-3">
                          <i class="far fa-cross"></i>
                          <a href="galleryDetails.php?gallery_id=<?php echo $rp["gallery_id"]; ?>" 
                           class="sigma_post-category"><?php echo $rp["img_title"] ; ?></a>
                        </div>
                        <a href="galleryDetails.php?gallery_id=<?php echo $rp["gallery_id"]; ?>" class="sigma_post-date"> <i class="far fa-calendar"></i>
                          <?php 
                            $strdate =$rp["added_date"];
                            $year= date('Y',strtotime($strdate));
                            $month=date('M',strtotime($strdate));
                            $day= date('d',strtotime($strdate));
                            echo $day." ".$month." ".$year ; 
                          ?>
                        </a>
                      </div>
                      <h5>
                        <p style="height:100px;">
                        <a href="galleryDetails.php?gallery_id=<?php echo $rp["gallery_id"]; ?>" >
                              <?php
                                $img_desc=$rp["img_desc"];
                                if(strlen($img_desc)>=100){
                                  echo substr($img_desc,0,100)." .." ;
                                }else{
                                  echo $img_desc;
                                }
                              ?>
                          </a>                     
                        </p>
                      </h5>
                      <div class="sigma_post-single-author">
                            <?php
                              $poster_id=$rp["img_posted_user_id"];
                              $readposter=$crud->Read("users","`id`=$poster_id");
                              if($readposter){
                                $poster=$readposter[0];
                            ?>
                           <a href="galleryDetails.php?gallery_id=<?php echo $rp["gallery_id"]; ?>" >
                            <img src="chc-admin/<?php echo $poster["user_image"] ; ?>" alt="author" style="width:30px;height:30px;">
                            <div class="sigma_post-single-author-content">
                              By 
                              <p>
                                <?php echo $poster["name"] ; ?>
                              </p>
                            </div>
                          </a>   
                        <?php
                          }                        
                        ?>
                      </div>
                    </div>
                  </article>


                
                </div>
                <!-- Article End -->
                <?php     
                    }
                 }
                ?>
              
              </div>
            </div>
            <!-- Related Posts End -->

          </div>
        </div>

        <!-- Sidebar Start -->
        <div class="col-lg-4">
          <div class="sidebar">
             <?php
                $readpost=$crud->Read("gallery","`gallery_id`=$gid");
               if($readpost){
                $uid=$readpost[0]["img_posted_user_id"];
                $readuser=$crud->Read("users","`id`=$uid");
                 $poster=$readuser[0];
               }
             ?>
            <!-- About Author Start -->
            <div class="sidebar-widget widget-about-author">
              <h5 class="widget-title">Blog Poster</h5>
              <div class="widget-about-author-inner">
                
                <img src="chc-admin/<?php echo $poster["user_image"]; ?>" alt="author" style="width:250px;height:250px;">
                <h5><?php echo $poster["name"]." ".$poster["surname"]; ?></h5>
                <p><?php echo $poster["email"] ; ?></p>
               
              </div>
            </div>
            <!-- About Author End -->

          
            <!-- Popular Feed Start -->
            <div class="sidebar-widget widget-recent-posts">
              <h5 class="widget-title">Recent Posts</h5>
              <?php
                 $readgallery=$crud->Read("gallery" , "1 order by `gallery_id` desc limit 3");
                 if($readgallery){
                  foreach($readgallery as $gallerykey){
              ?>
              <article class="sigma_recent-post">
                <a href="galleryDetails.php?gallery_id=<?php echo $gallerykey["gallery_id"]; ?>"><img src="chc-admin/<?php echo $gallerykey["gallery_img"]; ?>" alt="post" style="height:80px;width:100px;">
                </a>
                <div class="sigma_recent-post-body">
                  <h6> <a href="galleryDetails.php?gallery_id=<?php echo $gallerykey["gallery_id"]; ?>">
                     <?php
                        $gallery_desc=$gallerykey["img_desc"];
                        if(strlen($gallery_desc)>=30){
                          echo substr($gallery_desc,0,30)." .." ;
                        }else{
                          echo $gallery_desc;
                        }
                      ?>
                  </a> </h6>
                  <a href="galleryDetails.php?gallery_id=<?php echo $gallerykey["gallery_id"]; ?>"> <i class="far fa-calendar"></i>
                      <?php 
                        $strdate =$gallerykey["added_date"];
                        $year= date('Y',strtotime($strdate));
                        $month=date('M',strtotime($strdate));
                        $day= date('d',strtotime($strdate));
                        echo $day." ".$month." ".$year ; 
                      ?>
                  </a>
                </div>
              </article>
              <?php    
                  }
                 }else{
              ?>
                <h4>No Post Yet !</h4>
              <?php   
                 }
              ?>
              
            </div>
            <!-- Popular Feed End -->

            <!-- Social Media Start -->
            <div class="sidebar-widget">
              <h5 class="widget-title">Social Accounts</h5>
              <ul class="sigma_sm square light">
              <li>
                <a href="https://www.facebook.com/CityHarvestGhy/" target="_blank">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li>
                <a href="https://www.instagram.com/cityharvestghy/" target="_blank">
                  <i class="fab fa-instagram"></i>
                </a>
              </li>
              <li>
                <a href="https://twitter.com/cityharvestghy" target="_blank">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li>
                <a href="https://www.youtube.com/@CityHarvestGhy" target="_blank">
                  <i class="fab fa-youtube"></i>
                </a>
              </li>
              </ul>
            </div>
            <!-- Social Media End -->

          
            <!-- Instagram Start -->
            <div class="sidebar-widget widget-ig">
              <h5 class="widget-title">Gallery</h5>
              <div class="row">
              <?php
                  $readgallery=$crud->Read("gallery","1 order by `gallery_id` desc limit 9");
                  if($readgallery){
                    foreach($readgallery as $gallerykey){
                  ?>

                  <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                  <a href="gallery.php" class="sigma_ig-item">
                    <img src="chc-admin/<?php echo $gallerykey["gallery_img"]; ?>" alt="ig" style="height:80px;">
                  </a>
                  </div>

                  <?php    
                    }
                  }
                ?>
              </div>
            </div>
            <!-- Instagram End -->

           
          </div>
        </div>
        <!-- Sidebar End -->

      </div>

    </div>
  </div>
  <!-- Post Content End -->


  <?php include("include/footer.php") ?>
