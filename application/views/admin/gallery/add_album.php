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
      <h1>Add Album
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Add Album</li>
      </ol>
    </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
              <div class="col-md-12">
               <div id="listGroup" class="box box-info">
                <div class="box-header with-border">
           
            <div class="col-lg-5 btn-class">
             Add Gallery

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
                   
                   <div class="box-body">
                    <div class="col-md-12">
  <form name="optionForm" role="form" action="<?php echo base_url('Admin/submit_galleryimage'); ?>" method="post" enctype="multipart/form-data" >
      <div class="col-md-12">
      <div class="form-group"><label>Select Images</label>
      <input  type="file" name="userfile[]" id="userfile"  multiple/ required>
      </div>
      </div>
	  <?php $ids=$this->uri->segment(3); ?>
	  <input type="hidden" name="gid" value="<?php echo $ids; ?>">
	  <input type="hidden" name="return_url" value="<?php echo current_url(); ?>">
      <div class="col-md-12">
      <div class="form-group"> 
      <input class="btn-success btn col-md-2" type="submit" name="submit" id="submit" value="Upload Images" />
      </div>
      </div>
      <div class="clear"></div>
      </form>                 </div>
                </div>

                </div>
               </div>


               <div class="col-md-12">
               <div id="listGroup" class="box box-info">
                <div class="box-header with-border">
           
            <div class="col-lg-5 btn-class">
               All Gallery

            </div>
            <div class="col-lg-7">
             
            </div>
            </div>
                   
                   <div class="box-body">
                    <div class="col-md-12">
             <?php
      $getPhoto = $this->Admin_Model->getgallery_details($ids);
     
      $k=0;
      foreach($getPhoto as $photo){
    ?>
      <div class="col-md-2 bg-info" style="margin:15px;">
        <div class="form-group">
           <p>&nbsp;</p>
          <p><img src="<?php echo base_url("uploads/gallery/album")."/".$photo->image_name;?>" class="img-responsive" style="height:110px;"></p>
          <p align="center"><!--<input value="<?php echo base_url("uploads/gallery/album")."/".$photo->image_name;?>">--><a href="<?php echo base_url('Admin/delete_album_photo/'.$photo->image_id); ?>" title="Delete" class="btn btn-danger" onclick="return confirmDelete();"><i class="glyphicon glyphicon-trash icon-white"></i></a></p>
        </div>
      </div>  
    <?php
    $k++;
    if($k%5==0)
    {
      echo '</div><div class="row">';
    }
    
     
      }
    ?>  
                     </div>
                </div>






                </div>
               </div>
              </div>
          </div>

        </section><!-- /.content -->





      </div><!-- /.content-wrapper -->

<?php $this->load->view('admin/components/footer'); ?>
    </div><!-- ./wrapper -->

<script>
      $(function () {      
        $('#example').DataTable();
        //$('#timepicker1').timepicker();
      });
</script>

<?php $this->load->view('admin/components/footer.php'); ?>
<?php $this->load->view('admin/components/footer_js.php'); ?>