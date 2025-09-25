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
         Fields Setting Management
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">  Fields Setting Management</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content" style="margin-bottom: 30px;">
       <div class="box">
             <div class="box-header with-border">
            <div class="col-lg-5">
              <h3 class="box-title"> Fields Setting Management</h3>
            </div>
            
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
              <form name="optionForm" role="form" action="<?php echo base_url('Admin/FieldsSiteSetting'); ?>" method="post" >
                <input type="hidden" name="form_id" value="1">
                <?php @$formfields=$this->Admin_Model->getFildsName(1);  //print_r($formfields);?>


                <?php foreach ($formfields as $value) {
                    $box[]=$value->field_name;
                }
                $datas=array_unique($box);?>
                <div class="col-md-3">
                  <div class="form-group">
                    <label> Full Name</label>
                    <input type="checkbox"  name="field_name[]" value="name" <?php if (in_array("name", $datas)) { echo "checked"; }else{ } ?>>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label> Email ID</label>
                    <input type="checkbox" name="field_name[]" value="email" <?php if (in_array("email", $datas)) { echo "checked"; }else{ } ?>>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label> Location</label>
                    <input type="checkbox" name="field_name[]" value="location" <?php if (in_array("location", $datas)) { echo "checked"; }else{ } ?>>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label> Number</label>
                    <input type="checkbox" name="field_name[]" value="number" <?php if (in_array("number", $datas)) { echo "checked"; }else{ } ?>>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label> Occupation</label>
                    <input type="checkbox" name="field_name[]" value="occupation" <?php if (in_array("occupation", $datas)) { echo "checked"; }else{ } ?>>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label> Designation</label>
                    <input type="checkbox" name="field_name[]" value="designation" <?php if (in_array("designation", $datas)) { echo "checked"; }else{ } ?>>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label> Organisation</label>
                    <input type="checkbox" name="field_name[]" value="organisation" <?php if (in_array("organisation", $datas)) { echo "checked"; }else{ } ?>>
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
