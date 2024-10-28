<?php include("include/header.php"); ?>
<?php include("include/navigation-bar.php"); ?>


<!-- partial:partia/__subheader.html -->
<div class="sigma_subheader dark-overlay dark-overlay-2"
  style="background-image: url(assets/img/subheader.jpg);opacity:0.7;">

  <div class="container" style="opacity:1;">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Events</h1>
        <p class="blockquote light"> We are a church that belives in Jesus christ and the followers.</p>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Event</li>
        </ol>
      </nav>
    </div>
  </div>

</div>
<!-- partial -->

  <div class="section">
    <div class="container">

      <div class="row">

        <div class="col-lg-8"  id="itemList">

        <?php
          $readevent=$crud->Read("events","1 order by `events_id` desc ");
          $lastEvent = 0;

          if($readevent){
            foreach($readevent as $event){
              $lastEvent = $event["events_id"] ; 
        ?>
          <!-- Article Start -->
          <article class="sigma_post sigma_post-list event-list item">
            <div class="sigma_post-thumb">
              <a href="event-details.php?eid=<?php echo $event["events_id"] ; ?>">
                <img src="chc-admin/<?php echo $event["event_img"] ; ?>" alt="post" style="width:850px;height:520px;">
              </a>
              <div class="event-date-wrapper">
                <?php $edate=$event["events_date"];
                    $date=date("d",strtotime($edate));
                    $day=date("D",strtotime($edate));
                    $month=date("M",strtotime($edate));
                    $year=date("Y",strtotime($edate));
                ?>
                <span><?php echo $date ; ?></span>
                <?php echo $month." ".$year ; ?>
              </div>
            </div>
            <div class="sigma_post-body">
              <h5> <a href="event-details.php?eid=<?php echo $event["events_id"] ; ?>"><?php echo $event["events_title"] ; ?></a> </h5>
              <p><?php echo $event["events_desc"] ; ?></p>
                <div class="sigma_post-meta">
                  <a href="event-details.php?eid=<?php echo $event["events_id"] ; ?>"> <i class="far fa-clock"></i><?php echo $day; ?></a>
                  <a href="event-details.php?eid=<?php echo $event["events_id"] ; ?>"> <i class="far fa-map-marker-alt"></i><?php echo $event["event_location"] ; ?></a>
                </div>

                <div class="section-button d-flex align-items-center">
                  <a href="event-details.php?eid=<?php echo $event["events_id"] ; ?>" class="sigma_btn-custom">view<i class="far fa-arrow-right"></i> </a>
                </div>

            </div>
          </article>
          <!-- Article End -->
        <?php    
          }
        }else{
        ?>
           <h4 class="text-center text-danger">NO Events Details Found !</h4>
        <?php
        }
        ?>


         <?php    if($readevent){ ?>      
        <!-- this is pagination buttons will genarate by javascript -->
        <div class="container text-center mt-0">
            <div id="pagination" class="pagination"></div>
          </div>

          <!-- here need to link paginationStyle.css to design pagination buttons -->
        <?php } ?>
        
        <!-- <div class="load text-center m-4" style="display: flex; justify-content: end;">
          <button type="button" class="load-more-btn btn btn-outline-warning" id="seeMore">
           See More....</button>
        </div> -->

       

      

        </div>

        <div class="col-lg-4">
          <div class="sidebar">

            <!-- About Author Start -->
            <div class="sidebar-widget widget-about-author">
              <h5 class="widget-title">Recent Event</h5>
              <div class="widget-about-author-inner">

                <?php 
                  $live_event=$crud->Read("events","1 order by `events_id` desc limit 1");
                  if($live_event){
                    $recentevent=$live_event[0];              
                ?>
                <a href="event-details.php?eid=<?php echo $recentevent["events_id"] ; ?>">
                <img src="chc-admin/<?php echo $recentevent["event_img"] ; ?>" alt="author" style="width:150px;height:150px;">
                <h5><?php echo $recentevent["events_title"]; ?></h5>
                <p>
                  <?php
                     $eventdesc=$recentevent["events_desc"];
                    if(strlen($eventdesc)>=100){
                      echo substr($eventdesc,0,100)." ..";
                    }else echo $eventdesc;
                  ?>
                </p>
                </a>
                <?php }else{ ?>
                   <h6 style="color: #c9c8c8;">Oops no content found!</h6>
                <?php } ?>
              </div>
            </div>
            <!-- About Author End -->

          
            <!-- Popular Feed Start -->
            <div class="sidebar-widget widget-recent-posts">
              <h5 class="widget-title">Our Recent Events</h5>
              <?php
                $recent_events=$crud->Read("events","1 order by `events_id` desc limit 8");
                if($recent_events){
                  foreach($recent_events as $res){
               ?>
                  <article class="sigma_recent-post">
                    <a href="event-details.php?eid=<?php echo $res["events_id"] ; ?>"><img src="chc-admin/<?php echo $res["event_img"] ; ?>" alt="post" style="height:80px;width:100px;"></a>
                    <div class="sigma_recent-post-body">
                      <h6> <a href="event-details.php?eid=<?php echo $res["events_id"] ; ?>">
                        <?php
                            $event_desc=$res["events_desc"];
                            if(strlen($event_desc)>=30){
                              echo substr($event_desc,0,30)." .." ;
                            }else{
                              echo $event_desc;
                            }
                          ?>
                      </a> </h6>
                      <a href="event-details.php?eid=<?php echo $res["events_id"] ; ?>"> <i class="far fa-calendar"></i>
                          <?php 
                            $strdate =$res["events_date"];
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
                }else { ?>
                  <h6 style="color: #c9c8c8;">No Event data exist in database</h6>
             <?php   }
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
                  }else {  ?>
                    <h6 style="color: #c9c8c8;">Church Gallery is empty.</h6>
               <?php   }
                ?>
              </div>
            </div>
            <!-- Instagram End -->

            
            <!-- Ad banner Start -->
            <div class="sidebar-widget widget-ad p-0 border-0">
              <?php
                $headblog=$crud->Read("blog","1 order by `blog_id` desc limit 1");
                if($headblog){
                  $first_blog=$headblog[0]; ?>
              
              <a href="blog-details.php?post_id=<?php echo $first_blog["blog_id"] ; ?>">
                <img src="chc-admin/<?php echo $first_blog["blog_img"] ; ?>" alt="ad">
                <div>
                  <span>Current Blog</span>
                   Go To The Live Blog
                </div>
              </a>
            </div>
            <!-- Ad banner End -->
            <?php   }
            ?>

          </div>
        </div>

      </div>

    </div>
  </div>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 





 <!-- script for load more  events  -->

 <!-- <script>
     
  let offset = 6; // Number of events already displayed
   const limit = 4; // Number of events to fetch per request

 async function loadMoreEvents() {



      try {
     const response = await fetch(`fetch_more_events.php?offset=${offset}&limit=${limit}`);
     
     if (!response.ok) {
         throw new Error(`HTTP error! Status: ${response.status}`);
     }

     const data = await response.json();

     if (data.length > 0) {
         let eventsList = document.querySelector('#events');
         
         data.forEach(event => {
             let date = new Date(event.events_date);
             let day1 = date.toLocaleString('en-US', { weekday: 'short' });
             let day = date.getDate();
             let month = date.toLocaleString('en-US', { month: 'short' });
             let year = date.getFullYear();
             
             let eventHtml = `
             
          <article class="sigma_post sigma_post-list event-list">
            <div class="sigma_post-thumb">
              <a href="event-details.php?eid=${event.events_id}">
                <img src="chc-admin/${event.event_img}" alt="post" style="width:850px;height:520px;">
              </a>
              <div class="event-date-wrapper">
              
                <span>${day1}</span>
                ${month}
              </div>
            </div>
            <div class="sigma_post-body">
              <h5> <a href="event-details.php?eid= ${event.events_id}"> ${event.events_title}</a> </h5>
              <p> ${event.events_desc}</p>
                <div class="sigma_post-meta">
                  <a href="event-details.php?eid=${events_id}"> <i class="far fa-clock"></i>${day}</a>
                  <a href="event-details.php?eid=${events_id}"> <i class="far fa-map-marker-alt"></i>${event.event_location}</a>
                </div>

                <div class="section-button d-flex align-items-center">
                  <a href="event-details.php?eid=${event.events_id}" class="sigma_btn-custom">view<i class="far fa-arrow-right"></i> </a>
                </div>

            </div>
          </article>
        
             `;
             
             eventsList.innerHTML += eventHtml;
         });
         
         offset += limit; // Update the offset for the next request
     } else {
         // No more events to load
       document.querySelector(".load-more-btn").textContent = "No Data Available";

     }
 } catch (error) {
     console.error('Error fetching events:', error);
 }
}

// Trigger the loadMoreEvents function when the user clicks on a button or scrolls to a certain point
document.querySelector('.load-more-btn').addEventListener('click', loadMoreEvents);


 </script> -->

  <!-- script for see more events  -->








   <!-- pagintion script start -->
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
var itemsPerPage = 5;  // Change this to set the number of items per page
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
   <!-- pagintion script end -->

   


  <!-- <?php include("include/footer.php") ?> -->
