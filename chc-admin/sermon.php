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

    /* ------------------- table data sermon link scroll bar style  ------------------- */

td {
    /* Ensure the container is positioned relative to the scrollbars */
    position: relative;
}

td::-webkit-scrollbar {
    /* width: 1px;  */
    height: 4px;
}

/* Style the scrollbar */
td::-webkit-scrollbar {
    width: 8px; /* Width of the scrollbar */
}

/* Track */
td::-webkit-scrollbar-track {
    background: #f1f1f1; /* Gray background color */
}

/* Handle */
td::-webkit-scrollbar-thumb {
    background: #ccc; /* Gray handle color */
    border-radius: 4px; /* Rounded corners */
}

/* Handle on hover */
td::-webkit-scrollbar-thumb:hover {
    background: #aaa; /* Light gray color on hover */
}

 /* ------------------- table data sermon link scroll bar style ------------------- */


</style>

</head>

<body class="theme-red">
   



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
                <h2>SERMON MANAGEMENT</h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a class="btn btn-primary" href="javascript:void(0);" data-toggle="modal"
                                data-target="#defaultModal">Add New Sermon</a>
                        </div>
                        <div class="header ">
                            <h2>
                                SERMON DETAILS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right js-sweetalert">
                                        <li><a href="javascript:void(0);" data-toggle="modal"
                                                data-target="#defaultModal">Add New Sermon</a></li>

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
                                            <th>Sermon Name</th>
                                            <th>Sermon Description</th>
                                          
                                            <th>Poster Image</th>
                                            <th>Posted By</th>

                                            <th>Action</th>
                                            <th>Youtube Link</th>
                                        </tr>

                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Sermon Name</th>
                                            <th>Sermon Description</th>
                                           
                                            <th>Poster Image</th>
                                            <th>Posted By</th>

                                            <th>Action</th>
                                            <th>Youtube Link</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        <?php $readSermons = $crud->Read('sermon',"1 order by `sermon_id` desc");
                                        if ($readSermons) {
                                            $n=0;
                                            foreach($readSermons as $readKey){
                                              ?>
                                        <!-- // sermon_name
                                            // sermon_description
                                            // sermonLink
                                            // ser_img
                                            // sermon_sender_id
                                            // added_date
                                            // added_time  -->
                                        <tr>
                                            <td>
                                                <?php echo ++$n; ?>
                                            </td>
                                            <td>
                                                <?php echo $readKey['sermon_name']; ?>
                                            </td>
                                            <td>
                                                <p style="width: 230px;"><?php echo $readKey['sermon_description']; ?></p>
                                            </td>
                                          
                                            <td><img src="<?php echo $readKey['ser_img']; ?>" width="100px"
                                                    height="100px"></td>
                                            <td>
                                                <?php $ssid=  $readKey['sermon_sender_id']; 
                                                 $readSermonsPoster = $crud->Read('users',"`id`= $ssid");
                                                if ($readSermonsPoster) { 
                                                        echo $readSermonsPoster[0]['name']." ".$readSermonsPoster[0]['surname'];
                                                 } ?>
                                            </td>

                                            <td><button id="edit-user" data-toggle="modal" data-target="#editModal"
                                                    data-id="<?php echo $readKey['sermon_id']; ?>" type="button"
                                                    class="btn btn-danger waves-effect edit-user">EDIT 
                                                </button>
                                            
                                            </td>


                                            <td style="overflow-x: scroll;">
                                                <p style="width: 130px;"><?php echo $readKey['sermonLink']; ?></p>
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
                    <h4 class="modal-title" id="defaultModalLabel">Add A New Sermon</h4>
                </div>
                <form method="post" enctype="multipart/form-data" action="">
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="sname" id="sname" class="form-control"
                                            placeholder="Sermon Name" autofocus="false" required />
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
                                    <label for="floatingTextarea2">Sermon Descprition</label>
                                    <textarea class="form-control" name="sdesc" id="sdesc" placeholder="Leave a descprition here" style="height: 100px" required></textarea>
                                </div>
                                <!-- Sermon Description Textarea end -->



                                <div class="form-group mb-3 ">
                                    <div class="form-line">
                                        <input type="text" name="sermonLink" id="sermonLink" class="form-control"
                                            placeholder="Youtube Link" style="color: blue;" autofocus="false" required />
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><b>Select Poster</b></p>
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

                    <input type="hidden" value="<?php echo $_SESSION['this_user_id'] ?>" id="posted_u_id">


                    <div class="modal-footer ">
                        <p id="formErrorMessage" style="color:red"></p>
                        <!-- use ajax to add user: xhr/add-user -->
                        <input type="button" id="add-user" onclick="addUser(this);" class="btn btn-success waves-effect"
                            value="Add Sermon" data-type="success">
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
                                        <input type="text" id="edit_sname" class="form-control"
                                            placeholder="Sermon Name" autofocus="false" required />
                                    </div>
                                </div>


                                <!-- <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="edit_sdescu" class="form-control"
                                            placeholder="Sermon Descprition" required />
                                    </div>
                                </div> -->


                                <!-- Sermon Description Textarea start -->
                                <div class="form-floating " style="margin-bottom: 20px;">
                                    <label for="floatingTextarea2">Sermon Descprition</label>
                                    <textarea class="form-control" id="edit_sdesc" placeholder="Leave a descprition here" style="height: 100px" ></textarea>
                                </div>
                                <!-- Sermon Description Textarea end -->



                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="edit_sermonLink" class="form-control"
                                            placeholder="Youtube Link" style="color: blue;" autofocus="false" required />
                                    </div>
                                    <p id="updateEmailErrorMessage" style="color:red"></p>
                                </div>

                                <!-- <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_phone" class="form-control" placeholder="Phone Number" required />
                                    <input type="text" id="edit_user_id"/>
                                </div>
                                    <p id="updatePhoneErrorMessage" style="color:red"></p>
                            </div> -->
                                <!-- <div class="form-group">
                                <div class="form-line selectStatus">
                                    <select name="status" id="status" class="form-control show-tick" required>
                                        <option value="" selected disabled>Select User Status</option> 
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                        <option value="2">Banned</option>
                                        <option value="3">Left</option>
                                    </select>
                                    
                                </div>
                            </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <p id="updateErrorMessage" style="color:red"></p>
                        <!-- use ajax to add user: xhr/add-user -->
                        <input type="button" id="update-sermon" class="btn btn-success waves-effect"
                            value="Update Sermon">
                        <input type="button" id="delete-sermon" class="btn btn-danger waves-effect"
                            value="Delete Sermon">
                    </div>
                    <input type="hidden" id="edit_sermon_id" />
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

                var sname = $("#sname").val();
                var sdesc = $("#sdesc").val();
                var sermonLink = $("#sermonLink").val();

                var file = $("#upload-button")[0].files[0];
                var formData = new FormData();
                formData.append('image', file);
                formData.append('sname', sname);
                formData.append('sdesc', sdesc);
                formData.append('sermonLink', sermonLink);


                if (sname === "" || sname === null || sdesc === "" || sdesc === null || sermonLink === "" || sermonLink === null || file === "" || file === null) {
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
                        url: "xhr/add-sermon.php",
                        mimeType: 'multipart/form-data',
                        data: formData,
                        success: function (response) {
                            if (response.successMessage) {
                                // showSuccessMessage ();
                                swal("Success!", response.successMessage +  " Reloading ", "success");

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
                var userID = $(this).data('id');
                console.log(userID);

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "xhr/edit-sermon.php",
                    data: { userID: userID },
                    success: function (response) {
                        $("#editName").html(response.sermonName);
                        $("#edit_sname").val(response.sermonName);
                        $("#edit_sdesc").val(response.sermonDescription);
                        $("#edit_sermonLink").val(response.sermonLink);
                        //  $("#edit_email").val(response.email);
                        //  $("#edit_phone").val(response.phone);
                        $("#edit_sermon_id").val(response.user_id);
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
            $('#update-sermon').on('click', function () {
                var sermonName = $("#edit_sname").val();
                var SermonDescription = $("#edit_sdesc").val();
                var SermonLink = $("#edit_sermonLink").val();
                var sermonId = $("#edit_sermon_id").val();
                // var phone = $("#edit_phone").val();
                // var userId = $("#edit_user_id").val();
                // var status = $("#status").find(":selected").val();
                var formData = new FormData();
                formData.append('sermonName', sermonName);
                formData.append('SermonDescription', SermonDescription);
                formData.append('SermonLink', SermonLink);
                formData.append('sermon_id', sermonId);
                // formData.append('phone', phone);
                // formData.append('user_id', userId);
                // formData.append('status', status);

                if (sermonName === "" || sermonName === null || SermonDescription === "" || SermonDescription === null || SermonLink === "" || SermonLink === null) {
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
                        url: "xhr/update-sermon.php",
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
            $('#delete-sermon').on('click', function () {

                var sermonId = $("#edit_sermon_id").val();
                var formData = new FormData();
                formData.append('sermonId', sermonId);
                if (confirm('Are you sure you want to delete this Sermon?')) {
                    $.ajax({
                        type: "POST",
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",
                        url: "xhr/delete-sermon.php",
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
                    alert('Sermon deletion aborted.');
                }



            });
        });

    </script>


</body>

</html>