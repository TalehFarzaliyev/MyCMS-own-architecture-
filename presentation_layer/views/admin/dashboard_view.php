
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
            <div class="page-content-wrapper">
                <div class="page-content" >

                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span><?= $title ?></span>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title"> <?= $title ?>

                    </h1>
                    <div class="row">
                        <div class="portlet light portlet-fit full-height-content full-height-content-scrollable bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class=" icon-layers font-green"></i>
                                    <span class="caption-subject font-green bold uppercase">CrocuSoft haqqında</span>
                                </div>
                                <div class="actions">
                                    <a class="btn btn-circle btn-icon-only btn-default" target="_blank" href="http://crocusoft.com/">
                                        <i class="icon-cloud-upload"></i>
                                    </a>

                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 331px;"><div class="full-height-content-body" style="height: 331px; overflow: hidden; width: auto;" data-initialized="1">
                                        <p>
                                            CROCUSOFT – 2013 cü ildə yerli bazarda İnnovativ Software həllərin hazırlanması üçün qurulmuş şirkətdir. 

                                            CROCUSOFT müasir texnologiyalardan istifadə edərək Bank sektoru, Loqistika, Dövlət qurumları, Müxtəlif tipli biznes təşkilatları və Startuplar üçün müxtəlif həllər verir.

                                            Şirkət 4 il ərzində Software həllərin verilməsinə fokuslanmış və yalnız bu sahədə 20 dən çox müxtəlif həllər vermişdir.
                                        <p>
                                            <b>Xidmətlər</b>
                                        <p>
                                            Biznes Analiz – Qurumların biznes modellərini analiz edərək biznes axışlarının dokumentlərinin hazırlanması və informasiya texnologiyaları ilə inteqrasiyası.<br>
                                            
                                            Enterprise Həllər – Qurumun biznes məlumatlarının və iş axışlarının vahid sistem şəkildə qurulmasını təmin etmək. Məsələn RFMS, HRM, CRM.<br>
                                            
                                            İT İnfrastrukturun Qurulması – İnformasiya sistemlərinin qurulması. Microsoft həllər, Cisco şəbəkə həlləri. 
                                            
                                            Site & Mobile Tətbiqlər – İnformasiya xarakterli saytların hazırlanması. iOS, Android və Windows Phone əməliyyat sistemləri üçün müxtəlif tətbiqlərin yazılması.
                                        <p>
                                        <p>
                                            <b><a href="http://crocusoft.com/">Ətraflı məlumat üçün</a></b> 
                                        </p>

                                    </div><div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 55.643px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
