<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <div class="page-wrapper">
        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <div class="page-logo">
                
                        <img src="<?= SITE_URL ?>assets/back/layouts/layout/img/logo.png" alt="logo" class="logo-default"> </a>
                    <div class="menu-toggler sidebar-toggler">
                        <span style="margin-top:15px"></span>
                    </div>
                </div>
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right"><li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                                <img alt="" class="img-circle" src="<?= SITE_URL ?>assets/back/layouts/layout/img/avatar3_small.jpg">
                              
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="<?= SITE_URL ?>admin/profile/">
                                        <i class="icon-user"></i> My Profile </a>
                                </li><li class="divider"> </li><li>
                                    <a href="<?= SITE_URL ?>admin/logout/">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
        <div class="page-container">
            <?php include 'sidebar_view.php'; ?>


            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="<?= SITE_URL ?>">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="<?= SITE_URL ?>admin/languages/"><?=$title?></a>
                                <i class="fa fa-circle"></i>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h1 class="page-title"> <?= $title ?>

                    </h1>
                    <!-- END PAGE TITLE-->
                    <?php
                    if (isset($errors)) {
                        if (is_array($errors)) {
                            $errors = implode("<br>", $errors);
                        }
                        echo return_msg($errors, 'danger');
                    }
                    ?>
                    <?php
                    if (isset($success)) {
                        echo return_msg($success, 'success');
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['error']) && !empty($_SESSION['error']) ) {
                        echo return_msg($_SESSION['error'], 'danger');
                        unset($_SESSION['error']);
                    }
                    if (isset($_SESSION['success']) && !empty($_SESSION['success']) ) {
                        echo return_msg($_SESSION['success'], 'success');
                        unset($_SESSION['success']);
                    }
                    ?>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-red"></i>
                                        <span class="caption-subject bold uppercase"> <?= $title ?></span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="btn-group">
                                            <a id="sample_editable_1_new" class="btn sbold green" href="<?= SITE_URL ?>admin/addlang"> Add Language
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                        <thead>
                                            <tr>

                                                <th> Language shortcode </th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
foreach ($langs as $key => $langobj) {
    ?>
                                                <tr class="odd gradeX">


                                                    <td>
                                                        
                                                        <?=$langobj->lang_shortcode?>
                                                    </td>

                                                    <td>
                                                        <a id="sample_editable_1_new" class="btn sbold green margin-right-5" href="<?= SITE_URL ?>admin/editlang/<?=$langobj->lang_id?>">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a id="" class="btn sbold green" href="<?= SITE_URL ?>admin/deletelang/<?=$langobj->lang_id?>" onclick="return confirm('Are you sure you want to delete this item?');" >
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>


                                                </tr>
<?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->


        </div>
