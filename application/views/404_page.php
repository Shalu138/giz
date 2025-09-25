<body class="c-layout-header-fixed c-layout-header-mobile-fixed">
<!-- BEGIN: LAYOUT/HEADERS/HEADER-1 -->
<!-- BEGIN: HEADER -->
 <?php $this->load->view("includes/menu.php"); ?>
<!-- END: HEADER -->
<!-- END: LAYOUT/HEADERS/HEADER-1 -->
<?php $this->load->view("includes/quicksidebar.php"); ?>
<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
    <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->
    <div class="c-content-box c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both c-margin-t-50">
        <div class="container">
            <div class="c-page-title c-pull-left">
                <h3 class="c-font-uppercase c-font-sbold">404 Page Not Found</h3>
            </div>
            <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                <li>
                    <a href="<?php echo base_url(); ?>">Home</a>
                </li>
                <li>/</li>                       
                <li class="c-state_active">404 Page Not Found</li>
            </ul>
        </div>
    </div>
    <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->
    <!-- BEGIN: PAGE CONTENT -->
    <!-- BEGIN: CONTENT/SLIDERS/CLIENT-LOGOS-1 -->
    <div class="c-content-box c-size-md c-bg-white">
        <div class="container">
            <!-- Begin: Testimonals 1 component -->
            <div class="c-content-client-logos-slider-1" data-slider="owl" data-items="5" data-desktop-items="4" data-desktop-small-items="3" data-tablet-items="3" data-mobile-small-items="1" data-auto-play="5000">
                <!-- Begin: Title 1 component -->
                <div class="c-content-title-1">
                    <h3 class="c-center c-font-uppercase c-font-bold c-theme-color">404 Page Not Found</h3>
                    <p style="text-align:center; font-weight: 600;">Ooops, Page not found!</p>
					<div class="c-line-center c-theme-bg"></div>
					<p style="text-align:justify; text-align: center;">
						The page you are looking for either has moved or doesn't exists in this server.Try hitting search!
					</p>
                </div>
                <!-- End-->
				<div style="clear:both; height: 30px;"></div>
				<center>
				<a href="<?php echo base_url(); ?>" type="submit" name="submit" class="btn c-theme-btn btn-lg c-btn-bold c-btn-square"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back To Home</a></center>
            </div>
            <!-- End-->
        </div>
    </div>
    <!-- END: CONTENT/SLIDERS/CLIENT-LOGOS-1 -->
<div style="clear:both; height: 30px;"></div>