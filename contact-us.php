<?php include("include/header.php"); ?>
<?php include("include/navigation-bar.php"); ?>

 <!-- partial:partia/__subheader.html -->
 <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(assets/img/subheader.jpg);opacity:0.7;">

<div class="container" style="opacity:1;">
  <div class="sigma_subheader-inner">
    <div class="sigma_subheader-text">
      <h1>Contact Us</h1>
      <p class="blockquote light"> We are a church that belives in Jesus christ and the followers .</p>
    </div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="btn-link" href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Connection</li>
      </ol>
    </nav>
  </div>
</div>

</div>
<!-- partial -->

  <!-- Map Start -->
  <div class="sigma_map container my-3">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3581.9128806958543!2d91.8069108!3d26.134383399999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375a58d965a27aa3%3A0xcf1c8444e4c93f26!2sCity%20Harvest%20Church%2C%20Guwahati!5e0!3m2!1sen!2sin!4v1707118255041!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
  <!-- Map End -->

  <!-- Contact form Start -->
  <div class="section mt-negative pt-0">
    <div class="container">

      <form class="sigma_box box-lg m-0" action="">
        <div class="row">
          <div class="col-lg-4">
            <div class="form-group">
              <i class="far fa-user"></i>
              <input type="text" placeholder="Full Name" class="form-control dark" name="fname" id = "fname">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <i class="far fa-envelope"></i>
              <input type="email" placeholder="Email Address" class="form-control dark" name="email" id="email">
              <span id="validIcon" ></span>      
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <i class="far fa-pencil"></i>
              <input type="text" placeholder="Subject" class="form-control dark" name="subject" id="subject">
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="message" id="message" placeholder="Enter Message" cols="45" rows="5" class="form-control dark"></textarea>
        </div>
        <div class="text-center">

          
          <div style="color: rgb(130, 182, 52); display: none;" class="fw-bold" id="subscribed">
            <span><i class="fa-solid fa-circle-check"></i></span> Mail Sent Successfull.
          </div>


          <div style="color: rgb(231, 90, 25); display: none;" class="fw-bold" id="subscribederror">
            <span><i class="fa-solid fa-circle-xmark"></i></span> Error occurred while sending mail.
          </div>


          <p id="formErrorMessage" style="color: red" ></p>
          <button type="submit" id="submit" class="sigma_btn-custom" name="button">Send Mail</button>
        </div>
      </form>

    </div>
  </div>
  <!-- Contact form End -->

  <!-- Icons Start -->
  <div class="section section-padding pt-0">
    <div class="container container-fluid">
      <div class="row"  >

        <div class="col-lg-4">
          <div class="sigma_icon-block text-center light icon-block-7" style="padding: 1px;">
            <i class="flaticon-email"></i>
            <div class="sigma_icon-block-content" style="height:180px;">
            <a href="mailto:info@example.com">  
             <span>Send Email <i class="far fa-arrow-right"></i> </span> </a>
              <h5> Email Address</h5>
              <p>info@example.com</p>
              <p>CHC email@support.com</p>
            </div>
            <div class="icon-wrapper">
              <i class="flaticon-email"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="sigma_icon-block text-center light icon-block-7" style="padding: 1px;">
            <i class="flaticon-telephone"></i>
            <div class="sigma_icon-block-content" style="height:180px;">
            <a href="tel:70028 98508" >
               <span>Call Us Now <i class="far fa-arrow-right"></i> </span></a>
              <h5> Phone Number </h5>
              <p> +91 7086159073 </p>
              <p> +91 70028 98508</p>
            </div>
            <div class="icon-wrapper">
              <i class="flaticon-telephone"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="sigma_icon-block text-center light icon-block-7" style="padding: 1px;">
            <i class="flaticon-paper-plane"></i>
            <div class="sigma_icon-block-content" style="height:180px;">
              <a href="https://maps.app.goo.gl/ZzHzUzVk3GjLQzab7" target="_blank">
              <span>Find Us Here <i class="far fa-arrow-right"></i> </span>
              </a>
              <h5> Location </h5>
              <p>2nd Floor, Dutta Complex
                Research Gate, Khanapara 
                G.S. Road, Opp. Vivanta.</p>
              <p> Guwahati, Assam 781036</p>
            </div>
            <div class="icon-wrapper">
              <i class="flaticon-paper-plane"></i>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Icons End -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<!-- Include SweetAlert JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>



  <script>



$('#submit').on('click', function(event) {
    // Preventing form submission
      event.preventDefault();
      

      var fname = $("#fname").val();
        var email = $("#email").val();
        var message = $("#message").val();
        var subject = $("#subject").val();


          var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Regular expression for email validation
          if (emailRegex.test(email)) {
            $("#validIcon").html(`<i class="fa-duotone fa-check fa-xl" style="--fa-secondary-color: #09c31f;"></i>`);

            $("#email").css("outline", "none");


        if (fname === "" || fname === "" || email === "" || email === "" || message === "" || message === "" || subject === "" || subject === "" ) {
            $("#formErrorMessage").html("Fill all the details to continue...");
           
            $("#add-job").prop("disabled", true);
            return false;
        } else {
         
            $("#formErrorMessage").html("");
         

            var formData = new FormData();
            formData.append('fname', fname);
            formData.append('email', email);
            formData.append('message', message);
            formData.append('subject', subject);
            

         
            $.ajax({
                type: "post",
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                url: "chc-admin/xhr/contact-chc.php",
               
                data: formData,
                success: function (response) {
                
                    if (response.status==='success') {
                      $("#subscribed").css("display", "block");
                    console.log("success1");
               

                    $("#subscribe_email").text("");
                    setTimeout(function() {
                        $("#subscribed").css("display", "none");
                    }, 5000); // 5000 milliseconds delay
                   
                  } else {
                    $("#subscribederror").css("display", "block");
                    console.log("success3");
                  

                    setTimeout(function() {
                        $("#subscribederror").css("display", "none");
                    }, 5000); // 5000 milliseconds delay
                    }
                },
                error: function (response) {
                  // $("#subscribed").css("display", "block");
                  //   console.log("success1");
               

                  //   $("#subscribe_email").text("");
                  //   setTimeout(function() {
                  //       $("#subscribed").css("display", "none");
                  //   }, 5000); // 5000 milliseconds delay


                  $("#subscribederror").css("display", "block");
                    console.log("success3");
                  

                    setTimeout(function() {
                        $("#subscribederror").css("display", "none");
                    }, 5000); // 5000 milliseconds delay

                    
                },
                beforeSend: function () {
                    
                    $("#submit").prop("disabled", true);
                },
                complete: function () {
                    
                    $("#submit").prop("disabled", false);
                }
            });
        }




        } else {
            $("#validIcon").html(`<i class="fa-solid fa-triangle-exclamation fa-xl" style="color: #d74b0f;"></i>`);  $("#email").css("outline", "2px solid red");

            $("#email").css("outline", "2px solid red");
            event.preventDefault();
           
        }

       
    });

  </script>


  <?php include("include/footer.php") ?>
