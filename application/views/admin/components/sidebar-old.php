<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>admin_assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
           
          <p>Mr. <?php echo $adminData->first_name.' '.$adminData->last_name; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->




        
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
         <li><a href="<?php echo base_url(); ?>Admin/Dashboard"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
         <li><a href="<?php echo base_url(); ?>Admin/userlist"><i class="fa fa-users"></i><span>User List</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i> <span>PDF Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>Admin/categorylist"><i class="fa fa-list"></i>Subject & Chapter List</a></li>
            <li><a href="<?php echo base_url();?>Admin/pdfList"><i class="fa fa-list"></i>PDF List</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i> <span>Menu Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>Admin/menu_management"><i class="fa fa-list"></i>Add Menu</a></li>
            </ul>
        </li>

        
      

        <li><a href="<?php echo base_url(); ?>Admin/pagelist"><i class="fa fa-list"></i><span>Page List</span></a></li>
         
         <li><a href="<?php echo base_url(); ?>Admin/faqList"><i class="fa fa-question-circle"></i><span>FAQ's</span></a></li> 
         <li><a href="<?php echo base_url(); ?>Admin/subscriberList"><i class="fa fa-users"></i><span> Subscriber</span></a></li>
         <li><a href="<?php echo base_url(); ?>Admin/getInquire"><i class="fa fa-list"></i><span>Inquiry Management</span></a></li>
           <li><a href="<?php echo base_url(); ?>Admin/screenshotImages"><i class="fa fa-file-image-o"></i><span> Gallery</span></a></li>
            <li><a href="<?php echo base_url(); ?>Admin/addImages"><i class="fa fa-file-image-o"></i><span> Add Management</span></a></li>


         <li><a href="<?php echo base_url(); ?>Admin/getContactList"><i class="fa fa-support"></i><span> Contact List</span></a></li>


         <li><a href="<?php echo base_url(); ?>Admin/downloadDbManual"><i class="fa fa-database"></i><span>Download Database</span></a></li>

        </ul>
        

    </section>
    <!-- /.sidebar -->
  </aside>