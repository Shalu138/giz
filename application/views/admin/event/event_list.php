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
      <h1> Event List <small>Control panel</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Event List</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content" style="margin-bottom: 30px;">
       <div class="box">
             <div class="box-header with-border">
           
             <div class="col-lg-4 btn-class">
               <a href="<?php echo base_url(); ?>Admin/add_event" class="btn btn-flat margin" style="background-color: #605ca8; color: #fff;"><span class="fa fa-plus-circle" ></span> Add Event</a>&nbsp;
              <a href="<?php echo base_url(); ?>Admin/event_list" class="btn btn-flat margin" style="background-color: #605ca8; color: #fff;"><span class="fa fa-list"></span> Event List</a>&nbsp;
            </div> 
            <div class="col-lg-4">
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
              
<table id="example1" class="table table-striped table-bordered bootstrap-datatable responsive datatable">
    <thead>
    <tr>
        <th>S.No.</th>
		<th>Event Name</th>
		<th>Event Details</th>
		<th>Address</th>
        <th>Image</th>
        <th>Date</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $count=0;
    if(count($allElement)>0)
    {
        foreach($allElement as $ae) {
            $count++;
    ?>
    <tr>
    	<td style="width: 5%;"><?php echo $count; ?></td>
        <td style="width: 25%;"><?php echo $ae->event_name; ?></td>
        <td style="width: 20%;">
        	<?php if($ae->email !='') { ?>
        	<p><b>Email Id: </b><?php echo $ae->email; ?></p>
        	<?php } if($ae->phone_no !='') { ?>
        	<p><b>Mobile No: </b><?php echo $ae->phone_no; ?></p>
        	<?php } ?>
        </td>
        <td style="width: 20%;"><?php echo $ae->address; ?></td>
		<?php if($ae->images) { ?>
		  <td class="center"><img src="<?php echo base_url('uploads/event')."/".$ae->images; ?>" height="50"></td>
		<?php } ?>
        <td class="center" style="width: 20%;">
        	<p><b>Start Date: </b><?php echo date("d F Y",strtotime($ae->start_date)); ?></p>
        	<?php if($ae->end_date !=''){ ?>
        		<p><b>End Date: </b><?php echo date("d F Y",strtotime($ae->end_date)); ?></p>
        	<?php } ?>
        </td>
        <td class="center" style="width: 5%;">
        <?php
        if($ae->status==1){
        ?>
        <p><a href="<?php echo base_url('admin/event_status/'.$ae->event_id.'/0/'); ?>"><span class="label label-success">Active</span></a></p>
        <?php } else { ?>
        <p><a href="<?php echo base_url('admin/event_status/'.$ae->event_id.'/1/'); ?>"><span class="label label-danger">Inactive</span></a></p>
        <?php } ?>
        </td>
        <td style="width: 5%;">     
            <p><a  data-toggle="modal" data-target=".remove-product-modal" class="remove-product" ad-details="<?php echo base_url('admin/event_delete/'.$ae->event_id.'/'); ?>" href="#"><span class="btn btn-danger"><i class="glyphicon glyphicon-trash icon-white"></i></span></a></p>
            <p><a href="<?php echo base_url('admin/edit_event/'.$ae->event_id.'/'); ?>" ><span class="btn btn-info"><i class="glyphicon glyphicon-edit icon-white"></i></span></a></p>
        </td>
    </tr>
    <?php } } ?>
    </tbody>
  </table>
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
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<div class="modal fade remove-product-modal" id="" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content pop-up-bg-color" style="background-color: #00a7d0;border-color: #00a7d0;color: white;border-radius: 0;">
        <div class="modal-header" style="padding: 0px 13px;border-bottom: 1px solid #e5e5e5;">
        	<h3 style="color:white; font-size: 26px;">Event</h3>
            <button type="button" class="close" data-dismiss="modal" style="margin-top: -37px; color: white;opacity: 1;"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <div class="modal-body" style="background-color: #00c0ef;">
        <div class="row">
          <p class="text-center" style="font-size: 15px;font-weight: 500;color:white;">Do you really want to remove this Event.</p>
        </div>
       </div> 
       <div class="modal-footer">
            <a class="btn btn-primary btn-sm pull-left" href="#" data-dismiss="modal" style="color:white;border:1px solid white;background: transparent;">No</a>
            <a class="btn btn-primary btn-sm pull-right remove-this-product-orginal" style="border:1px solid white;background: transparent;" href="#">Yes</a>
        </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
      $('.remove-product').click(function(){
         var val=$(this).attr('ad-details');
         $('.remove-this-product-orginal').attr('href',val);      
    });    
  });
</script>



