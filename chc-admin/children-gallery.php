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
                <h2> MANAGEMENT OF CHILLDREN GALLERY</h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a class="btn btn-primary" href="javascript:void(0);" data-toggle="modal"
                                data-target="#defaultModal" id="add_ch_gal">Add chilldren gallery</a>
                        </div>
                        <div class="header ">
                            <h2>
                                CHILLDREN GALLERY DETAILS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right js-sweetalert">
                                        <li><a href="javascript:void(0);" data-toggle="modal"
                                                data-target="#defaultModal">Add chilldren gallery</a></li>

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
                                            <th>Chilldren Gallery Picture</th>
                                            <th>Chilldren Gallery Title</th>
                                            <th>Gallery About</th>
                                            <th>Gallery Date</th>
                                            <th>Filter Keyword</th>
                                            <th>Action</th>
                                        </tr>

                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Chilldren Gallery Picture</th>
                                            <th>Chilldren Gallery Title</th>
                                            <th>Gallery About</th>
                                            <th>Gallery Date</th>
                                            <th>Filter Keyword</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        <?php $readSermons = $crud->Read('children_gallery',"1 order by `ch_g_id` desc");
                                        if ($readSermons) {
                                            $n=0;
                                            foreach($readSermons as $readKey){
                                              ?>
                                        <!-- 
                                            Full texts
                                            ch_g_id	
                                            ch_g_img	
                                            ch_g_title	
                                            ch_g_desc	
                                            ch_g_date -->
                                        <tr>
                                            <td>
                                                <?php echo ++$n; ?>
                                            </td>

                                            <td><img src="<?php echo $readKey['ch_g_img']; ?>" width="100px"
                                                    height="100px" style="border-radius: 50px;">
                                            </td>
                                            <td>
                                                <?php echo $readKey['ch_g_title']; ?>
                                            </td>
                                            <td>
                                                <?php echo $readKey['ch_g_desc']; ?>
                                            </td>
                                            <td>
                                                <?php echo $readKey['ch_g_date']; ?>
                                            </td>
                                            <td>
                                                <?php echo $readKey['ch_g_keyword']; ?>
                                            </td>



                                            <td><button id="edit-user" data-toggle="modal" data-target="#editModal"
                                                    data-id="<?php echo $readKey['ch_g_id']; ?>" type="button"
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
    <!--ADD USER MODAL -->
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Add To Chilldren Gallery</h4>
                </div>
                <form method="post" enctype="multipart/form-data" action="">
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="ch_g_title" id="ch_g_title" class="form-control"
                                            placeholder="Gallery Title" autofocus="false" required />
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
                                    <label for="floatingTextarea2">Chilldren Gallery's About</label>
                                    <textarea class="form-control" name="ch_g_desc" id="ch_g_desc"
                                        placeholder="Leave a descprition here" style="height: 100px"
                                        required></textarea>
                                </div>
                                <!-- Sermon Description Textarea end -->






                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><b>Select Picture</b></p>
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


                                <div>
                                    <div>
                                        <label for="startDate">Date</label>
                                        <input id="ch_g_date" name="ch_g_date" class="form-control" type="date" />
                                    </div>
                                </div>


                                <div class="form-group" style="margin-bottom: 20px; margin-top: 20px;">
                                    <div class="form-line">
                                        <select name="photoKeyword" id="photoKeyword" class="form-control show-tick"
                                            required>
                                            <option value="" selected disabled>Add a Search Filter Keyword</option>
                                            <option value="Bible">Bible</option>
                                            <option value="Church">Church</option>
                                            <option value="Religion">Religion</option>
                                            <option value="Relations">Relations</option>
                                        </select>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>



                    <div class="modal-footer ">
                        <p id="formErrorMessage" style="color:red"></p>
                        <!-- use ajax to add user: xhr/add-user -->
                        <input type="button" id="add-user" onclick="addUser(this);" class="btn btn-success waves-effect"
                            value="Post" data-type="success">
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
                <form method="post" action="">
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="edit_title" class="form-control"
                                            placeholder="Gallery Title" autofocus="false" required />
                                    </div>
                                </div>


                                <!-- Sermon Description Textarea start -->
                                <div class="form-floating " style="margin-bottom: 20px;">
                                    <label for="floatingTextarea2">Gallery About</label>
                                    <textarea class="form-control" id="edit_desc" placeholder="About Your Gallery."
                                        style="height: 100px"></textarea>
                                </div>
                                <!-- Sermon Description Textarea end -->



                                <div>
                                    <div>
                                        <label for="startDate">Date</label>
                                        <input id="edit_date" name="edit_date" class="form-control" type="date" />
                                    </div>
                                </div>


                                <div class="form-group" style="margin-bottom: 20px; margin-top: 20px;">
                                    <div class="form-line">
                                        <select name="edit_keyword" id="edit_keyword" class="form-control show-tick" required >
                                            <!-- <option value="" selected disabled>Add a Filter Keyword</option> -->
                                            <option value="Bible">Bible</option>
                                            <option value="Church">Church</option>
                                            <option value="Religion">Religion</option>
                                            <option value="Relations">Relations</option>
                                        </select>

                                    </div>
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
                        <input type="button" id="update-gallery" class="btn btn-success waves-effect"
                            value="Update Post">
                        <input type="button" id="delete-gallery" class="btn btn-danger waves-effect"
                            value="Delete Post">
                    </div>
                    <input type="hidden" id="edit_gallery_id" />
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

                var ch_gallery_title = $("#ch_g_title").val();  // ch_g_date  image ch_g_desc ch_g_title
                var ch_gallery_desc = $("#ch_g_desc").val();
                var ch_gallery_date = $("#ch_g_date").val();
                var photoKeyword = $("#photoKeyword").val();


                var file = $("#upload-button")[0].files[0];
                var formData = new FormData();
                formData.append('ch_gallery_title', ch_gallery_title);
                formData.append('ch_gallery_desc', ch_gallery_desc);
                formData.append('ch_gallery_date', ch_gallery_date);
                formData.append('photoKeyword', photoKeyword);
                formData.append('image', file);



                if (ch_gallery_title === "" || ch_gallery_title === null || ch_gallery_desc === "" || ch_gallery_desc === null || ch_gallery_date === "" || ch_gallery_date === null || file === "" || file === null) {
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
                        url: "xhr/add-chilldrenGallery.php",
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
                var ch_gallery_id = $(this).data('id');
                console.log(ch_gallery_id);

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "xhr/edit-chilldren-gallery.php",
                    data: { ch_gallery_id: ch_gallery_id },
                    success: function (response) {
                        $("#editName").html(response.edit_title); // edit_title  edit_desc  edit_date  ch_gallery_id
                        $("#edit_title").val(response.edit_title);
                        $("#edit_desc").val(response.edit_desc);
                        $("#edit_date").val(response.edit_date);
                        //  $("#edit_email").val(response.email);
                        //  $("#edit_phone").val(response.phone);
                        $("#edit_gallery_id").val(response.ch_gallery_id);
                        $("#edit_keyword").val(response.edit_keyword);
                        
                        //  $("#edit_user_id").val(response.user_id);

                        //  $("div.selectStatus select").val(response.status).change();

                        //  console.log(response.status);  edit_title  edit_desc  edit_date  ch_gallery_id
                    },
                    error: function (error) {
                        swal("Error!", "Something went wrong", "error");

                    }
                });
            });
        });


        $(function () {
            $('#update-gallery').on('click', function () {
                var edit_title = $("#edit_title").val();
                var edit_desc = $("#edit_desc").val();
                var edit_date = $("#edit_date").val();
                var ch_gallery_id = $("#edit_gallery_id").val();
                var edit_keyword = $("#edit_keyword").val();
                // var phone = $("#edit_phone").val();
                // var userId = $("#edit_user_id").val();
                // var status = $("#status").find(":selected").val();
                var formData = new FormData();
                formData.append('edit_title', edit_title);
                formData.append('edit_desc', edit_desc);
                formData.append('edit_date', edit_date);
                formData.append('ch_gallery_id', ch_gallery_id); 
                formData.append('edit_keyword', edit_keyword);
                // formData.append('phone', phone);
                // formData.append('user_id', userId);
                // formData.append('status', status);

                if (edit_title === "" || edit_title === null || edit_desc === "" || edit_desc === null || edit_date === "" || edit_date === null) {
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
                        url: "xhr/update-chilldren-gallery.php",
                        data: formData,
                        success: function (response) {
                            if (response.successMessage) {
                                // showSuccessMessage ();
                                swal("Success!", response.successMessage + "Reloading", "success");

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
            $('#delete-gallery').on('click', function () {

                var galleryId = $("#edit_gallery_id").val();
                var formData = new FormData();
                formData.append('galleryId', galleryId);
                if (confirm('Are you sure to delete this from Chilldren Gallery?')) {
                    $.ajax({
                        type: "POST",
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",
                        url: "xhr/delete-chilldrenGallery.php",
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
                    alert('Chilldren Gallery deletion aborted.');
                }



            });
        });

    </script>


</body>

</html>