<?php $this->load->View('admin/components/header_css'); ?>
<div class="wrapper">
 <?php 
  	$this->load->View('admin/components/header');
  	$this->load->View('admin/components/sidebar');
 ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Dashboard<small><!--Control panel--></small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
	<style type="text/css">
		.class-for-list{
		  text-align: center;
		  color: #fff;
		}
		.class-for-list > a{
		  text-align: center;
		  color: #fff;
		}
	</style>
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-12">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Event</span>
              <?php $event=$this->Admin_Model->event_list(); ?>
              <span class="info-box-number"><?php print_r(count($event)); ?></span>
              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description class-for-list"><a href="<?php echo base_url(); ?>Admin/event_list">Go List</a></span>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Media </span>
              <?php $media=$this->Admin_Model->media_list(); ?>
              <span class="info-box-number"><?php print_r(count($media)); ?></span>
              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description class-for-list"><a href="<?php echo base_url(); ?>Admin/media_list">Go List</a></span>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
            <div class="info-box-content">
            	<?php $inquery=$this->Admin_Model->getgallerycount(); ?>
              <span class="info-box-text">Total Gallery</span>
              <span class="info-box-number"><?php print_r($inquery); ?></span>
              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description class-for-list"><a href="<?php echo base_url(); ?>Admin/gallery_list">Go List</a></span>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
            <div class="info-box-content">
            	<?php $inquery=$this->Admin_Model->getContactQuery(); ?>
              <span class="info-box-text">Total Inquiry</span>
              <span class="info-box-number"><?php print_r(count($inquery)); ?></span>
              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description class-for-list"><a href="<?php echo base_url(); ?>Admin/ContactQuery">Go List</a></span>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
       <div class="row">
        <div class="col-md-12">
        </div>
      </div>
      <div class="row">
      </div>
    </section>
  </div>
<?php
 $this->load->View('admin/components/footer');
 $this->load->View('admin/components/footer_js');
?>