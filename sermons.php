<?php include("include/header.php"); ?>
<?php include("include/navigation-bar.php"); ?>


<style>
  @media only screen and (max-width: 444px) {
    .sigma_sermon-info{
     display: flex;
     flex-direction: column;
     gap: 12px;
   
  }
}
  
</style>

<!-- partial:partia/__subheader.html -->
<div class="sigma_subheader dark-overlay dark-overlay-2"
  style="background-image: url(assets/img/subheader.jpg);opacity:0.7;">

  <div class="container" style="opacity:1;">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Sermons</h1>
        <p class="blockquote light"> We are a church that belives in Jesus christ and the followers.</p>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Sermons</li>
        </ol>
      </nav>
    </div>
  </div>

</div>
<!-- partial -->

<!-- Services Start -->
<div class="section section-padding">
  <div class="container">

    <!-- This is a necessary div for pagination  -->
    <div id="itemList">

    <div class="row">

      <?php

        $readsermon=$crud->Read("sermon","1 order by sermon_id desc");
        if($readsermon){
          foreach($readsermon as $sermonkey){
      ?>

      <div class="col-lg-6 item">   <!--  class item must be needed to create pagination items by javascript -->
        <div class="sigma_sermon-box">
          <div class="sigma_sermon-image">
            <img src="chc-admin/<?php echo $sermonkey["ser_img"] ; ?>" alt="sermon" style="height:400px;width:100%" >
          </div>
          <div class="sigma_box">
            <span>Title :</span>
            <span class="subtitle" style="font-size: medium; color: #050505; min-height: 120px; border: 2px ;">
              <?php echo $sermonkey["sermon_name"] ; ?>
            </span>

             <div class="descpritionBox" style="border-radius: 12px; box-shadow: 0 0 12px rgb(226, 226, 226);padding: 12px;"> 

            <h4 class="title mb-0">
              <p> <i class="fa-solid fa-boxes-stacked fa-lg"></i> Description Box :  </p>
              <p style="min-height:60px; color: rgb(155, 154, 154);" class="initial_desc">

                      <?php 
                      $description = $sermonkey["sermon_description"];
                      if(strlen($description) >= 100){
                        echo substr($description, 0, 100)." ...";  
    
                        $readMoreclass = $sermonkey["sermon_id"] . "read-more"; 

                           
                  } else {
                    echo $description;
                  }  
                ?>                                 
              </p>   
             
            </h4>

             <!-- Hidden div for full description -->
             <div class="full-description" style="display: none;">
              <?php echo $sermonkey["sermon_description"]; ?>
            </div>

             <!-- Hidden div for full description -->


            <?php 
              if(strlen($description) >= 100){
            echo '<a href="javascript:void()" class="' . $readMoreclass . ' rm">See More</a>';
               } ?>
            
             </div> 


            <style>
               

            </style>



            <ul class="sigma_sermon-info mb-0">
              <li>
                <i class="far fa-user"></i>
                Message From
                <a href="#" class="ms-2"><u>
                    <?php
                    $id=$sermonkey["sermon_sender_id"];
                    $readsn=$crud->Read("users","id= $id ");
                    if($readsn){
                      $sender=$readsn[0]["name"];?>
                       <?php echo $sender ;} ?>
                  </u></a>
              </li>
              <li class="mt-0 ms-4">
                <i class="far fa-calendar-check"></i>
                <?php echo $sermonkey["added_date"] ; ?>
              </li>
            </ul>
            <ul class="sigma_sm square">
              <li>
                <a href="javascript:void()"> 
                  <i class="fas fa-music"></i>
                </a>
              </li>
              <li>
              
              <a href='<?php echo $sermonkey["sermonLink"] ; ?>' class="sigma_video-popup popup-youtube" > 
                  <i class="fab fa-youtube"></i>
                </a>
              </li>
              <!-- <li>
                <a href="#">
                  <i class="far fa-file-pdf"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fas fa-share-alt"></i>
                </a>
              </li> -->
            </ul>
          </div>
        </div>
      </div>

      <?php }}else{ ?>
          
      <h3 class="text-center">No  Details Available Right Now !</h3>

      <?php } ?>

    </div>

      </div>


      
         <?php    if($readsermon){ ?>      
        <!-- this is pagination buttons will genarate by javascript -->
        <div class="container text-center mt-0">
            <div id="pagination" class="pagination"></div>
          </div>

          <!-- here need to link paginationStyle.css to design pagination buttons -->
        <?php } ?>

  </div>
</div>




<!-- Services End -->
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
   <!-- pagintion script end -->



<?php include("include/footer.php") ?>