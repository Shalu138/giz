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
               <div id="listGroup" class="box box-info">
                   <div class="box-body">
                    <div class="col-md-12">
                      <table id="example4" class="table table-bordered table-striped" >
                          <thead>
                            <tr>
                              <th>#</th>
                              <!-- <th>Code</th> -->
                              <th>Group Name</th>
                              <th>Status</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                           <tbody>
                            <?php $i=0; ?>

                          
                            <?php if (!empty($employee_group_data)): foreach ($employee_group_data as $employeegroupdata) : ?>
                            <?php $employeegroupid=$employeegroupdata->id; ?>
                            <tr id="lead_<?php echo $employeegroupid;?>">
                                <td><?php $i++; echo $i; ?></td>
                                <td><?php echo $employeegroupdata->user_name; ?></td>
                                <td><input type="checkbox" disabled="disabled" name="" id="" <?php if($employeegroupdata->status==1){echo 'checked';} ?>></td>

                                <td>
                                <!-- <a href="<?php echo base_url();?>index.php/admin/Customer/customer_detail_page/<?php echo $customersid; ?>" class="badge bg-red"  title="View Customer Detail" ><i class="fa fa-file "></i></a> -->
                                   <a href="#" class="badge bg-aqua" onclick="return EditEmployeeGroup('show_employee_group_edit','<?php echo $employeegroupid;?>')" title="Edit" ><i class="fa fa-edit"></i>
                                   </a>
                                   <?php if($employeegroupdata->status==1){ ?>
                                    <a href="#" class="badge bg-red" onclick="return DeactivateEmployeeGroup(<?php echo $employeegroupid; ?>)" title="De-activate" ><i class="fa fa-ban "></i></a>            <?php }else{ ?>
                                    <a href="#" class="badge bg-green" onclick="return ActivateEmployeeGroup(<?php echo $employeegroupid; ?>)" title="Activate" ><i class="fa fa-check-circle "></i></a>
                                  <?php } ?>
                                    <a href="#" class="badge bg-red" onclick="return DeleteEmployeeGroup(<?php echo $employeegroupid; ?>)" title="Delete" ><i class="fa fa-trash "></i></a>
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

<?php $this->load->view('admin/components/footer'); ?>
    </div><!-- ./wrapper -->
    <link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.css" />
<link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.js"></script>

    <script>
      $(function () {
        $('#example4').DataTable();
        $('#timepicker1').timepicker();
      });
</script>
<script type="text/javascript">

    function EditEmployeeGroup(act,employeegroupid)
    {

      if(act=="show_employee_group_edit")
      {
        window.location="<?php echo base_url();?>Admin/"+act+"/"+employeegroupid;
      }
    }

    function DeleteEmployeeGroup(groupid)
     {
        if (confirm("Are you sure to delete?"))
          {
            // your deletion code
              url = "deleteEmployee";
              $.post(url, {GroupId:groupid},  function (data) {
              alert(data);
              location.reload();
               },"json");
         }
      return false;
    }

    function DeactivateEmployeeGroup(employeegroupid)
     {
        url = "DeactivateEmployeeGroup";
        $.post(url, {employeegroupid:employeegroupid},  function (data) {
        alert(data);
        location.reload();
         },"json");
    }

    function ActivateEmployeeGroup(employeegroupid)
     {
        url = "ActivateEmployeeGroup";
        $.post(url, {employeegroupid:employeegroupid},  function (data) {
        alert(data);
        location.reload();
         },"json");
    }


</script>
<?php $this->load->view('admin/components/footer.php'); ?>
<?php $this->load->view('admin/components/footer_js.php'); ?>
