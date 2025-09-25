<?php $this->load->view('admin/components/header_css.php'); ?>
<div class="wrapper">

  <?php $this->load->view('admin/components/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('admin/components/sidebar.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <style type="text/css">
    .dataTables_filter{
      text-align: right;
    }
    .paging_simple_numbers {
      text-align: right;
    }
  </style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Site Setting Management
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">  Site Setting Management</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content" style="margin-bottom: 30px;">
       <div class="box">
             <div class="box-header with-border">
            <div class="col-lg-5">
              <h3 class="box-title"> Site Setting Management</h3>
            </div>
            <!-- <div class="col-lg-5 btn-class">
              <a href="<?php echo base_url(); ?>admin/Category/add_category" class="btn btn-flat margin" style="background-color: #605ca8; color: #fff;"><span class="fa fa-plus-circle" ></span> Add Category</a>&nbsp;
              <a href="<?php echo base_url(); ?>admin/Category" class="btn btn-flat margin" style="background-color: #605ca8; color: #fff;"><span class="fa fa-list"></span> Category List</a>&nbsp;
            </div> -->
            <div class="col-lg-7">
              <p style="color: red;"><?php $ms=@$this->session->userdata('message');$this->session->unset_userdata('message') ?></p>
              <?php if ($ms){?>
                <div class='alert alert-success alert-dismissible pull-right' style="margin: 0px; color: #fff !important; ">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-check"></i><?php echo $ms ;?>
                </div>
              <?php }?>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             	<form name="optionForm" role="form" action="<?php echo base_url('Admin/insertSiteSetting'); ?>" method="post" >
<div class="col-md-6">
	<div class="form-group"><label> Contact Email</label>
		<input class="form-control" type="text" name="contact_email" id="contact_email" value="<?php echo $setting->contact_email; ?>" />
	</div>
	<?php echo form_error("coupon_code");?>
</div>

<div class="col-md-6">
	<div class="form-group">
		<div class="form-group"><label> Contact Number</label>
		<input class="form-control" type="text" name="contact_number" id="contact_number" value="<?php echo $setting->contact_phone; ?>"  />
	</div>
	</div>
	<?php echo form_error("contact_email");?>
</div>
<div class="clearfix"></div>
<div class="col-md-6">
	<div class="form-group"><label>Twitter</label>
		 
	<input class="form-control" type="text" name="twitter" id="twitter" value="<?php echo $setting->social_twitter; ?>"   />
	
	
	</div>
	<?php echo form_error("twitter");?>
</div>
<div class="col-md-6">
	<div class="form-group"><label> Facebook:</label>
		<input class="form-control" type="text" name="facebook"  value="<?php echo $setting->social_facebook; ?>"  />
	</div>
	<?php echo form_error("facebook");?>
</div>


<div class="col-md-6">
	<div class="form-group"><label> Google:</label>
		<input class="form-control" type="text" name="google" id="google"  value="<?php echo $setting->social_google; ?>"  />
	</div>
	<?php echo form_error("google");?>
</div>
<div class="col-md-6">
	<div class="form-group"><label> Instagram:</label>
		<input class="form-control" type="text" name="instagram" id="instagram"  value="<?php echo $setting->social_instagram; ?>"  />
	</div>
	<?php echo form_error("google");?>
</div>

<div class="col-md-6">
	<div class="form-group"><label> linkedin:</label>
		<input class="form-control" type="text" name="linkedin" id="linkedin"  value="<?php echo $setting->social_linkedin; ?>"  />
	</div>
	<?php echo form_error("linkedin");?>
</div>
<div class="col-md-6">
	<div class="form-group"><label> YouTube:</label>
		<input class="form-control" type="text" name="youtube" id="youtube"  value="<?php echo $setting->social_youtube; ?>"  />
	</div>
	<?php echo form_error("YouTube");?>
</div>
<div class="col-md-6">
	<div class="form-group"><label> Whatsapp API:</label>
		<input class="form-control" type="text" name="whatsapp_api" id="whatsapp_api"  value="<?php echo $setting->whatsapp_api; ?>"  />
	</div>
	<?php echo form_error("whatsapp_api");?>
</div>
<div class="col-md-6">
	<div class="form-group"><label> Whatsapp Number:</label>
		<input class="form-control" type="text" name="whatsapp_api_number" id="whatsapp_api_number"  value="<?php echo $setting->whatsapp_api_number; ?>"  />
	</div>
	<?php echo form_error("whatsapp_api_number");?>
</div>
<div class="col-md-6" >  
 <div class="form-group"><label> Address</label>
	<textarea name="contact_address" rows="8" class="form-control"  ><?php echo $setting->contact_address; ?></textarea>
	<?php echo form_error("contact_address");?>
 </div> 
</div>
 <div class="col-md-6" >  
 <div class="form-group"><label> Live Chat Code:</label>
	<textarea name="live_chat" rows="8" class="form-control"  ><?php echo $setting->live_chat; ?></textarea>
	<?php echo form_error("live_chat");?>
 </div> 
</div>
 <div class="col-md-12" >  
 <div class="form-group"><label> Google Analytic Code:</label>
	<textarea name="ga_code" rows="8" class="form-control"  ><?php echo $setting->ga_code; ?></textarea>
	<?php echo form_error("ga_code");?>
 </div> 
</div>
 <div class="clearfix"></div>

 <div class="col-md-12" style="text-align: center;">  
	
	<div class="col-md-3"><button type="submit" class="btn btn-info col-md-8">Save</button></div>
 </div>  
 
</form>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>

<?php $this->load->view('admin/components/footer.php'); ?>
<?php $this->load->view('admin/components/footer_js.php'); ?>
