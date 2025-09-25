<style type="text/css">
  .aforlogintype{
    height: 50px;
    line-height: 40px !important;
    color: #fff !important;
    background: #00a65a !important;
  }
  .aforlogintype:hover{
    height: 50px;
    line-height: 40px !important;
    color: #fff !important;
    background: #009551 !important;
  }
</style>
<header class="main-header">
    <a href="#" class="logo">
      <span class="logo-mini"><b></b></span>
      <span class="logo-lg"><b><?php echo $adminData->logo_name_url; ?></b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle Navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <?php $admin_session=$this->session->userdata('login-in'); ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <img src="<?php echo base_url();?>admin_assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php if ($adminData->gender == 1) {echo "Mr.";}else{echo "Mrs.";}?> <?php echo $adminData->first_name.' '.$adminData->last_name; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url();?>admin_assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p>
                  <?php if ($adminData->gender == 1) {echo "Mr.";}else{echo "Miss.";}?> <?php echo $adminData->first_name.' '.$adminData->last_name; ?> - 
				  <?php if($adminData->user_type == 1){
					echo "Super Admin";
				  }else if($adminData->user_type == 2){
					 echo "Admin";
				  }else if($adminData->user_type == 3){
					 echo "Agent";
				  }else if($adminData->user_type == 4){
					 echo "Digital";
				  }else{
					echo "";
				  }?>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url('Admin/changepassword'); ?>" class="btn btn-default btn-flat">Password</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>Admin/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>