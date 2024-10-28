<?php include("include/header.php"); ?>
<?php include("include/navigation-bar.php"); ?>

<!-- partial:partia/__subheader.html -->

<?php
    $readabout=$crud->SelectOne("about","1 order by `about_id` desc");
    if($readabout){
      $about_intro=$readabout[0]["about_intro"];
      $about_title=$readabout[0]["about_title"];
      $about_desc=$readabout[0]['about_desc'];
      $about_img=$readabout[0]["about_img"];
      $about_link=$readabout[0]["about_link"];
  
  ?>

  <style>
      @media screen and (max-width: 530px) {
          .sigma_subheader-inner{
            flex-direction: column;
          }
          .container{
            padding: 0;
            margin: 0;
          }
          .sigma_subheader-inner{
          
            margin: 40;
          }
          .padding{
            padding: 12px;
          }

       
      }
  </style>

<div class="sigma_subheader dark-overlay dark-overlay-2"
  style="background-image: url(assets/img/subheader.jpg);opacity:0.7;">

  <div class="container" style="opacity:1;">
    <div class="sigma_subheader-inner" style="display: flex; justify-content: space-between">
      <div class="sigma_subheader-text" style="width: 72%; margin-top: 32px;">
        <h3 style="color: rgb(241, 233, 233);">
          <?php echo $about_title; ?>
        </h3>
        <p class="blockquote light">
          <?php echo $about_intro; ?>
        </p>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            <a href="<?php echo $about_link ; ?>" class="popup-youtube breadcrumb-item active">
              About US
            </a>
          </li>
        </ol>
      </nav>
    </div>
  </div>

</div>
<!-- partial -->

<!-- Post Content Start -->
<div class="section">
  <div class="container">

    <div class="entry-content">

      <div class="text-center">
        <img src="chc-admin/<?php  echo $about_img ;?>" alt="post" style=" width: 70%;height: 450px;">

      </div>

      <p class="padding">
        <?php  echo $about_desc ;?>
      </p>

      <div class="row" style="margin-top:80px;">
        <div class="col-lg-6">
          <div class="sigma_icon-block icon-block-3">
            <div class="icon-wrapper">
              <i class="flaticon-church-2"></i>
            </div>
            <div class="sigma_icon-block-content padding">
              <h5>Vision</h5>
              <p>"City Harvest Church envisions a community where love, compassion, and faith converge to uplift and empower individuals. Our vision is to cultivate a vibrant spiritual family that fosters personal growth, inspires service to others, and spreads hope throughout our city. Through dynamic worship and unwavering dedication, we aim to transform lives and build a brighter future for all."</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="sigma_icon-block icon-block-3">
            <div class="icon-wrapper">
              <i class="flaticon-charity"></i>
            </div>
            <div class="sigma_icon-block-content padding">
              <h5>Mission </h5>
              <p>"City Harvest Church is dedicated to spreading the message of God's love and grace, reaching out to every corner of our city with compassion and understanding. Our mission is to empower individuals to discover their purpose, grow in their faith, and make a positive impact in the world. Through passionate leadership, innovative programs, and steadfast commitment."</p>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-5">
        <a href="<?php echo $about_link ; ?>" class="sigma_video-popup popup-sm popup-youtube">
          <i class="fas fa-play"></i>
        </a>
      </div>

      <div class="section padding">
        <div class="row">
          <?php
          $readgallery=$crud->Read("gallery","1 order by `gallery_id` desc limit 2");
          if($readgallery){
          ?>
          <div class="col-lg-6">
            <div class="sigma_img-box">
              <div class="row">

                <div class="col-lg-6">
                  <img src="chc-admin/<?php echo $readgallery[0]["gallery_img"] ; ?>" alt="gallery image 1"
                  style="height:330px;width:250px;">
                </div>
                <div class="col-lg-6 mt-5">
                  <img src="chc-admin/<?php echo $readgallery[1]["gallery_img"] ; ?>" alt="gallery image 2"
                  style="height:330px;width:250px;">
                </div>

              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="me-lg-30">
              <div class="section-title text-start">
                <a href="gallery.php">
                  <p class="subtitle">Gallery</p>
                </a>
                <h4 class="title">Check it Out Our Church Gallery</h4>
              </div>
              <ul class="sigma_list list-2">
                <li>Peace of Mind</li>
                <li>Connection towords God</li>
                <li>100% Satisfaction</li>
                <li>Worship</li>
              </ul>
            </div>
          </div>
              <!-- gallery redirector ! -->
            <?php
            }else{?>

                 
<div class="col-lg-6">
            <div class="sigma_img-box">
              <div class="row">

                <div class="col-lg-6">
                  <div style="height:330px;width:250px; box-shadow: 0 0 8px gainsboro;">
                  
                    <img src="" alt="empty image gallery"
                    style="height:330px;width:250px;" >
                  </div>
                </div>
                <div class="col-lg-6 mt-5">
                  <div style="height:330px;width:250px; box-shadow: 0 0 8px gainsboro;">
                    <img src="" alt="empty image gallery"
                    style="height:330px;width:250px;">
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="me-lg-30">
              <div class="section-title text-start">
                <a href="gallery.php">
                  <p class="subtitle">Gallery</p>
                </a>
                <h4 class="title">Check it Out Our Church Gallery</h4>
              </div>
              <ul class="sigma_list list-2">
                <li>Peace of Mind</li>
                <li>Connection towords God</li>
                <li>100% Satisfaction</li>
                <li>Worship</li>
              </ul>
            </div>
          </div>



            <?php
            }
            ?>
  
        </div>
      </div>

    </div>

    <script>
      function redirectToGoogle(keyword) {
        var searchUrl = "http://www.google.com/search?q=" + encodeURIComponent(keyword);
        window.location.href = searchUrl;
      }
    </script>

    <p class="padding">

      Jesus, revered as the central figure of Christianity, is believed to be the Son of God and the Messiah,
      fulfilling prophesies in the Old Testament. He is portrayed as a teacher, healer, and spiritual leader who
      preached love, compassion, and forgiveness. His life, teachings, death, and resurrection form the foundation of
      Christian faith, emphasizing redemption and salvation for humanity.
      Christians regard <a href="#" target="_blank" onclick="redirectToGoogle('jesus')">Jesus</a> as both fully divine and fully
      human, emphasizing his role as the bridge between God and humanity, offering reconciliation and eternal life to
      those who believe in him

    </p>
    <p class="padding">
      God, in monotheistic religions such as Christianity, is understood as the supreme being, the creator, and
      sustainer of the universe. In Christian theology, God is believed to be loving, just, and omnipotent, with
      attributes such as omniscience, omnipresence, and eternal existence. God is often perceived as a father figure
      who cares for and guides humanity, offering grace, mercy, and salvation to those who seek a relationship with
      him.
    </p>

  </div>
</div>
<!-- Post Content End -->

<?php }else{ ?>

  <div class="sigma_subheader dark-overlay dark-overlay-2"
  style="background-image: url(assets/img/subheader.jpg);opacity:0.7;">

  <div class="container" style="opacity:1;">
    <div class="sigma_subheader-inner" style="display: flex; justify-content: space-between">
      <div class="sigma_subheader-text" style="width: 72%; margin-top: 32px;">
        <h3 style="color: rgb(241, 233, 233);">
        About Title Here.
        </h3>
        <p class="blockquote light">
        About Introduction here.
        </p>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            <a href="javascript:void()" class="popup-youtube breadcrumb-item active">
              About US
            </a>
          </li>
        </ol>
      </nav>
    </div>
  </div>

</div>
<!-- partial -->

<!-- Post Content Start -->
<div class="section">
  <div class="container">

    <div class="entry-content">

      <div class="text-center">
       
          <img src="chc-admin\images\about-img\no image2.PNG" alt="about img" style=" width: 70%;height: 450px;">
   
        

      </div>

      <p class="padding">
       Website about description here.
      </p>

      <div class="row" style="margin-top:80px;">
        <div class="col-lg-6">
          <div class="sigma_icon-block icon-block-3">
            <div class="icon-wrapper">
              <i class="flaticon-church-2"></i>
            </div>
            <div class="sigma_icon-block-content padding">
              <h5>Vision</h5>
              <p>"City Harvest Church envisions a community where love, compassion, and faith converge to uplift and empower individuals. Our vision is to cultivate a vibrant spiritual family that fosters personal growth, inspires service to others, and spreads hope throughout our city. Through dynamic worship and unwavering dedication, we aim to transform lives and build a brighter future for all."</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="sigma_icon-block icon-block-3">
            <div class="icon-wrapper">
              <i class="flaticon-charity"></i>
            </div>
            <div class="sigma_icon-block-content padding">
              <h5>Mission </h5>
              <p>"City Harvest Church is dedicated to spreading the message of God's love and grace, reaching out to every corner of our city with compassion and understanding. Our mission is to empower individuals to discover their purpose, grow in their faith, and make a positive impact in the world. Through passionate leadership, innovative programs, and steadfast commitment."</p>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-5">
        <a href="javascript:void()" class="sigma_video-popup popup-sm popup-youtube">
          <i class="fas fa-play"></i>
        </a>
      </div>

      <div class="section padding">
        <div class="row">
          <?php
          $readgallery=$crud->Read("gallery","1 order by `gallery_id` desc limit 2");
          if($readgallery){
          ?>
          <div class="col-lg-6">
            <div class="sigma_img-box">
              <div class="row">

                <div class="col-lg-6">
                  <img src="chc-admin/<?php echo $readgallery[0]["gallery_img"] ; ?>" alt="gallery image 1"
                  style="height:330px;width:250px;">
                </div>
                <div class="col-lg-6 mt-5">
                  <img src="chc-admin/<?php echo $readgallery[1]["gallery_img"] ; ?>" alt="gallery image 2"
                  style="height:330px;width:250px;">
                </div>

              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="me-lg-30">
              <div class="section-title text-start">
                <a href="gallery.php">
                  <p class="subtitle">Gallery</p>
                </a>
                <h4 class="title">Check it Out Our Church Gallery</h4>
              </div>
              <ul class="sigma_list list-2">
                <li>Peace of Mind</li>
                <li>Connection towords God</li>
                <li>100% Satisfaction</li>
                <li>Worship</li>
              </ul>
            </div>
          </div>
              <!-- gallery redirector ! -->
            <?php
            }else{?>

                 
<div class="col-lg-6">
            <div class="sigma_img-box">
              <div class="row">

                <div class="col-lg-6">
                  <img src="chc-admin\images\about-img\empty image.png" alt="gallery image 1"
                  style="height:330px;width:250px;">
                </div>
                <div class="col-lg-6 mt-5">
                  <img src="chc-admin\images\about-img\empty image.png" alt="gallery image 2"
                  style="height:330px;width:250px;">
                </div>

              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="me-lg-30">
              <div class="section-title text-start">
                <a href="gallery.php">
                  <p class="subtitle">Gallery</p>
                </a>
                <h4 class="title">Check it Out Our Church Gallery</h4>
              </div>
              <ul class="sigma_list list-2">
                <li>Peace of Mind</li>
                <li>Connection towords God</li>
                <li>100% Satisfaction</li>
                <li>Worship</li>
              </ul>
            </div>
          </div>



            <?php
            }
            ?>
  
        </div>
      </div>

    </div>

    <script>
      function redirectToGoogle(keyword) {
        var searchUrl = "http://www.google.com/search?q=" + encodeURIComponent(keyword);
        window.location.href = searchUrl;
      }
    </script>

    <p class="padding">

      Jesus, revered as the central figure of Christianity, is believed to be the Son of God and the Messiah,
      fulfilling prophesies in the Old Testament. He is portrayed as a teacher, healer, and spiritual leader who
      preached love, compassion, and forgiveness. His life, teachings, death, and resurrection form the foundation of
      Christian faith, emphasizing redemption and salvation for humanity.
      Christians regard <a href="#" target="_blank" onclick="redirectToGoogle('jesus')">Jesus</a> as both fully divine and fully
      human, emphasizing his role as the bridge between God and humanity, offering reconciliation and eternal life to
      those who believe in him

    </p>
    <p class="padding">
      God, in monotheistic religions such as Christianity, is understood as the supreme being, the creator, and
      sustainer of the universe. In Christian theology, God is believed to be loving, just, and omnipotent, with
      attributes such as omniscience, omnipresence, and eternal existence. God is often perceived as a father figure
      who cares for and guides humanity, offering grace, mercy, and salvation to those who seek a relationship with
      him.
    </p>

  </div>
</div>

<!-- Post Content End -->
<?php } ?>



<?php include("include/footer.php") ?>