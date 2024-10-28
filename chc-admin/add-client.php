<?php include("includes/header.php"); ?>
<!-- Bootstrap Select Css -->
<link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<!-- Sweetalert Css -->
<link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
<style>
    #add-user-dummy{
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
                <h2>CLIENT MANAGEMENT</h2>

            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a class="btn btn-primary" href="javascript:void(0);" data-toggle="modal" data-target="#defaultModal">Add New Client</a>
                        </div>
                        <div class="header ">
                            <h2>
                                CLIENT DETAILS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right js-sweetalert">
                                        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#defaultModal">Add New Client</a></li>
                                        
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
                                            <th>Name</th>
                                            <th>Company/Organisation</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Name</th>
                                            <th>Company/Organisation</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        <?php $readUsers = $crud->Read('users',"1"); 
                                        if ($readUsers) {
                                            $n=0;
                                            foreach($readUsers as $readKey){
                                              ?>  
                                        <tr>
                                            <td><?php echo ++$n; ?></td>
                                            <td><?php echo $readKey['name']; ?></td>
                                            <td><?php echo $readKey['surname']; ?></td>
                                            <td><?php echo $readKey['email']; ?></td>
                                            <td><?php echo $readKey['phone']; ?></td>
                                            
                                            <td>
                                                <?php $status = $readKey['status']; 
                                                    if ($status==1) {
                                                        echo '<span class="label label-success">Active</span>';
                                                    } else if ($status==2) {
                                                        echo '<span class="label label-warning">Banned</span>';
                                                    } else if ($status==3) {
                                                        echo '<span class="label label-danger">Left</span>';
                                                    } else {
                                                        echo '<span class="label label-primary">Inactive</span>';
                                                    }
                                                ?>
                                            </td>
                                            <td><button id="edit-user"  data-toggle="modal" data-target="#editModal" data-id="<?php echo $readKey['id']; ?>" type="button" class="btn btn-danger waves-effect edit-user">EDIT</button></td>
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
                    <h4 class="modal-title" id="defaultModalLabel">Add A New Client</h4>
                </div>
                <form method="post" enctype="multipart/form-data" action="">
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="cname" id="cname" class="form-control" placeholder="Client Name" autofocus="false" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="oname" id="oname" class="form-control" placeholder="Comany/Organisation Name" autofocus="false" required />
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" autofocus="false" required />
                                </div>
                                <p id="emailErrorMessage" style="color:red"></p>
                            </div>
                            
                            
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number" required />
                                </div>
                                <p id="phoneErrorMessage" style="color:red"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer ">
                    <p id="formErrorMessage" style="color:red"></p>
                    <!-- use ajax to add user: xhr/add-user -->
                    <input type="button" id="add-user" onclick="addUser(this);" class="btn btn-success waves-effect" value="Add Client" data-type="success">
                    <input type="button" id="add-user-dummy" class="btn btn-success waves-effect" value="Loading. Please Wait...">
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
                                    <input type="text"  id="edit_cname" class="form-control" placeholder="First Name" autofocus="false" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text"  id="edit_oname" class="form-control" placeholder="Last Name" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="email" id="edit_email" class="form-control" placeholder="Email" autofocus="false" required />
                                </div>
                                    <p id="updateEmailErrorMessage" style="color:red"></p>
                            </div>
                            
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_phone" class="form-control" placeholder="Phone Number" required />
                                    <input type="hidden" id="edit_user_id"/>
                                </div>
                                    <p id="updatePhoneErrorMessage" style="color:red"></p>
                            </div>
                            <div class="form-group">
                                <div class="form-line selectStatus">
                                    <select name="status" id="status" class="form-control show-tick" required>
                                        <!-- <option value="" selected disabled>Select User Status</option> -->
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                        <option value="2">Banned</option>
                                        <option value="3">Left</option>
                                    </select>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer ">
                    <p id="updateErrorMessage" style="color:red"></p>
                    <!-- use ajax to add user: xhr/add-user -->
                    <input type="button" id="update-user"  class="btn btn-success waves-effect" value="Update User" >
                    <input type="button" id="delete-user"  class="btn btn-danger waves-effect" value="Delete User" >
                    
                    
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-warning waves-effect" data-dismiss="modal">CLOSE MODAL</button>
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
                chosenImage.setAttribute("src",reader.result);
            }
            fileName.textContent = uploadButton.files[0].name;
        }

    </script>
    <script>


    $(function () {
        $('#add-user').on('click', function () {

            var cname = $("#cname").val();
            var oname = $("#oname").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var formData = new FormData();
            formData.append('cname', cname);
            formData.append('oname', oname);
            formData.append('email', email);
            formData.append('phone', phone);

            if (cname===""||cname===null || oname===""||oname===null || email===""||email===null || phone===""||phone===null ) {
                $("#formErrorMessage").html("Fill all the details to continue...");
                $('#add-user').preventDefault();
            } else {
                function validateEmail($email) {
                  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                  return emailReg.test($email);
                }
                function validateMobile($mobile) {
                  var mobileReg = /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[6789]\d{9}$/gm;
                  return mobileReg.test($mobile);
                }
                if (!validateEmail(email)) {
                    $("#emailErrorMessage").html("Please Enter a valid email address.");
                    $("#email").focus();
                    $('#add-user').preventDefault();
                } else if (!validateMobile(phone)) {
                    $("#phoneErrorMessage").html("Please Enter a valid phone number.");
                    $("#phone").focus();
                    $('#add-user').preventDefault();
                } else {
                    $("#formErrorMessage").html("");
                    $("#emailErrorMessage").html("");
                    $("#phoneErrorMessage").html("");

                    $("#add-user").css("display","none");
                    $("#add-user-dummy").css("display","inline-block");

                    $.ajax({

                        type: "POST", 
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json", 
                        url: "xhr/add-client.php",
                        mimeType: 'multipart/form-data',
                        data: formData,
                        success: function(response){
                        if(response.successMessage){
                            // showSuccessMessage ();
                            swal("Success!",response.successMessage+response.emailMessage+" Reloading", "success");
                            
                            setTimeout(function () {
                            window.location.reload();
                            }, 3000);   
                            
                        } else if (response.errorMessage) {
                            swal("Error!", response.errorMessage, "error");
                            $("#add-user-dummy").css("display","none");
                            $("#add-user").css("display","inline-block");
                        }
                        
                        },
                        error: function(error){
                        swal("Error!", "Something went wrong", "error");
                        
                        }
                    });
                }
                
            }
            
        });
    });

    $(function () {
        $('.edit-user').on('click', function () {
        var userID = $(this).data('id');
        $.ajax({
            type: "POST", 
            dataType: "json",
            url: "xhr/edit-user.php",
            data: {userID : userID},
            success: function(response){
                $("#editName").html(response.name+" "+response.surname);
                $("#edit_cname").val(response.name);
                $("#edit_oname").val(response.surname);
                $("#edit_email").val(response.email);
                $("#edit_phone").val(response.phone);
                $("#edit_user_id").val(response.user_id);

                $("div.selectStatus select").val(response.status).change();

                console.log(response.status);
            },
            error: function(error){
            swal("Error!", "Something went wrong", "error");
            
            }
        });
        });
    });


    $(function () {
        $('#update-user').on('click', function () {
            var cname = $("#edit_cname").val();
            var oname = $("#edit_oname").val();
            var email = $("#edit_email").val();
            var phone = $("#edit_phone").val();
            var userId = $("#edit_user_id").val();
            var status = $("#status").find(":selected").val();
            var formData = new FormData();
            formData.append('cname', cname);
            formData.append('oname', oname);
            formData.append('email', email);
            formData.append('phone', phone);
            formData.append('user_id', userId);
            formData.append('status', status);

            if (cname===""||cname===null || oname===""||oname===null || email===""||email===null || phone===""||phone===null ||status===""||status===null ) {
                $("#updateErrorMessage").html("Fill all the details to continue...");
                $('#add-user').preventDefault();
            } else {
                function validateEmail($email) {
                  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                  return emailReg.test($email);
                }
                function validateMobile($mobile) {
                  var mobileReg = /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[6789]\d{9}$/gm;
                  return mobileReg.test($mobile);
                }
                if (!validateEmail(email)) {
                    $("#updateEmailErrorMessage").html("Please Enter a valid email address.");
                    $("#email").focus();
                    $('#add-user').preventDefault();
                } else if (!validateMobile(phone)) {
                    $("#updatePhoneErrorMessage").html("Please Enter a valid phone number.");
                    $("#phone").focus();
                    $('#add-user').preventDefault();
                } else {
                    $("#formErrorMessage").html("");
                    $("#emailErrorMessage").html("");
                    $("#phoneErrorMessage").html("");
                    $.ajax({
                        type: "POST", 
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json", 
                        url: "xhr/update-user.php",
                        data: formData,
                        success: function(response){
                        if(response.successMessage){
                            // showSuccessMessage ();
                            swal("Success!",response.successMessage+" Reloading", "success");
                            
                            setTimeout(function () {
                            window.location.reload();
                            }, 3000);   
                            
                        } else if (response.errorMessage) {
                            swal("Error!", response.errorMessage, "error");
                        }
                        
                        },
                        error: function(error){
                        swal("Error!", "Something went wrong", "error");
                        
                        }
                    });
                }
                
            }
            
        });
    });

    $(function () {
        $('#delete-user').on('click', function () {
            
            var userId = $("#edit_user_id").val();
            var formData = new FormData();
            formData.append('user_id', userId);
            if (confirm('Are you sure you want to delete this user?')) {
                $.ajax({
                    type: "POST", 
                    processData: false,
                    contentType: false,
                    cache: false,
                    dataType: "json", 
                    url: "xhr/delete-user.php",
                    data: formData,
                    success: function(response){
                    if(response.successMessage){
                        // showSuccessMessage ();
                        swal("Success!",response.successMessage+" Reloading", "success");
                        
                        setTimeout(function () {
                        window.location.reload();
                        }, 3000);   
                        
                    } else if (response.errorMessage) {
                        swal("Error!", response.errorMessage, "error");
                    }
                    
                    },
                    error: function(error){
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
