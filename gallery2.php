<?php include("include/header.php"); ?>
<?php include("include/navigation-bar.php"); ?>

<!-- partial:partia/__subheader.html -->
<div class="sigma_subheader dark-overlay dark-overlay-2"
  style="background-image: url(assets/img/subheader.jpg);opacity:0.7;">

  <div class="container" style="opacity:1;">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Gallery</h1>
        <p class="blockquote light"> We are a church that belives in Jesus christ and the followers . </p>
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



  <!-- This is a necessary div for pagination  -->
  <div id="itemList">
    <div class="imcontainer">
      <h2 style="color:#bf9b7b;">from the gallery</h2>
      <div class="gallery">
        <?php 
        $readgallery=$crud->Read("gallery","1 order by `gallery_id` desc");
        if($readgallery){
          foreach($readgallery as $gallerykey){
        
        ?>
        <div class="card-body item">
          <a href="chc-admin/<?php echo $gallerykey["gallery_img"];?>" data-lightbox="models" data-title="<?php echo $gallerykey["img_title"];?>">
            <img alt="" src="chc-admin/<?php echo $gallerykey["gallery_img"];?>" style="height:250px;width:300px;"/>
          </a>

        
          <h6 class="card-title mt-3" style="min-height: 150px; ">
            <?php $title= $gallerykey["img_title"];
            if(strlen($title)>80){
              echo substr($title,0,80).'...';
            }else{
              echo $title;
            }
            ?>
          </h6>

          <?php
            $poster_id=$gallerykey["img_posted_user_id"];
            $poster=$crud->Read("users","`id`=$poster_id");
            if($poster){
          ?>
          
          <p class="card-text" style="background: rgb(243, 243, 243);padding: 10px;border-radius: 9px; min-height: 150px;">
            <?php 
            $desc=$gallerykey['img_desc'] ;
            if(strlen($desc)>80){
              echo substr($desc,0,80).'...';
            }else{
              echo $desc;
            }
            ?>
          </p>
          <i class="text-center"><?php echo $gallerykey["added_date"] ; ?></i>
          <?php
            }
          ?>
          
        </div>

        <?php     
          }
        }else{?>
            <h4 >Nothing present right now !</h2>
        <?php
        }
        ?>


      </div>

            
    </div>
  </div>


  <style>

.gallery .card-body {
  width: 300px;
}

    @media screen and (max-width: 330px) {
      .gallery .card-body {
     width: 230px;
     /* background-color: red; */
   }
  }
  </style>




          <!-- this is pagination buttons will genarate by javascript -->
          <div class="container text-center mt-0">
            <div id="pagination" class="pagination"></div>
          </div>

          <!-- here need to link paginationStyle.css to design pagination buttons -->










<style>
   .imcontainer{
    width: 100%;
    min-height: 30vh;
    /* display: flex; */
    align-items: center;
    justify-content: center;
    padding: 50px 8%;
   }
   .gallery{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px,1fr));
    gap: 20px;
    padding: 20px 0px;
   }
   .gallery img{
    width: 100%;
    border-radius: 20px;
   }
   .gallery img:hover{
     box-shadow: 12px 13px 25px wheat;
     border-radius: 15px 0px 15px 0px;
    }
</style>











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