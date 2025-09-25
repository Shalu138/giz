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

      .main-menu{
        list-style: none;
        font-weight: 800;
        color: #3c8dbc;
        font-size: 20;
      }

      .c-menu li{
            font-size: 16px;
            color: #333;
            list-style: none;
      }

    </style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Add Group
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Group</li>
      </ol>
    </section>
        <!-- Main content -->
        <section class="content">
         <div class="row">
             
              
              <div class="col-md-12">
                  <div class="box box-info">
                      <div class="box-header with-border">
                          <h3 class="box-title"> <?php //echo $title;?></h3>
                      </div>
                    
                  <div id="userAddEdit">

                    <form action="<?php echo base_url();?>Admin/add_employee_group" method="post" name="Frmgroup" id="Frmgroup" style="margin-bottom:0px;">
                      <div class="row">
                      	<div class="col-md-2">&nbsp;</div>
	                       <div class="col-md-8 box-body">
	                            
	                              
                             
                               <div class="row">
                                  <div class="col-md-12">
                                      <div class="col-md-4">
                                        <label>Employee Group Name
                                        <span class="required">*</span>
                                        </label>
                                      </div>
                                      <div class="form-group inputbox-addon col-md-8">
                                          <input type="text" name="employee_group" id="employee_group" class="form-control">
                                      </div>
                                  </div>
                               </div>
                                
	                             <hr>
                               <h3>Assign Permissions</h3>
                              
                  <?php if($menu_data !=''){ foreach($menu_data as $row): 
           if($row->menu_link !=''){ ?>
                     <!--  <li><input type="checkbox" onclick="abc(this.value);" id="<?php echo $row->menu_id; ?>" value="<?php echo $row->menu_id; ?>" name="menu[]"><?php echo $row->menu_name; ?></li> -->
                        <?php }else{ ?>
              <li class="main-menu"><input type="checkbox" onclick="abc(this.value);" id="<?php echo $row->menu_id; ?>" value="<?php echo $row->menu_id; ?>" name="menu[]"><?php echo $row->menu_name; ?>
                <ul class="c-menu">
                  <?php echo GetMenuForRole($row->menu_id); ?>
                </ul>
              </li>
              <?php } endforeach; } ?>                                 
                               <hr>
	                              
	                             
	                              <div class="row">
	                                <div class="col-md-12">
	                                	<div class="form-group col-md-4">&nbsp;
	                                	</div>
	                                    <div class="form-group col-md-5">
										    <input type="checkbox" name="status" id="status" disabled="disabled" value="1"  checked >&nbsp; Active
	                                    </div> 
	                                    <div class="form-group col-md-3">
	                                        <button type="submit" class="btn btn-primary btn-sm pull-right btn-block bg-aqua" >Add  Group</button>
	                                    </div>
	                                </div>
	                               
	                             </div>
	                         <span id="userMessage"></span>
                     </div>
                     <div class="col-md-2">&nbsp;</div>
                      </div>
                       </form>
                   </div>
                 
                  </div>
              
               </div>
              
              
              </div>
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


    </div><!-- ./wrapper -->
<script>
  // When the browser is ready...
  $(function() {
       $("#Frmgroup").validate({

        // Specify the validation rules
        rules: {
          employee_group: {
            required: true
            }
           }, 
        // Specify the validation error messages
        messages:{
          employee_group: {
                required: "Please Enter Group Name"
              }
          },      
        submitHandler: function(form) {               
            form.submit();
        }
    });

  });
  
  </script>
  <!-- <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script> -->
<?php $this->load->view('admin/components/footer.php'); ?>
<?php $this->load->view('admin/components/footer_js.php'); ?>


    