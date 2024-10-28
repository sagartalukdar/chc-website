<?php include("include/header.php"); ?>
<?php include("include/navigation-bar.php"); ?>

<link rel="stylesheet" href="assets\css\paginationStyle.css">
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

<!-- gallery css -->

<style>
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins',sans-serif;
  }
  .container{
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 16px;
  }
  #gallery{
    max-width: 100%;
    padding: 48px 0;
  }
  #gallery h3{
    font-size: 36px;
    font-weight: 600;
    text-align: center;
    margin-bottom: 36px;
    opacity: 0.6;
  }
  #gallery .images{
    display: grid;
    grid-template-columns: repeat(3,1fr);
    gap: 16px;
  }
  #gallery .images .img{
    border: 6px solid #e6e5e5;
    position: relative;
    overflow: hidden;
  }
  #gallery .images .img img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: blur(0);
    transition: .3s ease;
  }
  #gallery .images .img:hover img{
    filter: blur(2px);
    cursor: zoom-in;
  }
  #gallery .images .img p{
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    background: #fff;
    padding: 16px 0;
    text-align: center;
    transform: translateY(150%);
    transition: .3s ease;
  }
  #gallery .images .img:hover p{
    transform: translateY(0);
  }
</style>

<section id="gallery">
  <div class="container">
    <h3>CHC Image Gallery</h3>
    <div class="images" id="itemList">

      <?php
         $gallery=$crud->Read("gallery","1 order by `gallery_id` desc");
         if($gallery){
          foreach($gallery as $galleryImg){
      ?>

      <div class="img item">
          <img src="chc-admin/<?php echo $galleryImg['gallery_img']; ?>" alt="photo">
          <p><?php echo $galleryImg['img_title']; ?></p>
      </div>

      <?php
          }
         }else{
      ?>
        <h5 class="text-center">Gallery Empty Now !</h5>
        <div class="img">
          <img src="chc-admin/images/gallery/emptygallery.png" alt="photo">
          <p>image title</p>
        </div>
        <div class="img">
          <img src="chc-admin/images/gallery/emptygallery.png" alt="photo">
          <p>image title</p>
        </div>
        <div class="img">
          <img src="chc-admin/images/gallery/emptygallery.png" alt="photo">
          <p>image title</p>
        </div>
        <div class="img">
          <img src="chc-admin/images/gallery/emptygallery.png" alt="photo">
          <p>image title</p>
        </div>
        <div class="img">
          <img src="chc-admin/images/gallery/emptygallery.png" alt="photo">
          <p>image title</p>
        </div>
               
      <?php
         }
      ?>

    </div>
  </div>

    <div class="galleryModal">
      <span class="closeBtn"><i class="fas fa-times"></i></span>
      <div class="containerBox">
        <span class="left"><i class="fas fa-angle-left"></i></span>
        <div class="img-modal">
          <img src="" alt="photo">
        </div>
        <span class="right"><i class="fas fa-angle-right"></i></span>
      </div>
   
    </div>

</section>


 <!-- This is a necessary div for pagination  -->
          <!-- this is pagination buttons will genarate by javascript -->
          <?php
            if($gallery){
          ?>
           <div class="container text-center mt-0">
            <div id="pagination" class="pagination"></div>
          </div>
          <?php
            }
          ?>
         
          <!-- here need to link paginationStyle.css to design pagination buttons -->



<!-- gallery modal css -->
<style>
  .galleryModal{
   position: fixed;
   inset: 0;
   background: rgba(0,0,0,.5);
   align-items: center;
   display: none;
   z-index: 1000;
  }
  .galleryModal.show{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .galleryModal .containerBox{
    display: flex;
    align-items: center;
  }
  .galleryModal .img-modal{
    width: 676px;;
    height: 460px;
    margin: 0 24px;
  }
  .galleryModal .img-modal img{
    width: 100%;
    height: 100%;
    object-fit: contain;
  }
  .galleryModal span{
    cursor: pointer;
    font-size: 24px;
    color: #fff;
  }
  .galleryModal .closeBtn{
    position: absolute;
    top:24px;
    right: 24px;
    font-size: 36px;
    color: #fff;
  }

  @media screen and (max-width: 768px) {
    #gallery .images{
      display: grid;
      grid-template-columns: repeat(2,1fr);
      gap: 16px;
    }
    .galleryModal .img-modal{
    width: 476px;;
    height: 360px;
    margin: 0 24px;
    }
  }

  @media screen and (max-width: 576px) {
    #gallery .images{
      display: grid;
      grid-template-columns: repeat(1,1fr);
      gap: 16px;
    }
    .galleryModal .containerBox{
      position: relative;
    }
    .galleryModal span{
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
    }
    .galleryModal span.left{
      left: 24px;  
      background:rgb(163, 154, 154);
      padding: 5px 6px;
      border-radius: 45%;
    }
    .galleryModal span.right{
      right: 24px;    
      background:rgb(163, 154, 154);
      padding: 5px 6px;
      border-radius: 45%;  
    }
    .galleryModal .img-modal{
      width: 356px;;
      height: 260px;
      margin: 0 24px;
    }

  }

  @media screen and (max-width: 350px) {
    .galleryModal .img-modal{
      width: 256px;;
      height: 220px;
      margin: 0 24px;
    }
  }


</style>
<script>
   const left=document.querySelector('.galleryModal span.left');
   const right=document.querySelector('.galleryModal span.right');
   const modalImg=document.querySelector('.galleryModal .img-modal img');
   const modal=document.querySelector('.galleryModal');
   const close=document.querySelector('.closeBtn');

   const allImg=document.querySelectorAll('#gallery .images .img img');

   let iterator=0;
   for(let i=0;i<allImg.length;i++){
      allImg[i].addEventListener('click',function(){
        const urlImg=this.getAttribute('src');
        // alert(urlImg);
        modal.classList.add('show');
        modalImg.setAttribute('src',urlImg);
        iterator=i;
   });
   
   }

   left.addEventListener('click',function(){
        iterator===0?iterator=allImg.length-1:iterator-=1;
        const urlImg=allImg[iterator].getAttribute('src');
        modalImg.setAttribute('src',urlImg);
   });
   right.addEventListener('click',function(){
    iterator===allImg.length-1?iterator=0:iterator+=1;
    const urlImg=allImg[iterator].getAttribute('src');
    modalImg.setAttribute('src',urlImg);
   });

   close.addEventListener('click',function(){
    modal.classList.remove('show');
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
var itemsPerPage = 10;  // Change this to set the number of items per page
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