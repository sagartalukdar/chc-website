<?php include("include/header.php"); ?>
<?php include("include/navigation-bar.php"); ?>

<!-- partial:partia/__subheader.html -->
<div class="sigma_subheader dark-overlay dark-overlay-2"
  style="background-image: url(assets/img/subheader.jpg);opacity:0.7;">

  <div class="container" style="opacity:1;">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Blog</h1>
        <p class="blockquote light">"We are a church that believes in Jesus Christ and follows His teachings."</p>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Blogs</li>
        </ol>
      </nav>
    </div>
  </div>

</div>
<!-- partial -->

<style>
  @media screen and (max-width: 992px) {
    .dis-flex-col{
      display: flex;
      flex-direction: column-reverse;
    }

    .dis-flex-col2{
      display: flex;
      flex-direction: column;
    }
  }
</style>

<div class="section">
  <div class="container">

    <div class="row dis-flex-col" >

      <div class="col-lg-4">
        <div class="sidebar">

          <!-- Popular Feed Start -->
          <div class="sidebar-widget widget-recent-posts">
            <h5 class="widget-title">Recent Posts</h5>
            <?php
                 $readblog=$crud->Read("blog" , "1 order by `blog_id` desc limit 6");
                 if($readblog){
                  foreach($readblog as $blogkey){
              ?>
            <article class="sigma_recent-post">
              <a href="blog-details.php?post_id=<?php echo $blogkey["blog_id"]; ?>"><img
                  src="chc-admin/<?php echo $blogkey["blog_img"]; ?>" alt="post" style="height:80px;width:100px;">
              </a>
              <div class="sigma_recent-post-body">
                <h6> <a href="blog-details.php?post_id=<?php echo $blogkey["blog_id"]; ?>">
                    <?php
                        $blog_desc=$blogkey["blog_desc"];
                        if(strlen($blog_desc)>=30){
                          echo substr($blog_desc,0,30)." .." ;
                        }else{
                          echo $blog_desc;
                        }
                      ?>
                  </a> </h6>
                <a href="blog-details.php?post_id=<?php echo $blogkey["blog_id"]; ?>"> <i class="far fa-calendar"></i>
                  <?php 
                        $strdate =$blogkey["blog_date"];
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



          <!-- Popular Tags Start -->
          <div class="sidebar-widget">
            <h5 class="widget-title">Popular Tags</h5>
            <div class="tagcloud">
              <?php
                  $readtags=$crud->Read("blog","1 GROUP BY `blog_category` order by `blog_id` desc limit 15 ");
                  if($readtags){
                    foreach($readtags as $tags){
                 ?>
              <a href="javascript:void()">
                <?php echo $tags["blog_category"] ; ?>
              </a>
              <?php      
                    }
                  }else{
                 ?>
              <h4> Tags ! </h4>
              <?php
                  }
                ?>

            </div>
          </div>
          <!-- Popular Tags End -->

        </div>
      </div>


    

       <div class="col-lg-8 dis-flex-col2">

            <!-- This is a necessary div for pagination  -->
          <div id="itemList">


              <div class="row" >
                <?php
                          $readarticle=$crud->Read("blog","1 order by `blog_id` desc");
                          if($readarticle){
                            foreach($readarticle as $article){
                        ?>
                <!-- Article Start -->
                <div class="col-md-6  item">     <!--  here class item is mandatory to create pagination  -->
                  <article class="sigma_post">
                    <div class="sigma_post-thumb">
                      <a href="blog-details.php?post_id=<?php echo $article["blog_id"]; ?>">
                        <img src="chc-admin/<?php echo $article["blog_img"] ; ?>" alt="post"
                        style="width:100%;height:250px;">
                      </a>
                    </div>
                    <div class="sigma_post-body">
                      <div class="sigma_post-meta" style="min-height: 60px;">
                        <div class="me-3">
                          <i class="far fa-cross"></i>
                          <a href="blog-details.php?post_id=<?php echo $article["blog_id"]; ?>"
                            class="sigma_post-category">
                            <?php echo $article["blog_title"] ; ?>
                          </a>
                        </div>
                        <a href="blog-details.php?post_id=<?php echo $article["blog_id"]; ?>" class="sigma_post-date"> <i
                            class="far fa-calendar"></i>
                          <?php 
                                    $strdate =$article["blog_date"];
                                    $year= date('Y',strtotime($strdate));
                                    $month=date('M',strtotime($strdate));
                                    $day= date('d',strtotime($strdate));
                                    echo $day." ".$month." ".$year ; 
                                  ?>
                        </a>
                      </div>
                      <h5>
                        <p style="height:100px;">
                          <a href="blog-details.php?post_id=<?php echo $article["blog_id"]; ?>" >
                            <?php
                                        $blog_desc=$article["blog_desc"];
                                        if(strlen($blog_desc)>=100){
                                          echo substr($blog_desc,0,100)." .." ;
                                        }else{
                                          echo $blog_desc;
                                        }
                                      ?>
                          </a>
                        </p>
                      </h5>
                      <div class="sigma_post-single-author">
                        <?php
                                      $poster_id=$article["blog_posted_uid"];
                                      $readposter=$crud->Read("users","`id`=$poster_id");
                                      if($readposter){
                                        $poster=$readposter[0];
                                    ?>
                        <a href="blog-details.php?post_id=<?php echo $article["blog_id"]; ?>">
                          <img src="chc-admin/<?php echo $poster["user_image"] ; ?>" alt="author"
                          style="width:30px;height:30px;">
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
                          }else{
                        ?>
                <h2 class="text-center"> No Blog Posted Yet....</h2>
                <div>
                  <img src="chc-admin\images\banners\animate-photos.jpg" alt="" style="height: 100%; width: 100%;">
                </div>
                <?php    
                          }
                        ?>


              </div>


          </div>
        
         <?php 
          if($readarticle){ ?>
           <!-- this is pagination buttons will genarate by javascript -->
           <div class="container text-center mt-0">
            <div id="pagination" class="pagination"></div>
          </div>

          <!-- here need to link paginationStyle.css to design pagination buttons -->
         
          <?php }
          ?>

       </div>


    </div>

  </div>
</div>



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
    var maxPages = 5; // Maximum number of pages to display
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



<?php include("include/footer.php") ?>