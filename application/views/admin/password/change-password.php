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
        Change Password
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Change Password</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content" style="margin-bottom: 30px;">
       <div class="box">
             <div class="box-header with-border">
           
             <div class="col-lg-4 btn-class">
             Change Password
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
              <div class="box-content">
                <div class="row">
                    <form  role="form" action="<?php echo base_url('Admin/changepassworddata');?>" method="post">
                        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                  <label for="Title"> Enter New Password</label>
                  <input type="text" class="form-control" id="pass" placeholder="Enter New Password" name="pass" value="<?php echo set_value('pass'); ?>"> 
                </div>
                <?php echo form_error("pass"); ?>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Title"> Enter Confirm Password</label>
                  <input type="text" class="form-control" id="co_pass" placeholder="Enter Confirm Password" name="co_pass" value="<?php echo set_value('co_pass'); ?>"> 
                </div>
                <?php echo form_error("co_pass"); ?>
              </div>
         
               <div class="col-md-12">
                <div class="row">
                  <div class="col-md-2">
                  <div class="form-group">
                    <label for="Title">&nbsp;</label>
                    <button type="submit" class="form-control btn btn-info">Submit</button>
                  </div>
                </div>
                </div>
              </div>

            </div>
                    </form>
                </div>
            </div>

         </div>
          </div>
  
      <!-- /.row (main row) -->
    </section>

    <!-- /.content -->
  </div>

<?php $this->load->view('admin/components/footer.php'); ?>
<?php $this->load->view('admin/components/footer_js.php'); ?>




