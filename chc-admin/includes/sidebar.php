<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="<?php echo $userImage; ?>" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $userName; ?>
                </div>
                <div class="email">
                    <?php  echo "(".$_SESSION['userType'] .")";?>
                </div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <!-- <li><a href="profile.php"><i class="material-icons">person</i>Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="change-password.php"><i class="material-icons">password</i>Change Password</a></li>
                        <li role="separator" class="divider"></li> -->
                        <li><a href="session/session_destroy.php"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="<?php echo basename($_SERVER['PHP_SELF'])==" index.php"?"active":""; ?>">
                    <a href="index.php">
                        <i class="material-icons">home </i>
                        <span>Home</span>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">book</i>
                        <span>Website Management</span>
                    </a>
                    <ul class="ml-menu">

                        <li>
                            <a href="banner.php">Banner</a>
                        </li>

                        <li>
                            <a href="broadcast.php">Broadcast</a>
                        </li>

                        <li>
                            <a href="about-us.php">About Us</a>
                        </li>

                        <li>
                            <a href="gallery.php">Gallery</a>
                        </li>

                        <li>
                            <a href="blog.php">Blog</a>
                        </li>

                        <li>
                            <a href="sermon.php">Sermon</a>
                        </li>


                        <li>
                                    <a href="javascript:void(0);" class="menu-toggle">
                                        <span><b>Event Management</b></span>
                                    </a>

                                    <ul class="ml-menu">

                                        <li>
                                            <a href="event.php">Event</a>
                                        </li>

                                        <li>
                                            <a href="event-speaker.php">Event Spekers</a>
                                        </li>

                                       
                                        

                                    </ul>
                                </li>
                       
                        <li>



                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span><b>Ministries</b></span>
                            </a>

                            <ul class="ml-menu">

                                <li>
                                    <a href="javascript:void(0);" class="menu-toggle">
                                        <span><b>Children Ministry</b></span>
                                    </a>

                                    <ul class="ml-menu">

                                        <!-- <li>
                                            <a href="ministry-details.php"> Ministry Details</a>
                                        </li> -->

                                        <li>
                                            <a href="children-gallery.php">Childrens Gallery</a>
                                        </li>
                                        

                                    </ul>
                                </li>

                                <li>
                                    <a href="usher.php">Usher</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="menu-toggle">
                                        <span><b>Harvest Worship</b></span>
                                    </a>

                                    <ul class="ml-menu">

                                        <!-- <li>
                                            <a href="harvest-worship-details.php">Harvest Worship Details</a>
                                        </li> -->

                                        <li>
                                            <a href="harvest-works.php">Harvest Works</a>
                                        </li>

                                        <li>
                                            <a href="harvest-worshipMembers.php">Harvest Worship Members</a>
                                        </li>
                                        

                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="menu-toggle">
                                        <span><b>Harvest Sports Club</b></span>
                                    </a>

                                    <ul class="ml-menu">

                                        <!-- <li>
                                            <a href="harvest-sports-club-details.php"> Club Details</a>
                                        </li> -->

                                        <li>
                                            <a href="harvest-sports-club-gallery.php">Club Gallery</a>
                                        </li>
                                        

                                    </ul>
                                </li>
                            </ul>
                        </li>



                        <!-- <li>
                            <a href="sermon.php">Sermon</a>
                        </li> -->

                        
                    </ul>


                </li>

                <?php if ($userType=="ADMIN") { ?>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">person</i>
                        <span>User Management</span>
                    </a>
                    <ul class="ml-menu">

                        <li class="<?php echo basename($_SERVER['PHP_SELF'])==" users.php"?"active":""; ?>">
                            <a href="users.php">Users</a>
                        </li>

                        <!-- <li>
                            <a href="pages/ui/alerts.html">Daily Reports</a>
                        </li>
                        <li>
                            <a href="pages/ui/alerts.html">View Daily Reports</a>
                        </li> -->

                    </ul>
                </li>
                <?php } ?>

            </ul>




            <!-- <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">widgets</i>
                            <span>Website Management</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Banners</span>
                                </a>
                               
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>About</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Add About</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">View About</a>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>
                    </li> -->

            <?php if ($userType=="ADMIN") { ?>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">person</i>
                    <span>User Management</span>
                </a>
                <ul class="ml-menu">

                    <li class="<?php echo basename($_SERVER['PHP_SELF'])==" users.php"?"active":""; ?>">
                        <a href="users.php">Users</a>
                    </li>

                    <!-- <li>
                                <a href="pages/ui/alerts.html">Daily Reports</a>
                            </li>
                            <li>
                                <a href="pages/ui/alerts.html">View Daily Reports</a>
                            </li> -->

                </ul>
            </li>
            <?php
                    }
                    ?>
            <!-- <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people</i>
                            <span>Client Management</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php echo basename($_SERVER['PHP_SELF'])=="add-client.php"?"active":""; ?>">
                                <a href="add-client.php">Add Client</a>
                            </li>
                            <li>
                                <a href="pages/ui/alerts.html">View</a>
                            </li>
                            <li>
                                <a href="pages/ui/alerts.html">Previous Projects</a>
                            </li>
                            
                        </ul>
                    </li> -->
            <!-- <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assessment</i>
                            <span>Project Management</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php echo basename($_SERVER['PHP_SELF'])=="add-project.php"?"active":""; ?>">
                                <a href="add-project.php">Add Project</a>
                            </li>
                            <li>
                                <a href="pages/ui/alerts.html">Active Projects</a>
                            </li>
                            <li>
                                <a href="pages/ui/alerts.html">Previous Projects</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="daily-report.php" >
                            <i class="material-icons">book</i>
                            <span>Daily Report</span>
                        </a>
                        
                    </li> -->

            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy;
                <?php echo date("Y") ?> <a href="javascript:void(0);">City Harvest Church</a>.
            </div>
            <div class="version">
                <b>Version: </b> 2.5
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->

</section>