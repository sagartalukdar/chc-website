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
                <h2> MANAGEMENT OF MEMBERS</h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a class="btn btn-primary" href="javascript:void(0);" data-toggle="modal"
                                data-target="#defaultModal">Add a New Member</a>
                        </div>
                        <div class="header ">
                            <h2>
                                MEMBER'S DETAILS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right js-sweetalert">
                                        <li><a href="javascript:void(0);" data-toggle="modal"
                                                data-target="#defaultModal">Add a New Member</a></li>

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
                                            <th>Member's Name</th>
                                            <th>Member Email</th>
                                            <th>Member Phone</th>
                                            <th>Member Role</th>
                                            <th>Member Photo</th>
                                            <th>Member About</th>


                                            <th>Action</th>
                                        </tr>

                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Member's Name</th>
                                            <th>Member Email</th>
                                            <th>Member Phone</th>
                                            <th>Member Role</th>
                                            <th>Member Photo</th>
                                            <th>Member About</th>


                                            <th>Action</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        <?php $readSermons = $crud->Read('harvest_worship_members',"1 order by `member_id` desc");
                                        if ($readSermons) {
                                            $n=0;
                                            foreach($readSermons as $readKey){
                                              ?>
                                        <!-- 
                                                Full texts
                                                member_id
                                                member_name
                                                member_email
                                                member_phone
                                                member_role
                                                member_photo
                                                member_about -->
                                        <tr>
                                            <td>
                                                <?php echo ++$n; ?>
                                            </td>
                                            <td>
                                                <?php echo $readKey['member_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $readKey['member_email']; ?>
                                            </td>
                                            <td>
                                                <?php echo $readKey['member_phone']; ?>
                                            </td>

                                            <td>
                                                <?php echo $readKey['member_role']; ?>
                                            </td>

                                            <td><img src="<?php echo $readKey['member_photo']; ?>" width="100px"
                                                    height="100px" style="border-radius: 55px;"></td>

                                            <td>
                                                <?php echo $readKey['member_about']; ?>
                                            </td>


                                            <td><button id="edit-user" data-toggle="modal" data-target="#editModal"
                                                    data-id="<?php echo $readKey['member_id']; ?>" type="button"
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
                    <h4 class="modal-title" id="defaultModalLabel">Add A New Member</h4>
                </div>
                <form method="post" enctype="multipart/form-data" action="">
                    <div class="modal-body">
                        <div class="row clearfix">


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="memberName" id="memberName" class="form-control"
                                            placeholder="Member Name" autofocus="false" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" name="memberEmail" id="memberEmail" class="form-control"
                                            placeholder="Email" autofocus="false" required />
                                    </div>
                                    <p id="emailErrorMessage" style="color:red"></p>
                                </div>


                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="memberPhone" id="memberPhone" class="form-control"
                                            placeholder="Member Number" required />
                                    </div>
                                    <p id="phoneErrorMessage" style="color:red"></p>
                                </div>


                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="memberRole" id="memberRole" class="form-control"
                                            placeholder="Member Role" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><b>Select Profile Photo</b></p>
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

                                <div class="form-floating " style="margin-bottom: 20px;">
                                    <label for="floatingTextarea2">Member About</label>
                                    <textarea class="form-control" id="memberAbout" placeholder="About The Member"
                                        style="height: 100px" required></textarea>
                                </div>
                            </div>


                        </div>
                    </div>




                    <div class="modal-footer ">
                        <p id="formErrorMessage" style="color:red"></p>
                        <!-- use ajax to add user: xhr/add-user -->
                        <input type="button" id="add-user" onclick="addUser(this);" class="btn btn-success waves-effect"
                            value="Add Member" data-type="success">
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
                    <h4 class="modal-title" id="defaultModalLabel">Edit Member <span id="editName"></span></h4>
                </div>
                <form method="post" enctype="multipart/form-data" action="">
                    <div class="modal-body">
                        <div class="row clearfix">
                        <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="edit_memberName" id="edit_memberName" class="form-control" placeholder="Member Name" autofocus="false" required />
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" name="edit_memberEmail" id="edit_memberEmail" class="form-control" placeholder="Email" autofocus="false" required />
                                    </div>
                                    <p id="emailErrorMessage" style="color:red"></p> 
                                </div>

                                
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="edit_memberPhone" id="edit_memberPhone" class="form-control" placeholder="Member Number" required />
                                    </div>
                                    <p id="phoneErrorMessage" style="color:red"></p>
                                </div>


                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="edit_memberRole" id="edit_memberRole" class="form-control" placeholder="Member Role" required />
                                    </div>
                                </div>
                            
                                
                                <div class="form-floating " style="margin-bottom: 20px;">
                                    <label for="floatingTextarea2">Member About</label>
                                    <textarea class="form-control" id="edit_memberAbout" placeholder="About The Member" style="height: 100px" required></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer ">
                        <p id="updateErrorMessage" style="color:red"></p>
                        <!-- use ajax to add user: xhr/add-user -->
                        <input type="button" id="update-member" class="btn btn-success waves-effect"
                            value="Update">
                        <input type="button" id="delete-member" class="btn btn-danger waves-effect"
                            value="Delete Member">
                    </div>
                    <input type="hidden" id="edit_member_id" />
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

                var memberName = $("#memberName").val();
                var memberEmail = $("#memberEmail").val();
                var memberPhone = $("#memberPhone").val();
                var memberRole = $("#memberRole").val();
                var memberAbout = $("#memberAbout").val();

                var file = $("#upload-button")[0].files[0];
                var formData = new FormData();
                formData.append('image', file);
                formData.append('memberName', memberName);
                formData.append('memberEmail', memberEmail);
                formData.append('memberPhone', memberPhone);
                formData.append('memberRole', memberRole);
                formData.append('memberAbout', memberAbout);


                if (memberName === "" || memberName === null || memberEmail === "" || memberEmail === null || memberPhone === "" || memberPhone === null || file === "" || file === null || memberRole === "" || memberRole === null || memberAbout === "" || memberAbout === null) {
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
                        url: "xhr/add-worshipMember.php",
                        mimeType: 'multipart/form-data',
                        data: formData,
                        success: function (response) {
                            if (response.successMessage) {
                                // showSuccessMessage ();
                                swal("Success!", response.successMessage  + " Reloading", "success");

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
                var memberID = $(this).data('id');
                console.log(memberID);

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "xhr/edit-harvestWorshipMember.php", 
                    data: { memberID: memberID },
                    success: function (response) {
                        $("#editName").html(response.memberName);   
                        $("#edit_memberName").val(response.memberName);       
                        $("#edit_memberEmail").val(response.memberEmail);
                        $("#edit_memberPhone").val(response.memberPhone);
                        $("#edit_memberRole").val(response.memberRole);
                        $("#edit_memberAbout").val(response.memberAbout);
                        //  $("#edit_email").val(response.email);
                        //  $("#edit_phone").val(response.phone);
                        $("#edit_member_id").val(response.memberID);
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
            $('#update-member').on('click', function () {
                var memberName = $("#edit_memberName").val();
                var memberEmail = $("#edit_memberEmail").val();
                var memberPhone = $("#edit_memberPhone").val();
                var memberRole = $("#edit_memberRole").val();
                var memberAbout = $("#edit_memberAbout").val();
                var memberId = $("#edit_member_id").val(); 
                // var phone = $("#edit_phone").val(); 
                // var userId = $("#edit_user_id").val();
                // var status = $("#status").find(":selected").val();
                
                var formData = new FormData();
                formData.append('memberEmail', memberEmail);
                formData.append('memberName', memberName);
                formData.append('memberPhone', memberPhone);
                formData.append('memberRole', memberRole);
                formData.append('memberAbout', memberAbout);
                formData.append('memberId', memberId);
                // formData.append('phone', phone);
                // formData.append('user_id', userId);
                // formData.append('status', status);

                if (memberEmail === "" || memberEmail === null || memberName === "" || memberName === null || memberPhone === "" || memberPhone === null || memberRole === "" || memberRole === null || memberAbout === "" || memberAbout === null ) {
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
                        url: "xhr/update-harvestMember.php",
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
            $('#delete-member').on('click', function () {

                var memberID = $("#edit_member_id").val();
                var formData = new FormData();
                formData.append('memberID', memberID);
                if (confirm('Are you sure you want to delete this Member?')) {
                    $.ajax({
                        type: "POST",
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",
                        url: "xhr/delete-harvestWorshipMember.php",
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
                    alert('User deletion aborted.');
                }



            });
        });

    </script>


</body>

</html>