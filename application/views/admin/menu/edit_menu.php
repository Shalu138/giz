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

  label.error { display: block; float: left; color: red; padding-left: 0.5em; vertical-align: top; }
</style>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      
    <section class="content-header">
      <h1>
       ALL Menus
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">ALL Menus</li>
      </ol>
    </section>

        <!-- Main content -->
        <section class="content">
                

         <div class="row">
             
              
              <div class="col-md-12">
                  <div class="box box-info">
                    <div class="box-header with-border">
           
             <div class="col-lg-5 btn-class">
              <a href="<?php echo base_url(); ?>Admin/menu_management" class="btn btn-flat margin" style="background-color: #605ca8; color: #fff;"><span class="fa fa-plus-circle" ></span> All Menu</a>&nbsp;
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
                   
                  <div id="userAddEdit">

                      <form action="<?php echo base_url(); ?>Admin/edit_menu" method="post" name="Frmgroup" id="Frmgroup" style="margin-bottom:0px;">
                      <div class="row">
                        <div class="col-md-2">&nbsp;</div>
                         <div class="col-md-8 box-body">
                               <div class="row">
                                  <div class="col-md-12">
                                      <div class="col-md-4">
                                        <label>Menu Name
                                        <span class="required">*</span>
                                        </label>
                                      </div>
                                      <div class="form-group col-md-8">
                                          <input type="text" name="menu_name" id="menu_name" class="form-control" value="<?php echo $menus[0]->menu_name;  ?>" />
                                          <input type="hidden" name="menu_id" id="menu_id" class="form-control" value="<?php echo $menus[0]->menu_id;  ?>"
                                      </div>
                                  </div>
                               </div>
                               <div class="row">
                                  <div class="col-md-12">
                                      <div class="col-md-4">
                                        <label>Menu link
                                        <span class="required">*</span>
                                        </label>
                                      </div>
                                      <div class="form-group col-md-8">
                                          <input type="text" name="menu_link" id="menu_link" class="form-control" value="<?php echo $menus[0]->menu_link;  ?>"/>
                                      </div>
                                  </div>
                               </div>
                               <div class="row">
                                  <div class="col-md-12">
                                      <div class="col-md-4">
                                        <label>Parent Menu
                                        <span class="required">*</span>
                                        </label>
                                      </div>
                                      <div class="form-group col-md-8">
                                          <select class="select2 form-control" id="parent_menu" name="parent_menu" data-placeholder="Select User">
                                          <option value="0">Not</option>
                                        
                                          <?php  foreach($menuslist as $list):  ?>
                                          	<?php if($list->parent_id==0): ?>

                                           <option value="<?php echo $list->menu_id; ?>" <?php echo ($menus[0]->parent_id==$list->menu_id)?"selected":""; ?>><?php echo $list->menu_name; ?></option>
                                           <?php endif; ?>                                          
                                         <?php  endforeach; ?>
                                         </select>
                                      </div>
                                  </div>
                               </div>
                                <div class="row">
                                  <div class="col-md-12">
                                      <div class="col-md-4">
                                        <label>Position
                                        <span class="required">*</span>
                                        </label>
                                      </div>
                                      <div class="form-group col-md-8">
                                          <input type="text" name="position" id="position" class="form-control" value="<?php echo $menus[0]->position;  ?>"/>
                                      </div>
                                  </div>
                               </div>
                               
                             <!--   <div class="row">
                                  <div class="col-md-12">
                                      <div class="col-md-4">
                                        <label>Role Name
                                        <span class="required">*</span>
                                        </label>
                                      </div>
                                      <div class="form-group col-md-8">
                                          <select class="select2 form-control" id="role_name" name="role_name" data-placeholder="Select User">
                                         
                                          <?php  foreach($role_data as $role):  ?>
                                           <option value="<?php echo $role->id; ?>" <?php echo ($menus[0]->role_id==$role->id)?"selected":""; ?>><?php echo $role->role_name; ?></option>                                          
                                         <?php  endforeach; ?>
                                         </select>
                                      </div>
                                  </div>
                               </div> -->
                             
                                <div class="row">
                                  <div class="col-md-12">
                                      <div class="col-md-4">
                                       &nbsp;
                                      </div>
                                      
                                      <div class="form-group col-md-8">
                                          <button type="submit" class="btn btn-primary btn-sm pull-right btn-block bg-aqua" >Update Menu</button>
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

<script type="text/javascript">

   $(function(){
      $("#Frmgroup").validate({

         rules:{
              menu_name: {
                  required:true
              }

              
              
         },
         messages: {
               menu_name: {
                  required:"Enter Menu name"
              }
              
         },
         submitHandler:function(form){
            form.submit();
          
         }
      });
   });
</script>


<?php $this->load->view('admin/components/footer.php'); ?>
<?php $this->load->view('admin/components/footer_js.php'); ?>






    