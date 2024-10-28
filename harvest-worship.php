
<?php include("include/header.php"); ?>
<?php include("include/navigation-bar.php"); ?>

<!-- partial:partia/__subheader.html -->
<div class="sigma_subheader dark-overlay dark-overlay-2"
  style="background-image: url(assets/img/subheader.jpg);opacity:0.7;">

  <div class="container" style="opacity:1;">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Harvest Worship</h1>
        <p class="blockquote light"> City Harvest Church's worship combines contemporary music and heartfelt devotion, fostering spiritual encounter, unity, and passion, creating a joyous celebration of faith and community.</p>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Harvest Worship</li>
        </ol>
      </nav>
    </div>
  </div>

</div>
<!-- partial -->




<!-- Harvest Worship Details Start -->
<div class="container testimonial-section bg-contain bg-norepeat bg-center"
  style="background-image: url(../assets/img/textures/map-2.png)">
  <div class="container" style="margin-top: 30px;">
    <div class="section-title text-center">
     <h5 class="title">Harvest Worship Details</h5>

    </div>
    <div class="sigma_testimonial style-2 " style="text-align: justify;">
Harvest Worship at City Harvest Church offers a diverse, engaging experience, blending contemporary Christian music with passionate leadership and interactive participation. Worship sets are carefully crafted to foster encounters with God, integrating multimedia elements for a dynamic atmosphere. Congregants are encouraged to express themselves freely, creating a Spirit-led environment where prayer, prophetic utterances, and spiritual gifts are welcomed. The worship team's commitment to excellence ensures a high standard of musical performance and technical production. Overall, Harvest Worship at City Harvest Church facilitates deep spiritual connections and empowers worshippers to encounter the presence of God in a transformative way.
    </div>


  </div>
</div>
<!-- Harvest Worship Details End -->



<!-- harvest Works -->

<div class="section section-padding">
  <div class="container">

    <div class="section section-padding bg-cover secondary-overlay bg-center bg-norepeat"
      style="background-image: url(chc-admin/<?php echo $banner_img1 ; ?>)">
      <div class="container">

        <div class="section-title text-center">
          <p class="subtitle text-white">CITY HARVEST CHURCH</p>
         <h5 class="title text-white">Meet Our Harvest Members</h5>
        </div>

        <div class="row">

          <?php
       $Readusher=$crud->Read("harvest_worship_members","1 order by `member_id` desc ");
       if($Readusher){
        foreach($Readusher as $usherkey){

    ?>

          <div class="col-lg-3 col-md-6">
            <div class="sigma_volunteers volunteers-4">
              <div class="sigma_volunteers-thumb">
                <img src="chc-admin/<?php echo $usherkey['member_photo'] ; ?>" alt="members" style="height:200px;
                width:200px;">


                <ul class="sigma_sm">
                  <li> <a href="#" class="trigger-volunteers-socials"> <i class="fal fa-plus"></i> </a> </li>
                  <li> <a href="tel:<?php echo $usherkey['member_phone'] ;?>"> <i class="fa-solid fa-phone"></i> </a>
                  </li>
                  <li> <a href='mailto:<?php echo $usherkey['member_email'] ; ?>'> <i
                        class="fa-regular fa-envelope"></i>
                    </a> </li>
                  <!-- <li> <a href="#"> <i class="fab fa-facebook-f"></i> </a> </li> -->
                </ul>
              </div>
              <div class="sigma_volunteers-body">
                <div class="sigma_volunteers-info">
                  <p class="text-white">
                    Name :
                    <?php echo $usherkey['member_name'] ; ?>
                  </p>
                  <p class="text-white" >
                    <span style="color: rgb(202, 197, 197);">Member Role : <?php echo $usherkey['member_role'] ; ?> </span>
                    
                  </p>

                </div>
              </div>
            </div>
          </div>

          <?php 
      }
    }else { ?>

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

   <?php }
    ?>



        </div>

      </div>
    </div>

  </div>
</div>


<!-- harvest works  -->



<!-- Songs Start -->
<div class="section section-padding" style="margin-top: 5px;">
  <div class="container">
    <div class="section-title text-center">
     <h5 class="title">Harvest Worship Song Gallery </h5>
      <p>
        "City Harvest Church Song Gallery: A treasury of worship songs, uplifting spirits with melodies that resonate,
        inspire, and ignite faith."</p>
    </div>


      <!-- This is a necessary div for pagination  -->
  <div id="itemList">


    <div class="row">


      <?php
      $ReadSongs=$crud->Read("harvest_songs","1 order by `song_id` desc ");
      if($ReadSongs){
       foreach($ReadSongs as $usherkey){ ?>

      <!-- Article Start -->
      <div class="col-lg-4 col-md-6 item">
        <article class="sigma_post">
          <div class="sigma_post-thumb">
            <a href="<?php echo $usherkey["song_link"] ; ?>" class="popup-youtube">
              <img src="chc-admin/<?php echo $usherkey['song_img'] ; ?>" alt="post" style="height:300px;
              width: 100%;">
            </a>
          </div>
          <div class="sigma_post-body">
            <div class="sigma_post-meta">
              <div class="me-3">
                <i class="far fa-cross"></i>
                <a href="javascript:void()" class="sigma_post-category">Church</a>,
                <a href="javascript:void()" class="sigma_post-category">Love</a>
              </div>
              <a href="javascript:void()" class="sigma_post-date"> <i class="far fa-calendar"></i>
                <?php echo $usherkey['date_uploaded'] ; ?>
              </a>
            </div>
            <h6 style="min-height: 110px;">

              <a href="<?php echo $usherkey["song_link"] ; ?>" class="popup-youtube">
                <?php echo $usherkey['song_name'] ; ?>
              </a>
            </h6>

            <div class="sigma_post-single-author">

              <div class="sigma_post-single-author-content">
                By <p style="font-size: small;">
                  <?php echo $usherkey['artist_name'] ; ?>
                </p>
              </div>
            </div>
          </div>
        </article>
      </div>
      <!-- Article End -->

      <?php }
      }else{ ?>

       <!-- Article Start -->
       <div class="col-lg-4 col-md-6 item">
        <article class="sigma_post">
          <div class="sigma_post-thumb">
            <a href="" class="popup-youtube">
              <img src="chc-admin\images\harvestWorks\empty gallery.png" alt="post" style="height:300px;
              width: 100%;">
            </a>
          </div>
          <div class="sigma_post-body">
            <div class="sigma_post-meta">
              <div class="me-3">
                <i class="far fa-cross"></i>
                <a href="javascript:void()" class="sigma_post-category">Church</a>,
                <a href="javascript:void()" class="sigma_post-category">Love</a>
              </div>
              <a href="javascript:void()" class="sigma_post-date"> <i class="far fa-calendar"></i>
               Song Date
              </a>
            </div>
            <h6 style="min-height: 110px;">

              <a href="<?php echo $usherkey["song_link"] ; ?>" class="popup-youtube">
               Song Name
              </a>
            </h6>

            <div class="sigma_post-single-author">

              <div class="sigma_post-single-author-content">
                By <p style="font-size: small;">
                 Artist Name
                </p>
              </div>
            </div>
          </div>
        </article>
      </div>
      <!-- Article End -->

       <!-- Article Start -->
       <div class="col-lg-4 col-md-6 item">
        <article class="sigma_post">
          <div class="sigma_post-thumb">
            <a href="" class="popup-youtube">
              <img src="chc-admin\images\harvestWorks\empty gallery.png" alt="post" style="height:300px;
              width: 100%;">
            </a>
          </div>
          <div class="sigma_post-body">
            <div class="sigma_post-meta">
              <div class="me-3">
                <i class="far fa-cross"></i>
                <a href="javascript:void()" class="sigma_post-category">Church</a>,
                <a href="javascript:void()" class="sigma_post-category">Love</a>
              </div>
              <a href="javascript:void()" class="sigma_post-date"> <i class="far fa-calendar"></i>
               Song Date
              </a>
            </div>
            <h6 style="min-height: 110px;">

              <a href="<?php echo $usherkey["song_link"] ; ?>" class="popup-youtube">
               Song Name
              </a>
            </h6>

            <div class="sigma_post-single-author">

              <div class="sigma_post-single-author-content">
                By <p style="font-size: small;">
                 Artist Name
                </p>
              </div>
            </div>
          </div>
        </article>
      </div>
      <!-- Article End -->


       <!-- Article Start -->
       <div class="col-lg-4 col-md-6 item">
        <article class="sigma_post">
          <div class="sigma_post-thumb">
            <a href="" class="popup-youtube">
              <img src="chc-admin\images\harvestWorks\empty gallery.png" alt="post" style="height:300px;
              width: 100%;">
            </a>
          </div>
          <div class="sigma_post-body">
            <div class="sigma_post-meta">
              <div class="me-3">
                <i class="far fa-cross"></i>
                <a href="javascript:void()" class="sigma_post-category">Church</a>,
                <a href="javascript:void()" class="sigma_post-category">Love</a>
              </div>
              <a href="javascript:void()" class="sigma_post-date"> <i class="far fa-calendar"></i>
               Song Date
              </a>
            </div>
            <h6 style="min-height: 110px;">

              <a href="<?php echo $usherkey["song_link"] ; ?>" class="popup-youtube">
               Song Name
              </a>
            </h6>

            <div class="sigma_post-single-author">

              <div class="sigma_post-single-author-content">
                By <p style="font-size: small;">
                 Artist Name
                </p>
              </div>
            </div>
          </div>
        </article>
      </div>
      <!-- Article End -->


       <!-- Article Start -->
       <div class="col-lg-4 col-md-6 item">
        <article class="sigma_post">
          <div class="sigma_post-thumb">
            <a href="" class="popup-youtube">
              <img src="chc-admin\images\harvestWorks\empty gallery.png" alt="post" style="height:300px;
              width: 100%;">
            </a>
          </div>
          <div class="sigma_post-body">
            <div class="sigma_post-meta">
              <div class="me-3">
                <i class="far fa-cross"></i>
                <a href="javascript:void()" class="sigma_post-category">Church</a>,
                <a href="javascript:void()" class="sigma_post-category">Love</a>
              </div>
              <a href="javascript:void()" class="sigma_post-date"> <i class="far fa-calendar"></i>
               Song Date
              </a>
            </div>
            <h6 style="min-height: 110px;">

              <a href="<?php echo $usherkey["song_link"] ; ?>" class="popup-youtube">
               Song Name
              </a>
            </h6>

            <div class="sigma_post-single-author">

              <div class="sigma_post-single-author-content">
                By <p style="font-size: small;">
                 Artist Name
                </p>
              </div>
            </div>
          </div>
        </article>
      </div>
      <!-- Article End -->

      

        
       <?php } ?>
     

    </div>


  </div>


<?php if($ReadSongs){ ?>

   <!-- this is pagination buttons will genarate by javascript -->
   <div class="container text-center mt-0">
    <div id="pagination" class="pagination"></div>
  </div>

  <!-- here need to link paginationStyle.css to design pagination buttons -->

  <?php }?>



  </div>
</div>



<!-- pagination script start -->

<script>

  // Function to paginate items
  function paginateItems(pageNumber, itemsPerPage) {
    var items = document.querySelectorAll('.item');
    var startIndex = (pageNumber - 1) * itemsPerPage;
    var endIndex = startIndex + itemsPerPage;
  
    items.forEach(function (item, index) {
      if (index >= startIndex && index < endIndex) {
        item.style.display = 'block';
      } else {
        item.style.display = 'none';
      }
    });
  }
  
  
  
  // Function to fetch paginated items from the server
  function fetchPaginatedItems(pageNumber, itemsPerPage) {
    // Make an AJAX request to the server to fetch paginated items
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // Update the content of the itemList div with the fetched items
          document.getElementById('itemList').innerHTML = xhr.responseText;
        } else {
          console.error('Error fetching paginated items:', xhr.status);
        }
      }
    };
    xhr.open('GET', 'get_paginated_items.php?page=' + pageNumber + '&itemsPerPage=' + itemsPerPage, true);
    xhr.send();
  }
  
  
  
  // Function to generate pagination links
  function generatePagination(totalItems, itemsPerPage) {
    var totalPages = Math.ceil(totalItems / itemsPerPage);
    var pagination = document.getElementById('pagination');
  
    // Clear existing pagination buttons
    pagination.innerHTML = '';
  
    // Function to update active class
    function updateActiveClass(pageNumber) {
      var links = document.querySelectorAll('#pagination a');
      links.forEach(function (link) {
        link.classList.remove('active');
        if (link.textContent === pageNumber.toString()) {
          link.classList.add('active');
        }
      });
    }
  
    // Previous button
    var prevButton = document.createElement('a');
    prevButton.href = '#';
    prevButton.textContent = 'Previous';
    prevButton.addEventListener('click', function (event) {
      event.preventDefault();
      var currentPage = parseInt(getParameterByName('page')) || 1;
      if (currentPage > 1) {
        prevButton.style.display = 'inline-block';
        window.location.href = '?page=' + (currentPage - 1);
      } else {
        prevButton.style.display = 'none';
      }
    });
    pagination.appendChild(prevButton);
  
    // Numbered pagination links
    var maxPages = 4; // Maximum number of pages to display
    var startPage = 1;
    var endPage = totalPages;
    
    if (totalPages > maxPages) {
      var currentPage = parseInt(getParameterByName('page')) || 1;
      var offset = Math.floor(maxPages / 2);
      startPage = Math.max(currentPage - offset, 1);
      endPage = Math.min(startPage + maxPages - 1, totalPages);
      if (endPage - startPage < maxPages - 1) {
        startPage = Math.max(endPage - maxPages + 1, 1);
      }
    }
  
    for (var i = startPage; i <= endPage; i++) {
      var link = document.createElement('a');
      link.href = '?page=' + i;
      link.textContent = i;
      pagination.appendChild(link);
    }
  
    // Next button
    var nextButton = document.createElement('a');
    nextButton.href = '#';
    nextButton.textContent = 'Next';
    nextButton.addEventListener('click', function (event) {
      event.preventDefault();
      var currentPage = parseInt(getParameterByName('page')) || 1;
      if (currentPage < totalPages) {
        nextButton.style.display = 'inline-block';
        window.location.href = '?page=' + (currentPage + 1);
      } else {
        nextButton.style.display = 'none';
      }
    });
    pagination.appendChild(nextButton);
  
    // Initially set the active class for the current page
    var currentPage = parseInt(getParameterByName('page')) || 1;
    updateActiveClass(currentPage);
  }
  
  
  // Function to get URL parameter by name
  function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
      results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
  }
  
  // Function to handle URL parameters and load corresponding page
  function handleUrlParams() {
    var pageNumber = parseInt(getParameterByName('page')) || 1;
    paginateItems(pageNumber, itemsPerPage);
  }
  
  
  
  // Call the pagination functions
  var itemsPerPage = 6;  // Change this to set the number of items per page
  handleUrlParams(); // Initial page load based on URL parameters
  generatePagination(document.querySelectorAll('.item').length, itemsPerPage);
  
  
  // <div id="pagination">
  //   <a href="#">Previous</a>
  //   <a href="?page=1">1</a>
  //   <a href="?page=2">2</a>
  //   <a href="?page=3">3</a>
  //   <a href="?page=4">4</a>
  //   <a href="#">Next</a>
  // </div>
  
  
  </script> 

<!-- pagination script end   -->


<?php include("include/footer.php") ?>