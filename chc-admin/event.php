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
                <h2>EVENTS MANAGEMENT</h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a class="btn btn-primary" href="javascript:void(0);" data-toggle="modal"
                                data-target="#defaultModal">Add Event</a>
                        </div>
                        <div class="header ">
                            <h2>
                                EVENTS DETAILS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right js-sweetalert">
                                        <li><a href="javascript:void(0);" data-toggle="modal"
                                                data-target="#defaultModal">Add Event</a></li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Title</th>
                                            <th> Description</th>
                                            <th>Date</th>
                                            <th>Add Speaker</th>
                                            <th>Staring Time</th>
                                            <th>Ending Time</th>
                                            <th>Event Image</th>
                                            <th>Location</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Title</th>
                                            <th> Description</th>
                                            <th>Date</th>
                                            <th>Add Speaker</th>
                                            <th>Staring Time</th>
                                            <th>Ending Time</th>
                                            <th>Event Image</th>
                                            <th>Location</th>

                                            <th>Action</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        <?php $readEvents = $crud->Read('events',"1 order by `events_id` desc");
                                        if ($readEvents) {
                                            $n=0;
                                            foreach($readEvents as $readKey){
                                              ?>
                                        <!-- 
                                            Full texts
                                            events_id
                                            events_title
                                            events_desc
                                            events_date
                                            event_start_time
                                            event_end_time
                                            event_location
                                            event_img-->
                                        <tr>
                                            <td>
                                                <?php echo ++$n; ?>
                                            </td>
                                            <td>
                                                <p style="width: 120px;">  <?php echo $readKey['events_title']; ?> </p>
                                            </td>
                                            <td>
                                                <p style="width: 250px;"><?php echo $readKey['events_desc']; ?></p>
                                            </td>
                                            <td>
                                                <?php echo $readKey['events_date']; ?>
                                            </td>

                                            <td><button id="add-speaker-modal" data-toggle="modal" data-target="#speakerModal"
                                                data-id="<?php echo $readKey['events_id']; ?>" type="button"
                                                class="btn btn-info waves-effect add-speaker-modal">Add Speaker
                                            </button></td>

                                            <td>
                                                <?php echo $readKey['event_start_time']; ?>
                                            </td>
                                            <td>
                                                <?php echo $readKey['event_end_time']; ?>
                                            </td>
                                            <td><img src="<?php echo $readKey['event_img']; ?>" width="100px"
                                                    height="100px"></td>
                                            <td>
                                                <?php echo $readKey['event_location']; ?>
                                            </td>

                                            <td><button id="edit-user" data-toggle="modal" data-target="#editModal"
                                                    data-id="<?php echo $readKey['events_id']; ?>" type="button"
                                                    class="btn btn-danger waves-effect edit-user">EDIT
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



    







    <!--ADD EVENT MODAL -->


    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Add Event</h4>
                </div>
                <form method="post" enctype="multipart/form-data" action="">
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="etitle" id="etitle" class="form-control"
                                            placeholder="Event Title" autofocus="false" required />
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
                                    <label for="floatingTextarea2">Event Descprition</label>
                                    <textarea class="form-control" name="edesc" id="edesc"
                                        placeholder=" Event Description Here" style="height: 100px" required></textarea>
                                </div>
                                <!-- Sermon Description Textarea end -->

                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="Date">Date</label>
                                        <input id="Date" name="Date" class="form-control" type="date" />
                                    </div>
                                </div>


                                <!-- <div  style="margin-bottom: 20px;">
                                    <div class="">
                                        <div class="form-line">
                                            <label for="startTime">Start Time</label>
                                            <input id="startTime" name="startTime" class="form-control" type="time" />
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="form-line">
                                            <label for="endTime">End Time</label>
                                            <input id="endTime" name="endTime" class="form-control" type="time" />
                                        </div>
                                    </div>
                                </div> -->
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


                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="e_location" id="e_location" class="form-control"
                                            placeholder="Event Location" autofocus="false" required />
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><b>Choose Event image</b></p>
                                            <input type="file" class="form-control" name="image" accept="image/*"
                                                id="upload-button" required />
                                        </div>
                                        <div class="col-md-8">
                                            <figure class="image-container">
                                                <img id="chosen-image" class="image-style">
                                            </figure>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                




                    <div class="modal-footer ">
                        <p id="formErrorMessage" style="color:red"></p>
                        <!-- use ajax to add user: xhr/add-user -->
                        <input type="button" id="add-user" onclick="addUser(this);" class="btn btn-success waves-effect"
                            value="Add Event" data-type="success">
                        <input type="button" id="add-user-dummy" class="btn btn-success waves-effect"
                            value="Loading. Please Wait...">
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
        
                    </div>

            </form>
        </div>
    </div>
    </div>

    <!-- ADD EVENT MODAL END -->


    <!--EDIT Event MODAL -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Edit <span id="editName"></span></h4>
                </div>
                <form method="post" enctype="multipart/form-data" action="">
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="edit_etitle">Event Title</label>
                                        <input type="text" name="edit_etitle" id="edit_etitle" class="form-control"
                                            placeholder="Event Title" autofocus="false" required />
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
                                    <label for="floatingTextarea2">Event Descprition</label>
                                    <textarea class="form-control" name="edit_edesc" id="edit_edesc"
                                        placeholder=" Event Description Here" style="height: 100px" required></textarea>
                                </div>
                                <!-- Sermon Description Textarea end -->

                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="edit_Date">Date</label>
                                        <input id="edit_Date" name="edit_Date" class="form-control" type="date" />
                                    </div>
                                </div>


                                <!-- <div  style="margin-bottom: 20px;">
                                    <div class="">
                                        <div class="form-line">
                                            <label for="startTime">Start Time</label>
                                            <input id="startTime" name="startTime" class="form-control" type="time" />
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="form-line">
                                            <label for="endTime">End Time</label>
                                            <input id="endTime" name="endTime" class="form-control" type="time" />
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row">
                                    <h4 style="margin-left: 12px;">Time Duration</h4>
                                    <div class="col-xs-6">
                                        <label for="edit_startTime">Start time</label>
                                        <div class="input-group bootstrap-timepicker"
                                            style="box-shadow: 0px 0px 5px gray; border-radius: 6px; padding: 5px;">
                                            <input type="text" class="form-control input-small" name="edit_startTime"
                                                id="edit_startTime">
                                            <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-time"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="edit_endTime">End time</label>
                                        <div class="input-group bootstrap-timepicker"
                                            style="box-shadow: 0px 0px 5px gray; border-radius: 6px; padding: 5px;">
                                            <input type="text" class="form-control input-small" name="edit_endTime"
                                                id="edit_endTime">
                                            <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-time"></i></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="edit_e_location">Location</label>
                                        <input type="text" name="edit_e_location" id="edit_e_location" class="form-control"
                                            placeholder="Event Location" autofocus="false" required />
                                    </div>
                                </div>


                                <!-- <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><b>Choose Event image</b></p>
                                            <input type="file" class="form-control" name="image" accept="image/*"
                                                id="upload-button" required />
                                        </div>
                                        <div class="col-md-8">
                                            <figure class="image-container">
                                                <img id="chosen-image" class="image-style">
                                            </figure>
                                        </div>
                                    </div>


                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <p id="updateErrorMessage" style="color:red"></p>
                        <!-- use ajax to add user: xhr/add-user -->
                        <input type="button" id="update-event" class="btn btn-success waves-effect"
                            value="Update Event">
                        <input type="button" id="delete-event" class="btn btn-danger waves-effect"
                            value="Delete Event">
                    </div>
                    <input type="hidden" id="edit_event_id" />
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-warning waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- EDIT Event MODAL END -->

   




         <!--ADD SPEAKER MODAL -->
    <div class="modal fade" id="speakerModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Add Speaker</h4>
                </div>
                <form method="post" enctype="multipart/form-data" action="">
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="sname">Speaker Name</label>
                                        <input type="text" name="sname" id="sname" class="form-control"
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
                                    <textarea class="form-control" name="sdesc" id="sdesc"
                                        placeholder="Speaker Info Here" style="height: 100px" required></textarea>
                                </div>
                                <!-- Sermon Description Textarea end -->

                               


                                <div class="row">
                                    <h4 style="margin-left: 12px;">Time Duration</h4>
                                    <div class="col-xs-6">
                                        <label>Start time</label>
                                        <div class="input-group bootstrap-timepicker"
                                            style="box-shadow: 0px 0px 5px gray; border-radius: 6px; padding: 5px;">
                                            <input type="text" class="form-control input-small" name="startTimeSpeaker"
                                                id="startTimeSpeaker">
                                            <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-time"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <label>End time</label>
                                        <div class="input-group bootstrap-timepicker"
                                            style="box-shadow: 0px 0px 5px gray; border-radius: 6px; padding: 5px;">
                                            <input type="text" class="form-control input-small" name="endTimeSpeaker"
                                                id="endTimeSpeaker">
                                            <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-time"></i></span>
                                        </div>
                                    </div>
                                </div>
                               

                                <div class="form-group">
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

                                </div>
                            </div>

                        </div>
                    </div>
                




                <div class="modal-footer ">
                    <p id="formErrorMessage2" style="color:red"></p>
                    <!-- use ajax to add user: xhr/add-user -->
                    <input type="button" id="add-speaker" onclick="addUser(this);" class="btn btn-success waves-effect"
                        value="Add Speaker" data-type="success">
                    <input type="button" id="add-speaker-dummy" class="btn btn-success waves-effect"
                        value="Loading. Please Wait...">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>

                </div>

            </form>
        </div>
    </div>
    </div>
    <!-- ADD SPEAKER MODAL END -->





        
     

     




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

    <script type="text/javascript">
        let uploadButton = document.getElementById("upload-button");
        let chosenImage = document.getElementById("chosen-image");

        uploadButton.onchange = () => {
            let reader = new FileReader();
            reader.readAsDataURL(uploadButton.files[0]);
            reader.onload = () => {
                chosenImage.setAttribute("src", reader.result);
            }
            fileName.textContent = uploadButton.files[0].name;
        }



        // upload-speaker-button   chosen-speaker-image

        let uploadButton2 = document.getElementById("upload-speaker-button");
        let chosenImage2 = document.getElementById("chosen-speaker-image");

        uploadButton2.onchange = () => {
            let reader = new FileReader();
            reader.readAsDataURL(uploadButton2.files[0]);
            reader.onload = () => {
                chosenImage2.setAttribute("src", reader.result);
            }
            fileName.textContent = uploadButton2.files[0].name;
        }

    </script>
    <script>
        $(function () {
            $('#add-user').on('click', function () {
                //  etitle  edesc  Date startTime endTime  e_location
                var eventTitle = $("#etitle").val();
                var eventdesc = $("#edesc").val();
                var eventDate = $("#Date").val();
                var eventStartTime = $("#startTime").val();
                var eventEndTime = $("#endTime").val();
                var eventLocation = $("#e_location").val();
               
                var file = $("#upload-button")[0].files[0];
                var formData = new FormData();
                formData.append('image', file);
                formData.append('eventTitle', eventTitle);
                formData.append('eventdesc', eventdesc);
                formData.append('eventDate', eventDate);
                formData.append('eventStartTime', eventStartTime);
                formData.append('eventEndTime', eventEndTime);
                formData.append('eventLocation', eventLocation);


                if (eventTitle === "" || eventTitle === null || eventdesc === "" || eventdesc === null || eventDate === "" || eventDate === null || file === "" || file === null || eventStartTime === "" || eventStartTime === null || eventEndTime === "" || eventEndTime === null || eventLocation === "" || eventLocation === null) {
                    $("#formErrorMessage").html("Fill all the details to continue...");
                    $('#add-user').preventDefault();
                } else {
                    // function validateEmail($email) {
                    //   var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                    //   return emailReg.test($email);
                    // }
                    // function validateMobile($mobile) {
                    //   var mobileReg = /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[6789]\d{9}$/gm;
                    //   return mobileReg.test($mobile);
                    // }
                    // if (!validateEmail(email)) {
                    //     $("#emailErrorMessage").html("Please Enter a valid email address.");
                    //     $("#email").focus();
                    //     $('#add-user').preventDefault();
                    // } else if (!validateMobile(phone)) {
                    //     $("#phoneErrorMessage").html("Please Enter a valid phone number.");
                    //     $("#phone").focus();
                    //     $('#add-user').preventDefault();
                    // } else {
                    $("#formErrorMessage").html("");
                    $("#emailErrorMessage").html("");
                    $("#phoneErrorMessage").html("");

                    $("#add-user").css("display", "none");
                    $("#add-user-dummy").css("display", "inline-block");

                    $.ajax({

                        type: "POST",
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",
                        url: "xhr/add-event.php",
                        mimeType: 'multipart/form-data',
                        data: formData,
                        success: function (response) {
                            if (response.successMessage) {
                                // showSuccessMessage ();
                                swal("Success!", response.successMessage + " Reloading ", "success");

                                setTimeout(function () {
                                    window.location.reload();
                                }, 3000);

                            } else if (response.errorMessage) {
                                swal("Error!", response.errorMessage, "error");
                                $("#add-user-dummy").css("display", "none");
                                $("#add-user").css("display", "inline-block");
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
            $('.add-speaker-modal').on('click', function () {
                var eventId = $(this).data('id');
                console.log(eventId);
                $("#eveId").val(eventId);

                
            });


            $('#add-speaker').on('click', function () {
                //  etitle  edesc  Date startTime endTime  e_location
                var speakerName = $("#sname").val();
                var spekerInfo = $("#sdesc").val();
                var startTime = $("#startTimeSpeaker").val();
                var endTime = $("#endTimeSpeaker").val();
                var eveId = $("#eveId").val();
               
                var file = $("#upload-speaker-button")[0].files[0];
                var formData = new FormData();
                formData.append('image', file);  
                formData.append('speakerName', speakerName);
                formData.append('spekerInfo', spekerInfo);
              
                formData.append('startTime', startTime);
                formData.append('endTime', endTime);

                console.log(startTime);
                console.log(endTime);

                formData.append('eveId', eveId);
              


                if (speakerName === "" || speakerName === null || spekerInfo === "" || spekerInfo === null || startTime === "" || startTime === null || file === "" || file === null || endTime === "" || endTime === null ) {
                    $("#formErrorMessage2").html("Fill all the details to continue...");
                    $('#add-speaker').preventDefault();
                } else {
                    // function validateEmail($email) {
                    //   var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                    //   return emailReg.test($email);
                    // }
                    // function validateMobile($mobile) {
                    //   var mobileReg = /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[6789]\d{9}$/gm;
                    //   return mobileReg.test($mobile);
                    // }
                    // if (!validateEmail(email)) {
                    //     $("#emailErrorMessage").html("Please Enter a valid email address.");
                    //     $("#email").focus();
                    //     $('#add-user').preventDefault();
                    // } else if (!validateMobile(phone)) {
                    //     $("#phoneErrorMessage").html("Please Enter a valid phone number.");
                    //     $("#phone").focus();
                    //     $('#add-user').preventDefault();
                    // } else {
                    $("#formErrorMessage2").html("");
                   

                    $("#add-speaker").css("display", "none");
                    $("#add-speaker-dummy").css("display", "inline-block");

                    $.ajax({

                        type: "POST",
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",
                        url: "xhr/add-speaker.php",
                        mimeType: 'multipart/form-data',
                        data: formData,
                        success: function (response) {
                            if (response.successMessage) {
                                // showSuccessMessage ();
                                swal("Success!", response.successMessage + " Reloading ", "success");

                                setTimeout(function () {
                                    window.location.reload();
                                }, 3000);

                            } else if (response.errorMessage) {
                                swal("Error!", response.errorMessage, "error");
                                $("#add-speaker-dummy").css("display", "none");
                                $("#add-speaker").css("display", "inline-block");
                            }

                        },
                        error: function (error) {
                            swal("Error!", "Something went wrong", "error");

                        }
                    });
                  

                }

            });
            


        });  





        $(function () {
            $('.edit-user').on('click', function () {
                var eventId = $(this).data('id');
                console.log(eventId);

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "xhr/edit-event.php",
                    data: { eventId: eventId },
                    success: function (response) {
                        // edit_etitle  edit_edesc  edit_Date  edit_startTime  edit_endTime edit_e_location
                        //  eventId eventTitle eventDescription eventDate eventStartTime eventEndTime eventLocation
                        $("#edit_etitle").html(response.eventTitle);
                        $("#edit_etitle").val(response.eventTitle);
                        $("#edit_edesc").val(response.eventDescription);
                        $("#edit_Date").val(response.eventDate);
                        $("#edit_startTime").val(response.eventStartTime);
                        $("#edit_endTime").val(response.eventEndTime);
                        $("#edit_e_location").val(response.eventLocation);
                        //  $("#edit_email").val(response.email);
                        //  $("#edit_phone").val(response.phone);
                        $("#edit_event_id").val(response.eventId);
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
            $('#update-event').on('click', function () {
                var eventTitle = $("#edit_etitle").val();
                var eventDescription = $("#edit_edesc").val();
                var eventDate = $("#edit_Date").val();
                var eventStartTime = $("#edit_startTime").val();
                var eventEndTime = $("#edit_endTime").val();
                var eventLocation = $("#edit_e_location").val();
                var eventId = $("#edit_event_id").val();
                
                // var phone = $("#edit_phone").val();
                // var userId = $("#edit_user_id").val();
                // var status = $("#status").find(":selected").val();
                var formData = new FormData();
                formData.append('eventTitle', eventTitle);
                formData.append('eventDescription', eventDescription);
                formData.append('eventDate', eventDate);
                formData.append('eventStartTime', eventStartTime);
                formData.append('eventEndTime', eventEndTime);
                formData.append('eventLocation', eventLocation);
                formData.append('eventId', eventId);
                // formData.append('phone', phone);
                // formData.append('user_id', userId);
                // formData.append('status', status);

                if (eventTitle === "" || eventTitle === null || eventDescription === "" || eventDescription === null || eventDate === "" || eventDate === null  || eventStartTime === "" || eventStartTime === null || eventEndTime === "" || eventEndTime === null || eventLocation === "" || eventLocation === null) {
                    $("#updateErrorMessage").html("Fill all the details to continue...");
                    $('#add-user').preventDefault();
                } else {
                    // function validateEmail($email) {
                    //   var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                    //   return emailReg.test($email);
                    // }
                    // function validateMobile($mobile) {
                    //   var mobileReg = /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[6789]\d{9}$/gm;
                    //   return mobileReg.test($mobile);
                    // }
                    // if (!validateEmail(email)) {
                    //     $("#updateEmailErrorMessage").html("Please Enter a valid email address.");
                    //     $("#email").focus();
                    //     $('#add-user').preventDefault();
                    // } else if (!validateMobile(phone)) {
                    //     $("#updatePhoneErrorMessage").html("Please Enter a valid phone number.");
                    //     $("#phone").focus();
                    //     $('#add-user').preventDefault();
                    // } else {
                    $("#formErrorMessage").html("");
                    $("#emailErrorMessage").html("");
                    $("#phoneErrorMessage").html("");
                    $.ajax({
                        type: "POST",
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",
                        url: "xhr/update-event.php",
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
            $('#delete-event').on('click', function () {

                var eventId = $("#edit_event_id").val();
                var formData = new FormData();
                formData.append('eventId', eventId);
                if (confirm('Are you sure you want to delete this Event?')) {
                    $.ajax({
                        type: "POST",
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",
                        url: "xhr/delete-event.php",
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
                    alert('Event deletion aborted.');
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