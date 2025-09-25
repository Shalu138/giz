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
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo "Menu List";?>  <!--<a href="User">Add Users</a>-->
           <!--  <small>Version 2.0</small> -->
          </h1>
         <!--  <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
        </section>
        <!-- Main content -->
        <section class="content">
        <div class="row">
         <form class="form-horizontal" action="<?php echo base_url();?>Admin/add_menu" method="post" name="Frmgroup" id="Frmgroup">
        <div class="col-md-12">
              <div class="col-sm-3">
        <label for="cname" class="control-label">Menu Name&nbsp;<span class="required">*</span></label>
                <input type="text" class="form-control" id="menu_name" name="menu_name" required>
              </div>

               <div class="col-sm-3">
              <label for="location" class="control-label">Parent Menu</label>
               <select id="parent_menu" class="form-control" name="parent_menu">
             <option value="0">Not</option>
           <?php if($menus !=''){ foreach($menus as $row): ?>
                      <option value="<?php echo $row->menu_id; ?>"><?php echo $row->menu_name; ?></option>
                        <?php endforeach; } ?>
       </select>
              </div>
            <div class="col-sm-3
            ">
            <label for="hname" class="control-label">Position</label>
                <input type="number" value="0" class="form-control" id="position" name="position" >
              </div>
            <div class="col-sm-3">
            <label for="hname" class="control-label">Link</label>
                <input type="text" class="form-control" id="link" name="link">
              </div>
              <!--  <div class="col-sm-2">
            <label for="hname" class="control-label">Role</label>
                <select name="role" class="form-control">
                  <option value="">Select Role</option>
                 <?php foreach($role_data as $role):?>
                   <option value="<?php echo $role->id ; ?>"><?php echo $role->user_name;  ?></option>
                 <?php  endforeach;?>

                </select>
              </div> -->
          
        </div>
        <div class="col-md-6 offset-3">
        
          
            
             <button type="submit" class="btn btn-info btn-save pull-right " style="width:100;margin-top: 10px; margin-left:40px;margin-bottom: 5px;text-align: center;">Save</button>
              
             
         </div>
         </form>
          
        </div>
         
          <div class="row">
              <div class="col-md-12">
               <div id="listGroup" class="box box-info">
                   <div class="box-body">

                    <div class="col-md-12">
                      <table id="example4" class="table table-bordered table-striped" >
                          <thead>
                            <tr>
                              <th>#</th>
                              <!-- <th>Code</th> -->
                            
                              <th>Menu Name</th>
                              <th>Menu Link</th>
                              <th>Parent Menu</th>
                              <th>Position</th>
                              
                               <th>Action</th>
                            </tr>
                          </thead>
                           <tbody>
                           <?php $i=0;?>
                            <?php if (!empty($menus)): foreach ($menus as $menulist) : ?>
                             <?php $menuid=$menulist->menu_id; ?>
                             <tr id="menu_<?php echo $menuid;?>">
                               <td><?php $i++; echo $i; ?></td>
                              
                                 
                               </td>
                               <td><?php echo $menulist->menu_name;?></td>
                                <td><?php echo $menulist->menu_link;?></td>
                               <td><?php echo $menulist->parent_id;?></td>
                               <td><?php echo $menulist->position;?></td>
                                                    
                             
                               <td>
                                  
                                   <a href="#" class="badge bg-aqua" onclick="Editmenu('edit_menu_page','<?php echo $menuid;?>')" title="Edit" ><i class="fa fa-edit"></i></a>


                                  <a href="#" class="badge bg-red" onclick="return Deletemenu(<?php echo $menuid; ?>)" title="Delete" ><i class="fa fa-trash "></i></a>
                               </td>
                            </tr>
                            <?php  endforeach;?>
                            
                            <?php endif; ?>
                          </tbody>
                        </table> 
                    </div>

                </div>
                </div>
               </div>
              </div>           
          </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


    </div><!-- ./wrapper -->
    <script>
      $(function () {      
        $('#example4').DataTable();
      });
</script>

<script type="text/javascript">

   $(function(){
      $("#Frmgroup").validate({

         rules:{
              menu_name: {
                  required:true
              },
              parent_menu: {
                required:true 
              },
              position:{
                required:true
              },
               role:{
                required:true
              }
             
              
             
         },
         messages: {
               menu_name: {
                  required:"Enter Menu name"
              },
              parent_menu: {
                required:"Select Parent Menu" 
              },
             position: {
                required:"Enter Menu Position" 
              },
               role: {
                required:"Please Select A Role" 
              }
             
         },
         submitHandler:function(form){
            form.submit();
          
         }
      });
   });
</script>
<script type="text/javascript">

    function Editmenu(act,userid)
    {
      if(act=="edit_menu_page")
      {
        window.location="<?php echo base_url();?>Admin/"+act+"/"+userid;
      }
    } 

     function BanUser(userid) 
     {
        if (confirm("Are you sure to Deactivate User?")) 
          {
              url = "banUser";
              $.post(url, {userId:userid},  function (data) {
              alert(data);
              location.reload();
               },"json");
         }
      return false;
    } 
    function ActiveUser(userid) 
    {      
        url = "activateUser";
        $.post(url, {userId:userid},  function (data) {
        alert(data);
        location.reload();
         },"json");
    }

    function Deletemenu(menuid) 
     {      
        if (confirm("Are you sure to delete?")) 
          { 
            // your deletion code
              url = "delete_menu";
              $.post(url, {menuId:menuid},  function (data) {
              alert(data);
              location.reload();
               },"json");
         }
      return false;
    }
    
</script>
<?php $this->load->view('admin/components/footer.php'); ?>
<?php $this->load->view('admin/components/footer_js.php'); ?>