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
                                <a href="<?=SITE_URL?>admin/dashboard">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span><?=$title?></span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h1 class="page-title"><?=$title?>
                    </h1>
                    <!-- END PAGE TITLE-->
                    <?php 
                    if(isset($errors) ){ 
                        if(is_array($errors)){
                        $errors = implode("<br>", $errors); 
                        }
                        echo return_msg($errors,'danger'); 
                        
                    }
                    ?>
                    <?php 
                    if(isset($success) ){
                        echo return_msg($success,'success'); 
                        
                    }
                    ?>

                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-user"></i><?=$title?> </div>
                        </div>
                        
                        <div class="portlet-body form">
                            
                            <!-- BEGIN FORM-->
                            <form action="" method="POST" class="form-horizontal">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Language shortcode</label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                
                                                <input type="text" class="form-control" placeholder="Language shortcode" value="<?=$lang?>" name="lang"> </div>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                <div class="form-actions fluid">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green">Submit</button>
                                            <a type="button" href="<?=SITE_URL?>admin/languages" class="btn default">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
       