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
    .paging_simple_numbers {
      text-align: right;
    }
  </style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Event
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Event</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content" style="margin-bottom: 30px;">
       <div class="box">
             <div class="box-header with-border">
           
             <div class="col-lg-5 btn-class">
              <a href="<?php echo base_url(); ?>Admin/add_event" class="btn btn-flat margin" style="background-color: #605ca8; color: #fff;"><span class="fa fa-plus-circle" ></span> Add Event</a>&nbsp;
              <a href="<?php echo base_url(); ?>Admin/event_list" class="btn btn-flat margin" style="background-color: #605ca8; color: #fff;"><span class="fa fa-list"></span> Event List</a>&nbsp;
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
                    <form name="elementForm" id="leadAddForm" role="form" action="<?php echo base_url('Admin/update_eventdata');?>" method="post" enctype="multipart/form-data">
                     <input type="hidden" name="event_id" value="<?php echo $info->event_id; ?>">
                     <div class="col-md-6">
			             <div class="form-group">
			                  <label for="exampleInputEmail1">Title</label>
			                  <input type="text" class="form-control" placeholder="Enter Title" name="title" value="<?php echo $info->event_name; ?>" required="">
						 </div>
					  </div>
					  <div class="col-md-6">
			              <div class="form-group">
			                  <label for="exampleInputEmail1">Contact Email</label>
			                  <input type="text" class="form-control" placeholder="Enter Contact Email" name="event_email" value="<?php echo $info->email; ?>">
						 </div>
					  </div>
					   <div class="col-md-6">
			              <div class="form-group">
			                  <label for="exampleInputEmail1">Contact Number</label>
			                  <input type="text" class="form-control" placeholder="Enter Contact Number" name="event_contact_no" value="<?php echo $info->phone_no; ?>">
						 </div>
					  </div>
					  <div class="col-md-6">
			              <div class="form-group">
			                  <label for="exampleInputEmail1">Address</label>
			                  <input type="text" class="form-control" placeholder="Enter Address" name="address" value="<?php echo $info->address; ?>" required="">
						 </div>
					  </div>
					  <div class="col-md-6">
			              <div class="form-group">
			                  <label for="exampleInputEmail1"> Start Date</label>
			                  <input type="text" class="form-control datepicker" placeholder="Enter Start Date" name="start_date" value="<?php echo date("m/d/Y",strtotime($info->start_date)); ?>" required>
						 </div>
					  </div>
					  <div class="col-md-6">
			              <div class="form-group">
			                  <label for="exampleInputEmail1"> End Date</label>
			                  <input type="text" class="form-control datepicker" placeholder="Enter End Date" name="end_date" value="<?php echo $info->end_date; ?>">
						 </div>
					  </div>
					  <div class="col-md-12">
						<div class="form-group">
							<label for="exampleInputEmail1">Description</label>
							<textarea class="form-control textarea" id="title" placeholder="Enter Description" name="description"><?php echo $info->description; ?></textarea>
						</div>
					  </div>
					  <div class="col-md-6">
					   <div class="form-group">
						 <label for="exampleInputEmail1">Image</label>
		                 <input type="file" class="form-control" id="image" placeholder="Choose Image" name="image" value="">
		                 <?php if($info->images !=''){ ?>
						  <img src="<?php echo base_url('uploads/event')."/".$info->images; ?>" height="50">
						<?php } ?>
					   </div>
					  </div>
					  <div class="col-md-4">
						   <div class="form-group">
							 <label for="exampleInputFile"> Status</label>
							 <br> Active
							   <input name="status" id="status" value="1" type="radio" <?php if($info->status==1) echo 'checked'; ?> > Inactive
							   <input name="status" id="status" value="0" type="radio" <?php if($info->status==0) echo 'checked'; ?> > 
						   </div>
					   </div>					  
					 <div class="col-md-12">
						<div class="form-group">
							<button type="submit" class="btn btn-info">Update</button>
						</div>
                    </div>
                    </form>
                 <!-- /.row (main row) -->
             </div>
    </section>
    <!-- /.content -->
  </div>

<script type="text/javascript">
  $(function () {
    CKEDITOR.replace('editor1')
    $('.textarea').wysihtml5()
  })
</script>
<?php $this->load->view('admin/components/footer.php'); ?>
<?php $this->load->view('admin/components/footer_js.php'); ?>
<script>
	$(document).ready(function(){
		$("#post_cat").change(function(){
			var getUserID = $(this).val();
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url(); ?>Admin/SubCategory_filter',
				data: {catid:getUserID},
				success: function(data){
					$("#subdata-data").html(data);
				}
			});
		});
	});
</script>