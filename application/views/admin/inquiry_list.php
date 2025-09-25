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
      <h1> Inquiry List<small>Control panel</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Inquiry List</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content" style="margin-bottom: 30px;">
       <div class="box">
           <div class="box-header with-border">
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
		<th>Name</th>
        <th>Email</th>
		<th>Mobile No</th>
        <th>Message</th>
        <th>Created</th>
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
        <td><?php echo $count; ?></td>
        <td class="center" style="width: 15%;"><?php echo $ae->contact_name; ?></td>
		<td class="center" style="width: 15%;"><?php echo $ae->contact_email; ?></td>
		<td class="center" style="width: 15%;"><?php echo $ae->contact_phone; ?></td>
		<td class="center" style="width: 30%;"><?php echo $ae->contact_message; ?></td>
        <td class="center" style="width: 15%;"><?php echo date("d-m-Y h:i A",strtotime($ae->contact_created)); ?></td>
        <td style="width: 10%;">    
            <p><a href="<?php echo base_url('admin/inquiry_list_delete/'.$ae->contact_id.'/'); ?>" Onclick="return ConfirmDelete()"><span class="btn btn-danger"><i class="glyphicon glyphicon-trash icon-white"></i></span></a></p>
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





