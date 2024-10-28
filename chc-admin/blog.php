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
                <h2>BLOG MANAGEMENT</h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a class="btn btn-primary" href="javascript:void(0);" data-toggle="modal"
                                data-target="#defaultModal">Post Blog</a>
                        </div>
                        <div class="header ">
                            <h2>
                                BLOG DETAILS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right js-sweetalert">
                                        <li><a href="javascript:void(0);" data-toggle="modal"
                                                data-target="#defaultModal">Post Blog</a></li>

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
                                            <th>Blog Title</th>
                                            <th>Blog Description</th>
                                            <th>Blog Date</th>
                                            <th>Blog Image</th>
                                            <th>Posted User Id</th>
                                            <th>Blog Category</th>
                                            <th>Action</th>
                                        </tr>

                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Blog Title</th>
                                            <th>Blog Description</th>
                                            <th>Blog Date</th>
                                            <th>Blog Image</th>
                                            <th>Posted User Id</th>
                                            <th>Blog Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        <?php $readSermons = $crud->Read('blog',"1 order by `blog_id` desc");
                                        if ($readSermons) {
                                            $n=0;
                                            foreach($readSermons as $readKey){
                                              ?>
                                        <!-- 
                                            Full texts
                                            blog_id
                                            blog_title
                                            blog_desc
                                            blog_date
                                            blog_img
                                            blog_category
                                            bolg_posted_uid -->
                                        <tr>
                                            <td>
                                                <?php echo ++$n; ?>
                                            </td>
                                            <td>
                                                <?php echo $readKey['blog_title']; ?>
                                            </td>
                                            <td>
                                                <?php echo $readKey['blog_desc']; ?>
                                            </td>
                                            <td>
                                                <?php echo $readKey['blog_date']; ?>
                                            </td>
                                            <td><img src="<?php echo $readKey['blog_img']; ?>" width="100px"
                                                    height="100px"></td>
                                            
                                          

                                            <td>
                                            <?php 
                                            $posterId= $readKey['blog_posted_uid'];
                                            $readPoster = $crud->Read('users'," `id`=$posterId"); 
                                                if ($readPoster) {  
                                                    $name= $readPoster[0]['name'].$readPoster[0]['surname'];; 
                                                    echo $name;
                                                }?>
                                               
                                            </td>

                                             <td>
                                                <?php echo $readKey['blog_category']; ?>
                                            </td>

                                            <td><button id="edit-user" data-toggle="modal" data-target="#editModal"
                                                    data-id="<?php echo $readKey['blog_id']; ?>" type="button"
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
                    <h4 class="modal-title" id="defaultModalLabel">Post new blog</h4>
                </div>
                <form method="post" enctype="multipart/form-data" action="">
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="blogTitle" id="blogTitle" class="form-control"
                                            placeholder="Blog Title " autofocus="false" required />
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
                                    <label for="floatingTextarea2">Blog Descprition</label>
                                    <textarea class="form-control" name="blogDesc" id="blogDesc" placeholder="Write your blog description" style="height: 100px" required></textarea>
                                </div>
                                <!-- Sermon Description Textarea end --> 
                                


                                <div class="form-group mb-3 ">
                                    <div class="form-line">
                                        <input type="text" name="blogCategory" id="blogCategory" class="form-control"
                                            placeholder="Category"  autofocus="false" required />
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="blogDate" id="blogDate" class="form-control"
                                            placeholder="Broadcast date "  autofocus="false" required  />
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><b>Blog Image</b></p>
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
                            value="POST" data-type="success">
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
                                    <label for="edit_bname">Blog Title</label>
                                        <input type="text" id="edit_btitle" name="edit_btitle" class="form-control"
                                            placeholder="Blog Title" autofocus="false" required />
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
                                    <label for="floatingTextarea2">Blog Descprition</label>
                                    <textarea class="form-control" id="edit_bdesc" name="edit_bdesc" placeholder="Leave a descprition here" style="height: 100px" ></textarea>
                                </div>
                                <!-- Sermon Description Textarea end -->
                               


                                <div class="form-group">
                                    <div class="form-line">
                                    <label for="edit_bcategory">Blog Category</label>
                                        <input type="text" id="edit_bcategory" name="edit_bcategory" class="form-control"
                                            placeholder="Blog Category"  autofocus="false" required />
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
                        <input type="button" id="update-blog" class="btn btn-success waves-effect"
                            value="Update Post">
                        <input type="button" id="delete-blog" class="btn btn-danger waves-effect"
                            value="Delete Post">
                    </div>
                    <input type="hidden" id="edit_blog_id" name="edit_blog_id"/> 
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
               // posted_u_id blogDate bloagCategory blogDesc blogTitle
                var blogTitle = $("#blogTitle").val();
                var blogDesc = $("#blogDesc").val();
                var blogCategory = $("#blogCategory").val();
               // var blogDate = $("#blogDate").val();
                var postedUserId = $("#posted_u_id").val();

                var file = $("#upload-button")[0].files[0];
                var formData = new FormData();
                formData.append('image', file); 
                formData.append('blogTitle', blogTitle); 
                formData.append('blogDesc', blogDesc);
                formData.append('blogCategory', blogCategory);
               // formData.append('blogDate', blogDate);
                formData.append('postedUserId', postedUserId);


                if (blogTitle === "" || blogTitle === null || blogDesc === "" || blogDesc === null  || file=="" || file==null) {
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
                        url: "xhr/add-blog.php",
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
                var blogId = $(this).data('id');
                console.log(blogId); 

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "xhr/edit-blog.php",
                    data: { blogId: blogId },
                    success: function (response) {
                       // edit_blog_id edit_bdesc edit_bname  edit_bcategory
                        $("#editName").html(" :"+response.blogTitle); //blogCategory blogDesc blogTitle blogId
                        $("#edit_btitle").val(response.blogTitle);
                        $("#edit_bdesc").val(response.blogDesc);
                        $("#edit_bcategory").val(response.blogCategory);
                        //  $("#edit_email").val(response.email);
                        //  $("#edit_phone").val(response.phone);
                        $("#edit_blog_id").val(response.blogId);
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
            $('#update-blog').on('click', function () {
                   // edit_blog_id edit_bdesc edit_bname  edit_bcategory
                var blogTitle = $("#edit_btitle").val();
                var blogDescription = $("#edit_bdesc").val();
                var blogCategory = $("#edit_bcategory").val();
                var blogId = $("#edit_blog_id").val();
                // var phone = $("#edit_phone").val();
                // var userId = $("#edit_user_id").val();
                // var status = $("#status").find(":selected").val();
                var formData = new FormData();
                formData.append('edit_btitle', blogTitle); 
                formData.append('edit_bdesc', blogDescription);
                formData.append('edit_bcategory', blogCategory);
                formData.append('edit_blog_id', blogId);
                // formData.append('phone', phone);
                // formData.append('user_id', userId);
                // formData.append('status', status);

                if (blogTitle === "" || blogTitle === null || blogDescription === "" || blogDescription === null ) {
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
                        url: "xhr/update-blog.php",
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
            $('#delete-blog').on('click', function () {

                var blogId = $("#edit_blog_id").val();
                var formData = new FormData();
                formData.append('blogId', blogId);
                if (confirm('Are you sure you want to delete this Blog Post?')) {
                    $.ajax({
                        type: "POST",
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",
                        url: "xhr/delete-blog.php",
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