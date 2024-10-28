<?php include("include/header.php"); ?>
<?php include("include/navigation-bar.php"); ?>


<!-- partial:partia/__subheader.html -->
<div class="sigma_subheader dark-overlay dark-overlay-2"
    style="background-image: url(assets/img/subheader.jpg);opacity:0.7;">

    <div class="container" style="opacity:1;">
        <div class="sigma_subheader-inner">
            <div class="sigma_subheader-text">
                <h1>Ministry Details</h1>
                <p class="blockquote light"> We are a church that belives in Jesus christ and the followers.</p>
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


<div class="section">
    <div class="container">
        <div class="entry-content">

            <?php
          $mid=  $_GET['ministryId'];
          $readministry=$crud->Read("children_gallery"," ch_g_id = $mid");
            if($readministry){
          ?>

            <span class="fw-600 custom-primary text-uppercase">Church Service</span>
            <h3 class="entry-title"><?php echo $readministry[0]["ch_g_title"] ; ?></h3>
            <div class="sigma_post-single-thumb">
                <img src="chc-admin/<?php echo $readministry[0]["ch_g_img"] ; ?>" alt="video"style="height:620px;width:85%;" >
                <div class="sigma_box">
                    <div class="sigma_list-item">
                        <label>Title:</label>
                        <span><?php echo $readministry[0]["ch_g_title"] ; ?></span>
                    </div>
                    <div class="sigma_list-item">
                        <label>Date:</label>
                        <span><?php echo $readministry[0]["ch_g_date"] ; ?></span>
                    </div>
                    
                    <?php 
                        $keyword = $readministry[0]["ch_g_keyword"];
                        if ($keyword != "null") {  ?>

                        <div class="sigma_list-item">
                            <label>Category:</label>
                            <span><?php echo $readministry[0]["ch_g_keyword"] ; ?></span>
                        </div>
                     <?php } 
                        ?>
                            


                  
                     
                   
                   
                    <div class="sigma_list-item">
                        <ul class="sigma_sm">
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
                            <a href="https://twitter.com/cityharvestghy/" target="_blank">
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
                </div>
            </div>
            <p style="margin-bottom: 65px;">
            <?php echo $readministry[0]["ch_g_desc"] ; ?>
            </p>
                     
            <div class="portfolio-slider">
            <?php
                $twoministry=$crud->Read("children_gallery","1 order by `ch_g_id` desc limit 2");
                if($twoministry){
                foreach($twoministry as $mins){
                
            ?>
               <div class="sigma_portfolio-item style-3">                  
                    <img src="chc-admin/<?php echo $mins["ch_g_img"] ; ?>" alt="portfolio" style="height:400px;width:650px;">
                    <div class="sigma_portfolio-item-content">
                        <div class="sigma_portfolio-item-content-inner">
                            <a href="javascript:void()">Church</a>
                            <h5> <a href="children-ministry.php">Ministries </a> </h5>
                        </div>
                        <a href="children-ministry.php"><i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            <?php      
                }
                }
            ?>
                            
            </div>
           
           
        </div>

            <?php 
                }
  
           ?>

            
    </div>
</div>


<?php include("include/footer.php") ?>


<!-- children-ministry-details.php -->