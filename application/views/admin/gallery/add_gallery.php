<?php $this->load->view('admin/components/header_css'); ?>
<div class="wrapper">
  <?php $this->load->view('admin/components/header'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('admin/components/sidebar'); ?>
  <!-- Content Wrapper. Contains page content -->
  <style type="text/css">
    .dataTables_filter{
      text-align: right;
    }
    .paging_simple_numbers{
      text-align: right;
    }
  </style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Add Gallery<small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Gallery</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content" style="margin-bottom: 30px;">
       <div class="box">
             <div class="box-header with-border">
             <div class="col-lg-5 btn-class">
              <a href="<?php echo base_url(); ?>Admin/add_gallery" class="btn btn-flat margin" style="background-color: #605ca8; color: #fff;"><span class="fa fa-plus-circle" ></span> Add Gallery</a>&nbsp;
              <a href="<?php echo base_url(); ?>Admin/gallery_list" class="btn btn-flat margin" style="background-color: #605ca8; color: #fff;"><span class="fa fa-list"></span> Gallery List</a>&nbsp;
            </div> 
             <div class="col-lg-7">
              <p style="color: red;"><?php $ms=@$this->session->userdata('message');$this->session->unset_userdata('message'); ?></p>
              <?php if ($ms){?>
                <div class='alert alert-success alert-dismissible pull-right' style="margin: 0px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-check"></i><?php echo $ms ;?>
                </div>
              <?php }?>
            </div>
            </div>
            <!-- /.box-header -->
              <div class="box-body">
                    <form name="elementForm" id="leadAddForm" role="form" action="<?php echo base_url(); ?>Admin/add_gallerydata" method="post" enctype="multipart/form-data">
		              <div class="col-md-6">
			             <div class="form-group">
			                  <label for="exampleInputEmail1">Title</label>
			                  <input type="text" class="form-control" placeholder="Enter Title" name="title" value="" required="">
						 </div>
					  </div>
					  <div class="col-md-6">
			              <div class="form-group">
			                  <label for="exampleInputEmail1">Location</label>
			                  <input type="text" class="form-control" placeholder="Enter Location" name="location" value="">
						 </div>
					  </div>
					  <div class="col-md-4">
			              <div class="form-group">
			                  <label for="exampleInputEmail1">Date</label>
			                   <input type="text" class="form-control datepicker" placeholder="Enter Date" name="date" value="" required>
						 </div>
					  </div>
					  <div class="col-md-4">
					   <div class="form-group">
						 <label for="exampleInputEmail1">Image</label>
		                 <input type="file"  id="image" placeholder="Choose Image" name="image" value="" required>
					   </div>
					  </div>
					  <div class="col-md-4">
						   <div class="form-group">
							 <label for="exampleInputFile"> Status</label>
							 <br> Active
							   <input name="status" id="status" value="1" type="radio" checked> Inactive
							   <input name="status" id="status" value="0" type="radio"> 
						   </div>
					   </div>
					 <div class="col-md-12">
						<div class="form-group">
							<button type="submit" class="btn btn-info">Submit</button>
						</div>
                    </div>
                    </form>
                 <!-- /.row (main row) -->
             </div>
    </section>
    <!-- /.content -->
  </div>
<?php $this->load->view('admin/components/footer.php'); ?>
<?php $this->load->view('admin/components/footer_js.php'); ?>