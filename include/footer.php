 <!-- partial:partia/__footer.php -->
 <footer class="sigma_footer footer-2 sigma_footer-dark">

<!-- Middle Footer -->
<div class="sigma_footer-middle">
  <div class="container">
    <div class="row">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 footer-widget">

      <?php
          $readabout=$crud->Read("about","1 order by `about_id` desc");
          if($readabout){
            $about_intro=$readabout[0]["about_intro"];
            $about_title=$readabout[0]["about_title"];
            $about_desc=$readabout[0]['about_desc'];
            $about_img=$readabout[0]["about_img"];
            $about_link=$readabout[0]["about_link"];
        
      ?>
        <h5 class="widget-title"><?php echo $about_title ; ?></h5>
        <p class="mb-4"><?php echo $about_intro ; ?></p>
      <?php
        }else{
      ?>
        <h5 class="widget-title">About Us Title Here</h5>
        <p class="mb-4">Description Here !</p>

      <?php } ?>

        
        <div class="d-flex align-items-center justify-content-md-start justify-content-center">
          <a href="tel:+91 70028 98508" ><i class="far fa-phone custom-primary me-3"></i></a>
          <span >+91 70028 98508</span>
        </div>
        <div class="d-flex align-items-center justify-content-md-start justify-content-center mt-2">
          <a href="mailto:info@example.com"><i class="far fa-envelope custom-primary me-3"></i></a>
          <span>info@example.com</span>
        </div>
        <div class="d-flex align-items-center justify-content-md-start justify-content-center mt-2">
          <a href="https://maps.app.goo.gl/ZzHzUzVk3GjLQzab7" target="_blank"><i class="far fa-map-marker custom-primary me-3"></i></a>
          <span>2nd Floor, House, 42, Ananda Nagar, above Kindergarden Day-Care School, Six Mile, Guwahati, Assam 781036</span>
          
        </div>
      </div>
      <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 footer-widget">
        <h5 class="widget-title">Information</h5>
        <ul>
          <li> <a href="index.php">Our Church</a> </li>
          <li> <a href="sermons.php">Sermons</a> </li>
          <li> <a href="usher.php">Usher</a> </li>
          <li> <a href="broadcast.php">Broadcast</a> </li>
        </ul>
      </div>
      <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 footer-widget">
        <h5 class="widget-title">Others</h5>
        <ul>
          
          <li> <a href="contact-us.php">Contact Us</a> </li>
          <li> <a href="service-details.php">About Us</a> </li>
        </ul>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-3 col-sm-12 d-none d-lg-block footer-widget widget-recent-posts">
        <h5 class="widget-title">Recent Posts</h5>

        <?php
          $gallery=$crud->Read("gallery","1 order by `gallery_id` desc limit 2 ");
          if($gallery){
            foreach($gallery as $gallerykey){
          
        ?>

        <article class="sigma_recent-post">
          <a href="gallery.php"><img src="chc-admin/<?php echo $gallerykey["gallery_img"] ; ?>" alt="post" style="height:80px; width:150px;"></a>
          <div class="sigma_recent-post-body">
            <a href="gallery.php"> <i class="far fa-calendar"></i> <?php echo $gallerykey["added_date"] ; ?></a>
            <h6> <a href="gallery.php"><?php echo $gallerykey["img_title"] ; ?></a> </h6>
          </div>
        </article>

        <?php
            }
          }else{
        ?>

        <article class="sigma_recent-post">
          <a href="javascript:void()"><img src="" alt="post"></a>
          <div class="sigma_recent-post-body">
            <a href="javascript:void()"> <i class="far fa-calendar"></i> Gallery image date</a>
            <h6> <a href="javascript:void()">gallery image title </a> </h6>
          </div>
        </article>
        <article class="sigma_recent-post">
          <a href="javascript:void()"><img src="" alt="post"></a>
          <div class="sigma_recent-post-body">
            <a href="javascript:void()"> <i class="far fa-calendar"></i>  Gallery image date</a>
            <h6> <a href="javascript:void()">gallery image title </a> </h6>
          </div>
        </article>
        <article class="sigma_recent-post">
          <a href="javascript:void()"><img src="" alt="post"></a>
          <div class="sigma_recent-post-body">
            <a href="javascript:void()"> <i class="far fa-calendar"></i>  Gallery image date</a>
            <h6> <a href="javascript:void()">gallery image title </a> </h6>
          </div>
        </article>

        <?php } ?>

      </div>
    </div>
  </div>
</div>

<!-- Footer Bottom -->
<div class="sigma_footer-bottom">
  <div class="container-fluid">
    <div class="sigma_footer-copyright">
      <p> Copyright ©  - <a  class="text-white"><?php echo date("Y"); ?></a> </p>
    </div>
    <div class="sigma_footer-logo">
      <img src="assets/img/logo.png" alt="logo">
    </div>
    <ul class="sigma_sm square">
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
</div>

</footer>
<!-- partial -->

<!-- partial:partia/__scripts.php -->
<script src="assets/js/plugins/jquery-3.6.0.min.js"></script>
<script src="assets/js/plugins/popper.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/plugins/imagesloaded.min.js"></script>
<script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>
<script src="assets/js/plugins/jquery.countdown.min.js"></script>
<script src="assets/js/plugins/jquery.waypoints.min.js"></script>
<script src="assets/js/plugins/jquery.counterup.min.js"></script>
<script src="assets/js/plugins/jquery.zoom.min.js"></script>
<script src="assets/js/plugins/jquery.inview.min.js"></script>
<script src="assets/js/plugins/jquery.event.move.js"></script>
<script src="assets/js/plugins/wow.min.js"></script>
<script src="assets/js/plugins/isotope.pkgd.min.js"></script>
<script src="assets/js/plugins/slick.min.js"></script>
<script src="assets/js/plugins/ion.rangeSlider.min.js"></script>

<script src="assets/js/main.js"></script>

<!-- partial -->


 <!-- Setup and start animation! -->
 <script>
    var typed = new Typed('#phone', {
      strings: ['<i> Call At :</i>', ' +91 70028 98508'],
      typeSpeed: 50,
    });
    // strings: ['<i>First</i> sentence.', '&amp; a second sentence.'],
    setTimeout(() => {
      var typed = new Typed('#mail', {
        strings: ['<i>Mail to:</i> ', 'info@example.com'],
        typeSpeed: 50,
      });
    }, 5000);

  </script>

<script>

$(document).ready(function(){
    
    $('.items').slick({
  dots: true,
  infinite: true,
  speed: 800,
 autoplay: true,
 autoplaySpeed: 2000,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }

  ]
});
          });

  </script>
  






<!-- lightbox -->
<script src="assets/js/lightbox-plus-jquery.js"></script>

</body>

</html>