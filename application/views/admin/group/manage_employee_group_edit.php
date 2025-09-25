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

                    <form action="<?php echo base_url();?>Admin/edit_employee_group" method="post" name="Frmgroup" id="Frmgroup" style="margin-bottom:0px;">
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
                                          <input type="text" name="employee_group" id="employee_group" value="<?php echo $employee_group_detail->user_name; ?>" class="form-control" />
                                          <input type="hidden" name="employee_group_id" id="employee_group_id" value="<?php  echo $employee_group_detail->id; ?>">
                                      </div>
                                  </div>
                               </div>
                                
	                             <hr>
                               <h3>Assign Permissions</h3>

                              <?php
                              if($exist_menu_of_group !='')
                              {
                              $exist_menu=array();
                              $group_id=$exist_menu_of_group[0]->user_type_id;
                              
                              foreach($exist_menu_of_group as $menu)
                              {
                                $exist_menu[]=$menu->menu_id;
                              }
                             }
                            
                                ?>                                
                                         <?php if($menu_data !=''){ foreach($menu_data as $row): 
           if($row->menu_link !=''){ ?>
                     <!--  <li><input type="checkbox" onclick="abc(this.value);" id="<?php echo $row->menu_id; ?>" value="<?php echo $row->menu_id; ?>" name="menu[]"><?php echo $row->menu_name; ?></li> -->
                        <?php }else{ ?>
              <li class="main-menu"><input type="checkbox" onclick="abc(this.value);" id="<?php echo $row->menu_id; ?>" value="<?php echo $row->menu_id; ?>" name="menu[]" <?php if(!empty($exist_menu) && in_array($row->menu_id,$exist_menu)): ?> checked="checked" <?php endif;  ?>><?php echo $row->menu_name; ?>
                <ul class="c-menu">
                <?php if(!empty($group_id)){  
                 echo GetMenuForRoleexist($row->menu_id,$group_id);
                   }
                 else{
                  echo GetMenuForRole($row->menu_id);
                  }  ?>
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
	                                        <button type="submit" class="btn btn-primary btn-sm pull-right btn-block bg-aqua" >Update Group Detail</button>
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

    <style type="text/css">
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