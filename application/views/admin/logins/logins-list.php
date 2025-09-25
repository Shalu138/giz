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
    .mtassing{
      margin-top: 10px; 
    }
  </style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         User Login Data
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> User Login Data</li>
      </ol>
    </section>

  <?php
  $agent_id=$this->input->get('agent_id');
  $searchdate=$this->input->get('searchdate');


  if ($agent_id || $searchdate) {
      $allLogins=$this->Admin_Model->getlogins($agent_id,$searchdate);
  } 
  ?>
  <form action="<?php echo base_url('Admin/stafflogins');?>" method="get"> 
        <!-- Main content -->
        <section class="content">
          <div class="row">
              <div class="col-md-12">
               <div id="listGroup" class="box box-info">
                <div class="box-header with-border">
           
              <div class="col-lg-2">
              <select class="form-control" name="agent_id">
                  <option value="0">Select User</option>
                  <?php 

                  $userslists=$this->Admin_Model->show_user_list();
                  //print_r($userslist);
                  if(count($userslists)>0) {
                    foreach($userslists as $users_lists){
                  ?>
                  <option value="<?php echo $users_lists->id; ?>" <?php if(@$_GET['agent_id']==$users_lists->id) echo 'selected'; ?>><?php echo $users_lists->first_name." ".$users_lists->last_name; ?></option> 
                  <?php } } ?>
                </select>
            </div>
            <div class="col-lg-2">
              <?php $search=$this->input->get('searchdate');?>
              <input type="text" required="" autocomplete="off" value="<?php echo $search ?>" name="searchdate" placeholder="To Date" id="datetimepicker" class="form-control">
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-success">Search Data</button>
            </div>


            <div class="col-lg-5">
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
<table id="example" class="table table-striped table-bordered bootstrap-datatable responsive datatable">
    <thead>
    <tr>
        <th>S.No</th>
        <th>Agent Name</th>
        <th>Agent Type</th>
        <th>Agent Mobile</th>
        <th>Agent Login Time</th>
        <th>Agent Logout Time</th>
        <th>Total Login Time</th>
    </tr>
    </thead>
    <tbody>
  <?php
  $k=0;
  $hoursa=0;
  $minutesa=0;
  if(!empty($allLogins))
  {
    foreach($allLogins as $ae) {
    @$agentdata= $this->Admin_Model->getAgentData($ae->agent_id);
    $k++;
  ?>
    <tr>
     <td class="center">
      <?php echo $k; ?></td>
      <td><?php echo $agentdata->first_name." ".$agentdata->last_name; ?></td>
      <td><?php $userTypeData=$this->Admin_Model->getUserTypeForLogin($agentdata->user_type); echo $userTypeData->user_name; ?></td>
      <td><?php echo $agentdata->phone; ?></td>
      <td><?php echo $ae->login_time; ?></td>
      <td><?php echo $ae->logout_time; ?></td>
      <td>
        <?php
        
$t1 = strtotime($ae->login_time);
$t2 = strtotime($ae->logout_time);
$delta_T = ($t2 - $t1);
$day = round(($delta_T % 604800) / 86400); 
$hours = round((($delta_T % 604800) % 86400) / 3600); 
$minutes = round(((($delta_T % 604800) % 86400) % 3600) / 60); 
$sec = round((((($delta_T % 604800) % 86400) % 3600) % 60));

//echo $day." Days ";
echo $hours." Hours ";
echo $minutes." Minutes ";
//echo $sec." Sec ";
      




$hoursa += round((($delta_T % 604800) % 86400) / 3600); 
$minutesa += round(((($delta_T % 604800) % 86400) % 3600) / 60); 

      ?>
      </td>



    
    </tr>
  <?php  }} ?>
    </tbody>
    <tfoot>
    <tr>
        
        <th scope="col" colspan="6" class="text-right"><?php echo  $searchdate=$this->input->get('searchdate'); ?> Total Working Time</th>
        <th scope="col"> <?php  echo $hoursa." Hours "; echo $minutesa." Minutes "; ?></th>
    </tr>
    </tfoot>
    </table>
                    </div>
                </div>
                </div>
               </div>
              </div>
          </div>

        </section><!-- /.content -->
      </form>
      </div><!-- /.content-wrapper -->

<?php $this->load->view('admin/components/footer'); ?>



    </div><!-- ./wrapper -->

    <script>
      $(function () {      
        $('#example').DataTable();
        //$('#timepicker1').timepicker();
      });
</script>
<script type="text/javascript">
      $('#checkall').change(function(){
        $('.checkitem').prop("checked", $(this).prop("checked"))
      })
    </script>
<?php $this->load->view('admin/components/footer.php'); ?>
<?php $this->load->view('admin/components/footer_js.php'); ?>