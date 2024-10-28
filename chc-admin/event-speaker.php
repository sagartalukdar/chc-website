<?php include("includes/header.php"); ?>
<!-- Bootstrap Select Css -->
<link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<!-- Sweetalert Css -->
<link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
<!-- <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"> -->


<style>
    #add-user-dummy , #add-speaker-dummy{
        display: none;
    }
</style>
<style>
    .bootstrap-timepicker {
        position: relative;
    }

    .bootstrap-timepicker.pull-right .bootstrap-timepicker-widget.dropdown-menu {
        left: auto;
        right: 0;
    }

    .bootstrap-timepicker.pull-right .bootstrap-timepicker-widget.dropdown-menu:before {
        left: auto;
        right: 12px;
    }

    .bootstrap-timepicker.pull-right .bootstrap-timepicker-widget.dropdown-menu:after {
        left: auto;
        right: 13px;
    }

    .bootstrap-timepicker .input-group-addon {
        cursor: pointer;
    }

    .bootstrap-timepicker .input-group-addon i {
        display: inline-block;
        width: 16px;
        height: 16px;
    }

    .bootstrap-timepicker-widget.dropdown-menu {
        padding: 4px;
    }

    .bootstrap-timepicker-widget.dropdown-menu.open {
        display: inline-block;
    }

    .bootstrap-timepicker-widget.dropdown-menu:before {
        border-bottom: 7px solid rgba(0, 0, 0, 0.2);
        border-left: 7px solid transparent;
        border-right: 7px solid transparent;
        content: "";
        display: inline-block;
        position: absolute;
    }

    .bootstrap-timepicker-widget.dropdown-menu:after {
        border-bottom: 6px solid #FFFFFF;
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        content: "";
        display: inline-block;
        position: absolute;
    }

    .bootstrap-timepicker-widget.timepicker-orient-left:before {
        left: 6px;
    }

    .bootstrap-timepicker-widget.timepicker-orient-left:after {
        left: 7px;
    }

    .bootstrap-timepicker-widget.timepicker-orient-right:before {
        right: 6px;
    }

    .bootstrap-timepicker-widget.timepicker-orient-right:after {
        right: 7px;
    }

    .bootstrap-timepicker-widget.timepicker-orient-top:before {
        top: -7px;
    }

    .bootstrap-timepicker-widget.timepicker-orient-top:after {
        top: -6px;
    }

    .bootstrap-timepicker-widget.timepicker-orient-bottom:before {
        bottom: -7px;
        border-bottom: 0;
        border-top: 7px solid #999;
    }

    .bootstrap-timepicker-widget.timepicker-orient-bottom:after {
        bottom: -6px;
        border-bottom: 0;
        border-top: 6px solid #ffffff;
    }

    .bootstrap-timepicker-widget table {
        width: 100%;
        margin: 0;
    }

    .bootstrap-timepicker-widget table td {
        text-align: center;
        height: 30px;
        margin: 0;
        padding: 2px;
    }

    .bootstrap-timepicker-widget table td:not(.separator) {
        min-width: 30px;
    }

    .bootstrap-timepicker-widget table td span {
        width: 100%;
    }

    .bootstrap-timepicker-widget table td a {
        border: 1px transparent solid;
        width: 100%;
        display: inline-block;
        margin: 0;
        padding: 8px 0;
        outline: 0;
        color: #333;
    }

    .bootstrap-timepicker-widget table td a:hover {
        text-decoration: none;
        background-color: #eee;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        border-color: #ddd;
    }

    .bootstrap-timepicker-widget table td a i {
        margin-top: 2px;
        font-size: 18px;
    }

    .bootstrap-timepicker-widget table td input {
        width: 25px;
        margin: 0;
        text-align: center;
        border: none
    }

    .bootstrap-timepicker-widget .modal-content {
        padding: 4px;
    }

    @media (min-width: 767px) {
        .bootstrap-timepicker-widget.modal {
            width: 200px;
            margin-left: -100px;
        }
    }

    @media (max-width: 767px) {
        .bootstrap-timepicker {
            width: 100%;
        }

        .bootstrap-timepicker .dropdown-menu {
            width: 100%;
        }
    }
</style>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Top Bar -->
    <?php include("includes/navbar.php"); ?>
    <!-- #Top Bar -->
    <?php include ("includes/sidebar.php"); ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>SPEAKER MANAGEMENT</h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="header ">
                            <h2>
                                SPEAKER DETAILS
                            </h2>
                           
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                    <tr>
                                            <th>Sl. No.</th>
                                            <th>Full Name</th>
                                            <th> Speaker Info</th>
                                            <th>Speaker Image</th>
                                            <th>Event Name</th>
                                            <th>Time Duration</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Full Name</th>
                                            <th> Speaker Info</th>
                                            <th>Speaker Image</th>
                                            <th>Event Name</th>
                                            <th>Time Duration</th>
                                           

                                            <th>Action</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        <?php $readEvents = $crud->Read('event_spekers',"1 order by `id` desc");
                                        if ($readEvents) {
                                            $n=0;
                                            foreach($readEvents as $readKey){
                                                $eventId =   $readKey['events_id']; 
                                              ?>
                                      
                                        <tr>
                                            <td>
                                                <?php echo ++$n; ?>
                                            </td>
                                            <td>
                                                <p>  <?php echo $readKey['name']; ?> </p>
                                               
                                            </td>
                                            <td>
                                                <p><?php echo $readKey['info']; ?></p>
                                            </td>

                                            <td><img src="<?php echo $readKey['img']; ?>" width="100px"
                                                height="100px"></td>

                                            <?php
                                               
                                               $readmeve=$crud->Read("events"," events_id = $eventId");
                                                   if($readmeve){ ?> 
                                                   <td> <?php echo $readmeve[0]["events_title"];  ?>
                                                        <p style="color: #999; font-size: small; font-weight: 600;">(<?php echo $readmeve[0]['events_date']; ?>)</p> 
                                                   </td>
                                                        
                                                 <?php  }
                                               ?>
                                          

                                            <td>
                                                <?php echo $readKey['start_time']; ?> To  <?php echo $readKey['end_time']; ?>
                                            </td>

                                          

                                            <td><button id="edit-speaker" data-toggle="modal" data-target="#editSpeakerModal"
                                                    data-id="<?php echo $readKey['id']; ?>" type="button"
                                                    class="btn btn-danger waves-effect edit-speaker">EDIT
                                                </button></td>
                                        </tr>
                                        <?php }
                                        } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
   
    <!--EDIT Event MODAL -->
    <div class="modal fade" id="editSpeakerModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Edit Speaker Details</h4>
                </div>
                <form method="post"  action="">
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="sname">Speaker Name</label>
                                        <input type="text" name="esname" id="esname" class="form-control"
                                            placeholder="Enter Full Name" autofocus="false" required />
                                    </div>
                                </div>
                                <!--                                 
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="sdesc" id="sdesc" class="form-control"
                                            placeholder="Sermon Description" required />
                                    </div>
                                </div> -->

                                <!-- Sermon Description Textarea start -->
                                <div class="form-floating " style="margin-bottom: 20px;">
                                    <label for="floatingTextarea2">Speaker Info</label>
                                    <textarea class="form-control" name="esdesc" id="esdesc"
                                        placeholder="Speaker Info Here" style="height: 100px" required></textarea>
                                </div>
                                <!-- Sermon Description Textarea end -->

                               


                                <div class="row">
                                     <h4 style="margin-left: 12px;">Time Duration</h4>
                                    <div class="col-xs-6">
                                        <label>Start time</label>
                                        <div class="input-group bootstrap-timepicker"
                                            style="box-shadow: 0px 0px 5px gray; border-radius: 6px; padding: 5px;">
                                            <input type="text" class="form-control input-small" name="startTime"
                                                id="startTime">
                                            <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-time"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <label>End time</label>
                                        <div class="input-group bootstrap-timepicker"
                                            style="box-shadow: 0px 0px 5px gray; border-radius: 6px; padding: 5px;">
                                            <input type="text" class="form-control input-small" name="endTime"
                                                id="endTime">
                                            <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-time"></i></span>
                                        </div>
                                    </div>
                                </div>

                               




                               

                                <!-- <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><b>Choose Speaker image</b></p>
                                            <input type="file" class="form-control" name="image" accept="image/*"
                                                id="upload-speaker-button" required />
                                        </div> 
                                        <div class="col-md-8">
                                            <figure class="image-container">
                                                <img id="chosen-speaker-image" class="image-style" >
                                            </figure>
                                        </div>
                                    </div>

                                    <input type="hidden" name="" id="eveId">

                                </div> -->
                            </div>

                        </div>
                    </div>
                




               
                <div class="modal-footer ">
                    <p id="formErrorMessage2" style="color:red"></p>
                        <!-- use ajax to add user: xhr/add-user -->
                        <input type="hidden" id="edit_speaker_id" />
                        <input type="button" id="updateSpeaker" class="btn btn-success waves-effect"
                        value="Update Speaker">
                        <input type="button" id="delete-speaker" class="btn btn-danger waves-effect"
                            value="Delete Speaker">
                    </div>
                  
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-warning waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>

            </form>
        </div>
    </div>
    </div>
    <!-- EDIT Event MODAL END -->

   




        





        
     

     




    <?php include ('includes/footer.php'); ?>

    <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>
    <!-- Bootstrap Notify Plugin Js -->
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <!-- <script src="js/pages/ui/notifications.js"></script> -->

    <!-- Demo Js -->
    <script src="js/demo.js"></script>

   
    <script>
     
        $(function () {
            $('.edit-speaker').on('click', function () {
                var speakerId = $(this).data('id');
                console.log(speakerId);

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "xhr/edit-speaker.php",
                    data: { speakerId: speakerId },
                    success: function (response) {
                        // edit_etitle  edit_edesc  edit_Date  edit_startTime  edit_endTime edit_e_location
                        //  eventId eventTitle eventDescription eventDate eventStartTime eventEndTime eventLocation
                        $("#esname").val(response.name);
                        $("#esdesc").val(response.info);
                       
                        $("#startTime").val(response.startTime);
                        $("#endTime").val(response.endTime);
                       
                        $("#edit_speaker_id").val(response.spid);
                        //  $("#edit_user_id").val(response.user_id);

                        //  $("div.selectStatus select").val(response.status).change();

                        //  console.log(response.status);
                    },
                    error: function (error) {
                        swal("Error!", "Something went wrong", "error");

                    }
                });
            });
        });


        $(function () {
             // edit_etitle  edit_edesc  edit_Date  edit_startTime  edit_endTime edit_e_location
              //  eventId eventTitle eventDescription eventDate eventStartTime eventEndTime 
            $('#updateSpeaker').on('click', function () {
                var speakerName = $("#esname").val();
                var speakerInfo = $("#esdesc").val();
                var startTime = $("#startTime").val();
                var endTime = $("#endTime").val();
                var eventSpeakerId = $("#edit_speaker_id").val();
              
                var formData = new FormData();
                formData.append('name', speakerName);
                formData.append('info', speakerInfo);
                formData.append('start_time', startTime);
                formData.append('end_time', endTime);
                formData.append('id', eventSpeakerId);
                
                if (speakerName === "" || speakerName === null || speakerInfo === "" || speakerInfo === null || startTime === "" || startTime === null  || endTime === "" || endTime === null || eventSpeakerId === "" || eventSpeakerId === null ) {
                    $("#formErrorMessage2").html("Fill all the details to continue...");
                    $('#updateSpeaker').preventDefault();
                } else {
                  
                    $("#formErrorMessage2").html("");
                   
                    $.ajax({
                        type: "POST",
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",
                        url: "xhr/update-speaker.php",
                        data: formData,
                        success: function (response) {
                            if (response.successMessage) {
                                // showSuccessMessage ();
                                swal("Success!", response.successMessage + " Reloading", "success");

                                setTimeout(function () {
                                    window.location.reload();
                                }, 3000);

                            } else if (response.errorMessage) {
                                swal("Error!", response.errorMessage, "error");
                            }

                        },
                        error: function (error) {
                            swal("Error!", "Something went wrong", "error");

                        }
                    });
                    // }

                }

            });
        });

        $(function () {
            $('#delete-speaker').on('click', function () {

                var speakerId = $("#edit_speaker_id").val();
                var formData = new FormData();
                formData.append('speakerId', speakerId);
                if (confirm('Are you sure you want to delete this Speaker?')) {
                    $.ajax({
                        type: "POST",
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",
                        url: "xhr/delete-speaker.php",
                        data: formData,
                        success: function (response) {
                            if (response.successMessage) {
                                // showSuccessMessage ();
                                swal("Success!", response.successMessage + " Reloading", "success");

                                setTimeout(function () {
                                    window.location.reload();
                                }, 3000);

                            } else if (response.errorMessage) {
                                swal("Error!", response.errorMessage, "error");
                            }

                        },
                        error: function (error) {
                            swal("Error!", "Something went wrong", "error");

                        }
                    });
                } else {
                    alert('Speaker deletion aborted.');
                }



            });
        });

    </script>



    <script src="http://jdewit.github.io/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
    <script>
        $('.bootstrap-timepicker > input').timepicker({ minuteStep: 1 });


    </script>


</body>

</html>