<?php include("includes/header.php"); ?>
<!-- Bootstrap Select Css -->
<link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<!-- Sweetalert Css -->
<link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
<style>
    #add-user-dummy {
        display: none;
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
                <h2>BROADCAST MANAGEMENT</h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a class="btn btn-primary" href="javascript:void(0);" data-toggle="modal"
                                data-target="#defaultModal">Add New Broadcast</a>
                        </div>
                        <div class="header ">
                            <h2>
                            BROADCAST DETAILS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right js-sweetalert">
                                        <li><a href="javascript:void(0);" data-toggle="modal"
                                                data-target="#defaultModal">Add New Broadcast</a></li>

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
                                            <th>Broadcast Title</th>
                                            <th>Broadcast Description</th>
                                            <th>Broadcast Link</th>
                                            <th>Broadcast Banner</th>
                                            <th>Broadcast By</th>
                                            <th>Broadcast Date</th>
                                            <th>Action</th>
                                        </tr>

                                    </thead>
                                    <tfoot>
                                    <tr>
                                            <th>Sl. No.</th>
                                            <th>Broadcast Title</th>
                                            <th>Broadcast Description</th>
                                            <th>Broadcast Link</th>
                                            <th>Broadcast Banner</th>
                                            <th>Broadcast By</th>
                                            <th>Broadcast Date</th>
                                            <th>Action</th>
                                    </tr>

                                    </tfoot>

                                    <tbody>
                                        <?php $readbroadcast = $crud->Read("broadcast","1 order by `broadcast_id` desc"); 
                                        if ($readbroadcast) {
                                            $n=0;
                                            foreach($readbroadcast as $readKey){
                                              ?>
                                        <!-- 
                                            banner_id
                                            banner_img	
                                            banner_desc	
                                            added_date	
                                            banner_title	
                                            added_time	  -->
                                        <tr>
                                            <td>
                                                <?php echo ++$n; ?>
                                            </td>
                                            <td>
                                                <?php echo $readKey['broadcast_title']; ?>
                                            </td>
                                            <td>
                                                <?php echo $readKey['broadcast_description']; ?>
                                            </td>
                                            <td>
                                                <?php echo $readKey['broadcast_link']; ?>
                                            </td>
                                            <td><img src="<?php echo $readKey['broadcast_banner']; ?>" width="100px"
                                                    height="90px">
                                             </td>
                                           

                                            <td>
                                            <?php 
                                            $posterId=  $readKey['broadcast_by']; 
                                            $readPoster = $crud->Read('users'," `id`=$posterId"); 
                                                if ($readPoster) {  
                                                    $name= $readPoster[0]['name'].$readPoster[0]['surname'];; 
                                                    echo $name;
                                                }?>
                                               
                                            </td>

                                            <td>
                                                <?php echo $readKey['broadcast_date']; ?>
                                            </td>
                                          
                                                                                 

                                            <td><button id="edit-user" data-toggle="modal" data-target="#editModal"
                                                    data-id="<?php echo $readKey['broadcast_id']; ?>" type="button"
                                                    class="btn btn-danger waves-effect edit-user">EDIT 
                                                </button>
                                            </td>
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
    <!--ADD USER MODAL -->
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Add A New Broadcast</h4>
                </div>
                <form method="post" enctype="multipart/form-data" action="">
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="broadcastTitle" id="broadcastTitle" class="form-control"
                                            placeholder="Broadcast title " autofocus="false" required />
                                    </div>
                                </div>


                                <div class="form-floating " style="margin-bottom: 20px;">
                                    <label for="floatingTextarea2">Broadcast description </label> 
                                    <textarea class="form-control" name="broadcastDescription" id="broadcastDescription"
                                        placeholder="Broadcast description " style="height: 100px"
                                        required></textarea>
                                </div> 

                                <!-- <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="broadcastDescription" id="broadcastDescription" class="form-control"
                                            placeholder="Broadcast description " autofocus="false" required />
                                    </div>
                                </div> -->


                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" style="color: rgb(89, 89, 245);" name="broadcastLink" id="broadcastLink" class="form-control"
                                            placeholder="Broadcast link " autofocus="false" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><b>Select Broadcast Banner</b></p>
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
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="hidden" name="broadcastBy" id="broadcastBy" class="form-control"
                                            placeholder="Broadcast by " value=<?php echo $_SESSION['this_user_id'] ; ?> autofocus="false" required />
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="broadcastDate" id="broadcastDate" class="form-control"
                                            placeholder="Broadcast date "  autofocus="false" required  />
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    


                    <div class="modal-footer ">
                        <p id="formErrorMessage" style="color:red"></p>
                        <!-- use ajax to add user: xhr/add-user -->
                        <input type="button" id="add-user" onclick="addUser(this);" class="btn btn-success waves-effect"
                            value="Add Broadcast" data-type="success">
                        <input type="button" id="add-user-dummy" class="btn btn-success waves-effect"
                            value="Loading. Please Wait...">
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>

                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- ADD USER MODAL END -->
    <!--EDIT USER MODAL -->
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
                                        <input type="text" name="edit_broadcast_title" id="edit_broadcast_title" class="form-control"
                                            placeholder="Broadcast title " autofocus="false" required />
                                    </div>
                                </div>


                                <div class="form-floating " style="margin-bottom: 20px;">
                                    <label for="floatingTextarea2">Broadcast description </label> 
                                    <textarea class="form-control" name="edit_broadcast_description" id="edit_broadcast_description"
                                        placeholder="Broadcast description " style="height: 100px"
                                        required></textarea>
                                </div> 

                                <!-- <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="edit_broadcast_description" id="edit_broadcast_description" class="form-control"
                                            placeholder="Broadcast description " autofocus="false" required />
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="edit_broadcast_link" id="edit_broadcast_link" class="form-control"
                                            placeholder="Broadcast link " style="color: blue;" autofocus="false" required />
                                    </div>
                                </div>
                              
                            
                                <!-- <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="edit_broadcast_date" id="edit_broadcast_date" class="form-control"
                                            placeholder="Broadcast date " autofocus="false" required />
                                    </div>
                                </div> -->

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <p id="updateErrorMessage" style="color:red"></p>
                        <!-- use ajax to add user: xhr/add-user -->
                        <input type="button" id="update-broadcast" class="btn btn-success waves-effect"
                            value="Update Broadcast">
                        <input type="button" id="delete-broadcast" class="btn btn-danger waves-effect"
                            value="Delete Broadcast">
                    </div>
                    <input type="hidden" id="edit_broadcast_id" />
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-warning waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- EDIT USER MODAL END -->


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

    </script>
    <script>
        $(function () {
            $('#add-user').on('click', function () {
              
                var broadcastTitle = $("#broadcastTitle").val();
                var broadcastDescription = $("#broadcastDescription").val();
                var broadcastLink = $("#broadcastLink").val();
                var broadcastBy = $("#broadcastBy").val();
                var broadcastDate = $("#broadcastDate").val();
                
                var file = $("#upload-button")[0].files[0];

                var formData = new FormData();
                formData.append('image', file);
                formData.append('broadcastTitle', broadcastTitle);
                formData.append('broadcastDescription', broadcastDescription);
                formData.append('broadcastLink', broadcastLink);
                formData.append('broadcastBy', broadcastBy);
                formData.append('broadcastDate', broadcastDate);

                if (broadcastTitle === "" || broadcastTitle === null || broadcastDescription === "" || broadcastDescription === null || file === "" || file === null || broadcastLink === "" || broadcastLink === null || broadcastBy === "" || broadcastBy === null || broadcastDate === "" || broadcastDate === null ) {
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
                    // $("#formErrorMessage").html("");
                    // $("#emailErrorMessage").html("");
                    // $("#phoneErrorMessage").html("");

                    $("#add-user").css("display", "none");
                    $("#add-user-dummy").css("display", "inline-block");

                    $.ajax({

                        type: "POST",
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",
                        url: "xhr/add-broadcast.php",
                        mimeType: 'multipart/form-data',
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
            $('.edit-user').on('click', function () {
                var broadcastID = $(this).data('id');
                console.log(broadcastID);

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "xhr/edit-broadcast.php",
                    data: { broadcastID: broadcastID },
                    success: function (response) {
                        $("#editName").html(response.broadcastTitle);
                        $("#edit_broadcast_title").val(response.broadcastTitle);
                        $("#edit_broadcast_description").val(response.broadcastDescription);
                        $("#edit_broadcast_link").val(response.broadcastLink);
                        // $("#edit_broadcast_date").val(response.broadcastdate);
                       
                        //  $("#edit_email").val(response.email);
                        //  $("#edit_phone").val(response.phone);
                        $("#edit_broadcast_id").val(response.broadcastID);
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
            $('#update-broadcast').on('click', function () {
                var broadcastTitle = $("#edit_broadcast_title").val();
                var broadcastDescription = $("#edit_broadcast_description").val();
                var broadcastLink = $("#edit_broadcast_link").val();
                // var broadcastDate = $("#edit_broadcast_date").val();
                var broadcastId = $("#edit_broadcast_id").val();
                // var phone = $("#edit_phone").val();
                // var userId = $("#edit_user_id").val();
                // var status = $("#status").find(":selected").val();
                var formData = new FormData();
                formData.append('broadcastTitle', broadcastTitle);
                formData.append('broadcastDescription', broadcastDescription);
                formData.append('broadcastLink', broadcastLink);
                formData.append('broadcastDate', broadcastDate);
                formData.append('broadcastId', broadcastId);
                // formData.append('phone', phone);
                // formData.append('user_id', userId);
                // formData.append('status', status);

                if (broadcastTitle === "" || broadcastTitle === null || broadcastDescription === "" || broadcastDescription === null ||broadcastLink === "" || broadcastLink === null ||broadcastDate === "" || broadcastDate === null ||broadcastId === "" || broadcastId === null ) {
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
                    // $("#formErrorMessage").html("");
                    // $("#emailErrorMessage").html("");
                    // $("#phoneErrorMessage").html("");
                    $.ajax({
                        type: "POST",
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",
                        url: "xhr/update-broadcast.php",
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
            $('#delete-broadcast').on('click', function () {

                var broadcastId = $("#edit_broadcast_id").val();
                var formData = new FormData();
                formData.append('broadcastId', broadcastId);
                if (confirm('Are you sure to delete this Broadcast?')) {
                    $.ajax({
                        type: "POST",
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",
                        url: "xhr/delete-broadcast.php",
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
                    alert('Broadcast deletion aborted.');
                }



            });
        });

    </script>


</body>

</html>