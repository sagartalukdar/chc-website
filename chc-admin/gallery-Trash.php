<?php include("includes/header.php"); ?>
<!-- Bootstrap Select Css -->
<link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<!-- Sweetalert Css -->
<link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
<style>
    #add-user-dummy , #add-user-dummy2 {
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
                <h2>GALLERY MANAGEMENT</h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a class="btn btn-primary" href="javascript:void(0);" data-toggle="modal"
                                data-target="#defaultModal">Add New Photo</a>

                                <a class="btn btn-info" href="javascript:void(0);" data-toggle="modal"
                                data-target="#defaultModal2" style="margin: 6px;">Post Multiple Photos</a>
                        </div>
                        <div class="header ">
                            <h2>
                                GALLERY DETAILS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right js-sweetalert">
                                        <li><a href="javascript:void(0);" data-toggle="modal"
                                                data-target="#defaultModal">Add New Photo</a></li>

                                                <li><a href="javascript:void(0);" data-toggle="modal"
                                                    data-target="#defaultModal2">Post Multiple Images</a></li>
    

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
                                            <th>Photo Title</th>
                                            <th>Photo Description</th>
                                            <th>Photo</th>
                                            <th>Posted User Id</th>
                                            <th>Action</th>
                                        </tr>

                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Photo Title</th>
                                            <th>Photo Description</th>
                                            <th>Photo</th>
                                            <th>Posted User Id</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        <?php $readGallery = $crud->Read('gallery',"1 order by `gallery_id` desc"); 
                                        if ($readGallery) {
                                            $n=0;
                                            foreach($readGallery as $readKey){
                                              ?>

                                            <!-- gallery_img	
                                            img_desc	
                                            img_title	
                                            img_posted_user_id	
                                            added_date	
                                            added_time -->
                                        <tr>
                                            <td>
                                                <?php echo ++$n; ?>
                                            </td>
                                            <td>
                                                <?php echo $readKey['img_title']; ?>
                                            </td>
                                            <td>
                                                <?php echo $readKey['img_desc']; ?>
                                            </td>
                                            
                                            <td><img src="<?php echo $readKey['gallery_img']; ?>" width="100px"
                                                    height="100px"></td>
                                            <td>
                                                <?php echo $readKey['img_posted_user_id']; ?>
                                            </td>

                                            <td><button id="edit-user" data-toggle="modal" data-target="#editModal"
                                                    data-id="<?php echo $readKey['gallery_id']; ?>" type="button"
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
    <!--ADD GALLERY MODAL -->
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Post gallery image</h4>
                </div>
                <form method="post" enctype="multipart/form-data" action="">
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="photoTitle" id="photoTitle" class="form-control"
                                            placeholder="Title" autofocus="false" required />
                                    </div>
                                </div>
<!--                              
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="sdesc" id="sdesc" class="form-control"
                                            placeholder="Sermon Description" required />
                                    </div>
                                </div> -->

                                <!-- photo Description Textarea start -->
                                <div class="form-floating " style="margin-bottom: 20px;">
                                    <label for="floatingTextarea2">Picture Descprition</label>
                                    <textarea class="form-control" name="photoDesc" id="photoDesc" placeholder="Your image descprition here" style="height: 100px" required></textarea>
                                </div>
                                <!-- photo Description Textarea end -->



                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><b>Post Photo</b></p>
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
                            value="Upload Photo" data-type="success">
                        <input type="button" id="add-user-dummy" class="btn btn-success waves-effect"
                            value="Loading. Please Wait...">
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>

                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- ADD GALLERY MODAL END -->


        <!--ADD GALLERY MODAL2 -->
        <div class="modal fade" id="defaultModal2" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Post gallery images</h4>
                    </div>
                    <form method="post" enctype="multipart/form-data" action="">
                        <div class="modal-body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                   
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><b> <label class="custom-file-label" for="upload-button">Select Photos</label></b></p>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="upload-button2" name="image[]" accept="image/*" multiple>
                                                   
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-8">
                                                <figure class="image-container">
                                                    <img id="chosen-image" class="image-style">
                                                </figure>
                                            </div> -->
                                        </div>
    
    
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <input type="hidden" value="<?php echo $_SESSION['this_user_id'] ?>" id="posted_u_id">
    
    
                        <div class="modal-footer ">
                            <p id="formErrorMessage2" style="color:red"></p>
                            <!-- use ajax to add user: xhr/add-user -->
                            <input type="button" id="add-user2" onclick="addUser(this);" class="btn btn-success waves-effect"
                                value="Upload Photo" data-type="success">
                            <input type="button" id="add-user-dummy2" class="btn btn-success waves-effect"
                                value="Loading. Please Wait...">
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
    
                        </div>
    
                    </form>
                </div>
            </div>
        </div>
        <!-- ADD GALLERY MODAL2 END -->


    <!--EDIT GALLERY MODAL -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Edit <span id="editTitle"></span></h4>
                </div>
                <form method="post" enctype="multipart/form-data" action="">
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="edit_gallery_title" class="form-control"
                                            placeholder="Picture Title" autofocus="false" required />
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
                                    <label for="floatingTextarea2">Picture Descprition</label>
                                    <textarea class="form-control" id="edit_gallery_desc" placeholder="Gallery descprition here" style="height: 100px" ></textarea>
                                </div>
                                <!-- Sermon Description Textarea end -->



                                

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
                        <input type="button" id="update-picture" class="btn btn-success waves-effect"
                            value="Update Picture">
                        <input type="button" id="delete-picture" class="btn btn-danger waves-effect"
                            value="Delete Picture">
                    </div>
                    <input type="hidden" id="edit_gallery_id" />
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-warning waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- EDIT GALLERY MODAL END -->


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
                 
                var photoTitle = $("#photoTitle").val();
                var photoDesc = $("#photoDesc").val();
               

                var file = $("#upload-button")[0].files[0];
                var formData = new FormData();
                formData.append('image', file);
                formData.append('photoTitle', photoTitle);
                formData.append('photoDesc', photoDesc);


                if (photoTitle === "" || photoTitle === null || photoDesc === "" || photoDesc === null || file === "" || file === null) {
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
                        url: "xhr/add-photo.php",
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
            $('#add-user2').on('click', function () {
                 
                var files = $("#upload-button2")[0].files;
                var formData = new FormData();

                // Check if files array is not empty
                if (files.length === 0) {
                    $("#formErrorMessage2").html("Select images to continue...");
                    event.preventDefault(); // Prevent form submission
                } else {
                    // Append each file to FormData object
                    for (var i = 0; i < files.length; i++) {
                        formData.append('image[]', files[i]);
                    }
                    
                    // Proceed with form submission or further processing

                    $("#add-user2").css("display", "none");
                    $("#add-user-dummy2").css("display", "inline-block");

                    $.ajax({
                        type: "POST",
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",
                        url: "xhr/add-photo2.php",
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
                                $("#add-user-dummy2").css("display", "none");
                                $("#add-user2").css("display", "inline-block");
                            }

                        },
                        error: function (error) {
                            swal("Error!", "Something went wrong", "error");

                        }
                        });
                }



                // if (photoTitle === "" || photoTitle === null || photoDesc === "" || photoDesc === null || file === "" || file === null) {
                //     $("#formErrorMessage").html("Fill all the details to continue...");
                //     $('#add-user').preventDefault();
               

            });
        });



        




        $(function () {
            $('.edit-user').on('click', function () {
                var galleryId = $(this).data('id');
                console.log(galleryId);

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "xhr/edit-gallery.php",
                    data: { galleryId: galleryId },
                    success: function (response) {
                        $("#editTitle").html(response.galleryTitle);
                        $("#editTitle").val(response.galleryTitle);
                        $("#edit_gallery_title").val(response.galleryTitle);
                        $("#edit_gallery_desc").val(response.galleryDesc);
                        // $("#edit_sermonLink").val(response.sermonLink);
                        //  $("#edit_email").val(response.email);
                        //  $("#edit_phone").val(response.phone);
                        $("#edit_gallery_id").val(response.galleryId);
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
            $('#update-picture').on('click', function () {
                var imgTitle = $("#edit_gallery_title").val();
                var imgDescription = $("#edit_gallery_desc").val();
                // var SermonLink = $("#edit_sermonLink").val();
                var galleryId = $("#edit_gallery_id").val(); 
                // var phone = $("#edit_phone").val();
                // var userId = $("#edit_user_id").val();
                // var status = $("#status").find(":selected").val();
                var formData = new FormData();
                formData.append('imgTitle', imgTitle);
                formData.append('imgDescription', imgDescription);

                formData.append('galleryId', galleryId);
                // formData.append('phone', phone);
                // formData.append('user_id', userId);
                // formData.append('status', status);

                if (imgTitle === "" || imgTitle === null || imgDescription === "" || imgDescription === null ) {
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
                        url: "xhr/update-gallery.php",
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
            $('#delete-picture').on('click', function () {

                var galleryId = $("#edit_gallery_id").val();   
                var formData = new FormData();
                formData.append('galleryId', galleryId);
                if (confirm('Are you sure you want to delete this Picture?')) {
                    $.ajax({
                        type: "POST",
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",
                        url: "xhr/delete-gallery.php",
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
                    alert('Picture deletion aborted.');
                }



            });
        });

    </script>


</body>

</html>