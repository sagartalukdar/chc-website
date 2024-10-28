<?php include("include/header.php"); ?>
<?php include("include/navigation-bar.php"); ?>

<!-- partial:partia/__subheader.html -->
<div class="sigma_subheader dark-overlay dark-overlay-2"
  style="background-image: url(assets/img/subheader.jpg);opacity:0.7;">

  <div class="container" style="opacity:1;">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Harvest Sports Club</h1>
        <p class="blockquote light"> Enter Harvest Sports Club, your gateway to boundless energy and camaraderie. Embrace the thrill of sports, ignite your passion today!</p>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Sports club</li>
        </ol>
      </nav>
    </div>
  </div>

</div>
<!-- partial -->

 <!-- Sports Club details Start -->

 <div class="container testimonial-section bg-contain bg-norepeat bg-center"
  style="background-image: url(../assets/img/textures/map-2.png)">
  <div class="container" style="margin-top: 30px;">
    <div class="section-title text-center">
     <h5 class="title">Sports Club Details</h5>

    </div>
    <div class="sigma_testimonial style-2 " style="text-align: justify;">

    Harvest Sports Club, a branch of City Harvest Church in Assam, India, is dedicated to promoting religious values through sports activities. Embracing the belief that physical fitness and spiritual well-being go hand in hand, the club offers a variety of sports initiatives to engage the community. These <b>Sports</b> events serve as platforms for fellowship, teamwork, and personal development, fostering camaraderie among participants while instilling core Christian values such as integrity, discipline, and sportsmanship. Beyond physical exercise, the club aims to spread religiousness by integrating faith-based messages and teachings into its sporting events, creating opportunities for spiritual growth and reflection. By combining the universal appeal of sports with the mission of City Harvest Church, Harvest Sports Club endeavors to positively impact lives and build a stronger sense of community rooted in faith and athleticism.
    <br>
    <div style="text-align: center;" class="mt-3">
      <b > Scroll down to see our sports pictures.</b>
    </div>

    </div>


  </div>
</div>
 

<!-- Sports Club details End -->




  <div class="section section-padding pt-5">
    <div class="container">
      <div class="section-title text-center">
        <h4 class="title">Sports Club Gallery</h4>
        <p class="pt-5">Step into Harvest Sports Club, where excitement thrives and friendships flourish. Discover your
          game, embrace the spirit of competition!</p>
      </div>




      <!-- Icon Block Start -->
<div id="itemList">


      <div class="row">

        <?php
        $Readusher=$crud->Read("sports_club_gallery","1 order by `club_gallery_id` desc");
        if($Readusher){
         foreach($Readusher as $usherkey){ ?>


        <div class="col-lg-6 col-md-6 item" style="">
          <a href="#" class="sigma_service style-3" >
            <div class="sigma_service-thumb">

              <img src="chc-admin/<?php echo $usherkey['club_gallery_img']  ; ?>" alt="img"
                style="height:300px;width:100%">

              <i class="flaticon-church"></i>
            </div>
            <div class="sigma_service-body">
              <div class="sigma_box">
              <h5>
                <?php echo $usherkey['club_gallery_title']  ;?>
              </h5>
              <p class="initial_desc">
              
                <?php 
                      $description = $usherkey["club_gallery_about"];
                      if(strlen($description) >= 100){
                        echo substr($description, 0, 100)." ...";  
    
                        $readMoreclass = $usherkey["club_gallery_id"] . "read-more"; 

                           
                  } else {
                    echo $description;
                  }  ?>
              </p>


                <!-- Hidden div for full description -->
             <div class="full-description" style="display: none; color: #000000;">
              <?php echo $usherkey["club_gallery_about"]; ?>
             </div>

             <!-- Hidden div for full description -->


             <?php
              if(strlen($description) >= 100){
             echo '<a href="javascript:void()" class="' . $readMoreclass . ' rm">See More</a>'; 
              }?>

              </div>

            </div>
          </a>
        </div>

        <?php }} ?>

      </div>

 </div>


    </div>
  </div>



 <!-- this is pagination buttons will genarate by javascript -->
 <div class="container text-center mt-0">
    <div id="pagination" class="pagination"></div>
  </div>

  <!-- here need to link paginationStyle.css to design pagination buttons -->




  <!-- JavaScript/jQuery for "Read More" functionality -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
     
  $(document).ready(function() {
    var allreadMore = document.querySelectorAll(".rm");
    console.log(allreadMore); // like this kind of class (32read-more rm)

    allreadMore.forEach(function(e){

      var className = e.className;
         // before remove rm class
      console.log(className);

       // Remove the class "rm" from className
    className = className.replace(/\brm\b/g, '');
    
     // after remove rm class
      console.log(className);  // now like this kind of class (32read-more)

      var readbtn=$("."+className);
      readbtn.clicked=1;

      $("."+className).click(function() {
      $(this).closest(".sigma_box").find(".full-description").slideToggle();
      $(this).closest(".sigma_box").find(".initial_desc").slideToggle();

      
  
      readbtn.text((readbtn.clicked++%2==0)?"See more":"See less");
    });
    

    })

    
  });
</script>


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
  var itemsPerPage = 8;  // Change this to set the number of items per page
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