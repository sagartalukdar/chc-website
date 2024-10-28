<?php include("include/header.php"); ?>
<?php include("include/navigation-bar.php"); ?>


<style>
  .card{
    margin-bottom: 122px;
  }
  .sigma_recent-post{
    height: 110px;
    /* border: 2px solid red; */
    /* padding: 12px; */
  }
  .speaker-image{
    height:100%
   
  }

  .speaker-image > img {
    height:100%;
    width: 113px;
  }

   /* @media screen and (max-width: 370px) {
    .sigma_recent-post{
    display: flex;
    flex-direction: column;
    gap: 12px;
   
  }
} */
</style>

   <!-- partial:partia/__subheader.html -->
 <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(assets/img/subheader.jpg);opacity:0.7;">

<div class="container" style="opacity:1;">
  <div class="sigma_subheader-inner">
    <div class="sigma_subheader-text">
      <h1>Events Details</h1>
      <p class="blockquote light"> We are a church that belives in Jesus christ and the followers . </p>
    </div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="btn-link" href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Events</li>
      </ol>
    </nav>
  </div>
</div>

</div>
<!-- partial -->

  <?php 
    if(isset($_GET["eid"])){
      $event_id=$_GET["eid"];
    }
  ?>
  <!-- Post Content Start -->
  <div class="section sigma_post-single">
    <div class="container">

      <div class="row">

        <div class="col-lg-8">
          <div class="post-detail-wrapper">

            <div class="entry-content">
              <?php
                $curr_event=$crud->Read("events","`events_id`=$event_id");
                if($curr_event){
                  $present_event=$curr_event[0];
                }
              ?>
              <!-- event-details.php?eid=<?php echo $present_event["events_id"] ; ?>  -->
              <a href="chc-admin/<?php echo $present_event["event_img"] ;?>" class="gallery-thumb" >
                <img src="chc-admin/<?php echo $present_event["event_img"] ;?>" alt="post" style="width:850px;height:520px;">
                <div class="sigma_event-timer">
                  <div class="sigma_event-date">
                    <?php 
                      $date=$present_event["events_date"];
                      $day=date("d",strtotime($date));
                      $month=date("M",strtotime($date));
                      $year=date("Y",strtotime($date));
                    ?>
                    <span><?php echo $day; ?></span>
                    <?php  echo $month." ".$year ;?>
                   
                  </div>

                  <ul id="countdown-timer" class="sigma_countdown-timer">
                     <!-- countdown timer -->
                  </ul>

                </div>
             
              </a>
              <h4><?php echo $present_event["events_title"] ; ?></h4>
              <div class="sigma_post-meta">
                <a href="javascript:void();"> <i class="far fa-clock"></i> 
                   <?php
                     $date=$present_event["events_date"];
                     $d=date("l",strtotime($date));
                     $starttime=$present_event["event_start_time"];
                     $endtime=$present_event["event_end_time"];
                     echo $d ."(" .$starttime." - ".$endtime .")";
                   ?>
                </a>
                <a href="javascript:void();"> <i class="far fa-map-marker-alt"></i><?php echo $present_event["event_location"] ; ?></a>
              </div>
              <p>
                <?php echo $present_event["events_desc"]; ?>
              </p>
              <hr>

              
             
              <div class="row align-items-center">
                <div class="col-lg-6">
                  <ul class="sigma_list sigma_list-2">
                    <li>Community potluck: fellowship shared.</li>
                    <li>Youth group: learning, growing together </li>
                    <li>Prayer circle: strength in unity.</li>
                    <li>love in action.</li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <div class="event-venue-map">
                        
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3581.9127336774486!2d91.80433587533349!3d26.13438819310521!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375a58d965a27aa3%3A0xcf1c8444e4c93f26!2sCity%20Harvest%20Church%2C%20Guwahati!5e0!3m2!1sen!2sin!4v1707734578898!5m2!1sen!2sin" style="border:0; width: 100%; height: 200px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                      
                  </div>
                </div>
              </div>
          
            </div>

          

            <!-- Post Pagination Start -->
            <div class="section">

            </div>
            <!-- Post Pagination End -->

          

          </div>
        </div>

        <!-- Sidebar Start -->
        <div class="col-lg-4">
          <div class="sidebar">

            <!-- About Author Start -->
            <div class="sidebar-widget event-info">
              <h5 class="widget-title"> Information </h5>
              <ul class="sidebar-widget-list">
                <li><span>Date:</span> <?php echo $present_event["events_date"] ?></li>
                <li><span>Time:</span> (<?php  echo $present_event["event_start_time"]?> - <?php  echo $present_event["event_end_time"]?> )</li>
                <!-- <li><span>Event Category:</span> Church</li> -->
                <li><span>Location:</span> <p style="color: rgb(0, 0, 0); font-weight: 700;"><?php echo $present_event['event_location']?></p> </li>
                <li><span>Phone:</span>  <a href="tel:+91 7086159073">+91 7086159073</a>
                 
                </li>
                <li><span>Email:</span><a href = "mailto:info@example.com"> info@example.com </a></li>
              </ul>


            </div>
            <!-- About Author End -->

            <!-- Popular Feed Start -->
            <div class="sidebar-widget widget-recent-posts widget widget-speakers">
              <h5 class="widget-title">Speakers</h5>
              <div class="accordion" id="generalFAQExample">

             



              <?php $readSpeakers = $crud->Read("event_spekers"," events_id = $event_id order by 'start_time'");
                    if ($readSpeakers) {
                        $n=0;
                        foreach($readSpeakers as $readKey){ ?>


                <div class="card">
                  <div class="card-header" data-bs-toggle="collapse" role="button" data-bs-target="#general<?php echo $n ?>" aria-expanded="true" aria-controls="general<?php echo $n ?>">
                    <article class="sigma_recent-post">
                    <div class="speaker-image">

                     <?php
                      if($readKey['img']==null || $readKey['img']==""){ ?>

                        <img src=" chc-admin/images/speakers/unknow user.jpg"/>
                     <?php }else { ?>
                        <img src="chc-admin/<?php echo $readKey['img']; ?>"/>
                     <?php } ?>
                     
                   </div>
                      <div class="sigma_recent-post-body">
                        <h6> <?php echo $readKey['name']; ?></h6>
                        <p class="m-0"> <?php echo $readKey["start_time"]; ?> to  <?php echo $readKey["end_time"]; ?>  </p>
                      </div>
                    </article>
                  </div>
                  <div id="general<?php echo $n ?>" class="collapse <?php if($n==0){ ?> show <?php }?>" data-bs-parent="#generalFAQExample">
                    <div class="card-body"> <?php echo $readKey["info"];  ?></div>
                  </div>
                </div>

                <?php 
                $n++;
               }} else {   ?>

               <h6 style="color: #808080;">Currently No Speaker Present For This event</h6>


             <?php  }
                
                
                ?>


              </div>

            </div>






        





            <!-- Popular Feed End -->

            <!-- Categories Start -->
            <div class="sidebar-widget widget-upcoming-events" style=" max-height:400px; overflow-y: scroll">
              <h5 class="widget-title"> Upcoming Events </h5>
              <ul >
 
              <?php 
             //  $today = date("Y-m-d"); // Format today's date as YYYY-MM-DD
                  $upcoming_event=$crud->Read("events", "`events_date` > CURDATE() ORDER BY events_id DESC limit 4");
                  if($upcoming_event){
                    foreach($upcoming_event as $upe){
                    
                      $date=$upe["events_date"];
                      $day1=date("D",strtotime($date));
                      $day=date("d",strtotime($date));
                      $month=date("M",strtotime($date));
                      $year=date("Y",strtotime($date));
                    ?>
                      
                      <li>
                        <div class="date">
                          <span style="font-size: large;"><?php echo $day ?></span>
                         <p style="font-size: medium;"> <?php echo  $month." ".$year ?> </p>
                        </div>
                        <div class="event-name">
                          <h6><?php echo $upe['events_title'] ?></h6>
                          <p><?php echo $day1."  | : ".$upe['event_start_time'] ?> </p>
                        </div>
                      </li>
                 <?php 
                     } } else { ?>

                    <h6 style="color: #808080;">No upcoming events are scheduled.</h6>

                    <?php }

                ?>

                
               
              </ul>


              <div class="text-center">
                 <!-- javascript load data from fetch_more_events.php using Fetch api  -->
                <button class="load-more-btn sigma_btn-custom mt-4">See All</button>
              </div>



            </div>
            <!-- Categories End -->

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

          </div>
        </div>
        <!-- Sidebar End -->

      </div>

    </div>
  </div>
  <!-- Post Content End -->

     <!-- countdown timer -->
       <script>
          // Event date and time
          var eventDateTime = new Date('<?php echo $present_event["events_date"] . ' ' . $present_event["event_start_time"]; ?>').getTime();
      
          // Update countdown timer every second
          var countdownInterval = setInterval(() => {
              var currentDate = new Date().getTime();
              var diff = eventDateTime - currentDate;
      
              if (diff > 0) {
                  // Calculate remaining time
                  var days = Math.floor(diff / (1000 * 60 * 60 * 24));
                  var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                  var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                  var seconds = Math.floor((diff % (1000 * 60)) / 1000);
      
                  // Display remaining time
                  document.getElementById('countdown-timer').innerHTML = `
                      <li><h5 class="days">${days}</h5><span>Days</span></li>
                      <li><h5 class="hours">${hours}</h5><span>Hours</span></li>
                      <li><h5 class="minutes">${minutes}</h5><span>Minutes</span></li>
                      <li><h5 class="seconds">${seconds}</h5><span>Seconds</span></li>
                  `;
              } else {
                  // Display message if event has already occurred
                  clearInterval(countdownInterval);
                  document.getElementById('countdown-timer').innerHTML = `
                      <p style="color:white;">The event has already occurred.</p>
                  `;
              }
          },);
      </script>
    <!-- countdown timer -->


    <!-- script for see more upcoming events  -->

   


    <script>
     
     let offset = 4; // Number of events already displayed
      const limit = 4; // Number of events to fetch per request

    async function loadMoreEvents() {
         try {
        const response = await fetch(`fetch_more_upcoming_events.php?offset=${offset}&limit=${limit}`);
        
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const data = await response.json();

        if (data.length > 0) {
            let eventsList = document.querySelector('.widget-upcoming-events ul');
            
            data.forEach(event => {
                let date = new Date(event.events_date);
                let day1 = date.toLocaleString('en-US', { weekday: 'short' });
                let day = date.getDate();
                let month = date.toLocaleString('en-US', { month: 'short' });
                let year = date.getFullYear();
                
                let eventHtml = `
                    <li>
                        <div class="date">
                            <span style="font-size: large;">${day}</span>
                            <p style="font-size: medium;">${month} ${year}</p>
                        </div>
                        <div class="event-name">
                            <h6>${event.events_title}</h6>
                            <p>${day1} | : ${event.event_start_time}</p>
                        </div>
                    </li>
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


    </script>
    
    

     <!-- script for see more upcoming events  -->



  <?php include("include/footer.php") ?>





















