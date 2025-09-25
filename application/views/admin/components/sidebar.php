<?php
$sess_data=$this->session->userdata('login-in');
$role=$sess_data['user_type'];
$admin_id=$sess_data['id'];
// echo $role;
$menu=get_user_details($role); 
 ?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
           <img src="<?php echo base_url();?>admin_assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php if ($adminData->gender == 1) {echo "Mr.";}else{echo "Miss.";}?> <?php echo $adminData->first_name.' '.$adminData->last_name; ?> </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->




        
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
         <li><a href="<?php echo base_url(); ?>Admin/Dashboard"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
         <?php $menu_count=count($menu);
                if($role==1){
                      for($i=0;$i<count($menu);$i++)
                      {
                          $menu_id=$menu[$i]->menu_id;
                          $menu_name=$menu[$i]->menu_name;
                          $menu_parent_id=$menu[$i]->parent_id;
                          $menu_position=$menu[$i]->position;
                          $menu_link=$menu[$i]->menu_link;
                      ?> <li class="treeview"> <?php
                             if($menu_parent_id==0)
                              { ?>

                                 <a href="#">
                                    <i class="fa fa-list"></i>
                                    <span><?php echo $menu_name; ?></span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                  </a>
                             <?php     }?>
                              <ul class="treeview-menu"><?php
                               
                                for($j=0;$j<$menu_count;$j++){
                                   if(($menu_id)==($menu[$j]->parent_id)){                                    
                                                               
                                      if($menu[$j]->menu_link=="#"){
                                          ?><li><a href="<?php echo $menu[$j]->menu_link; ?>"><i class="fa fa-dot-circle-o"></i><?php echo $menu[$j]->menu_name; ?></a></li><?php
                                      }else{
                                          ?><li><a href="<?php echo base_url();?><?php echo $menu[$j]->menu_link; ?>"><i class="fa fa-dot-circle-o"></i><?php echo $menu[$j]->menu_name; ?></a></li><?php
                                      }
                              ?> 
                                                                 
                        <?php     }       
                                
                              
                            } ?>
                           </ul>
                    </li>
                    <?php } 

                }else{
                      for($i=0;$i<count($menu);$i++)
                        {                        
                            $menu_id=$menu[$i][0]->menu_id;
                            $menu_name=$menu[$i][0]->menu_name;
                            $menu_parent_id=$menu[$i][0]->parent_id;
                            $menu_position=$menu[$i][0]->position;
                            $menu_link=$menu[$i][0]->menu_link;
                        ?> <li class="treeview"> <?php
                               if($menu_parent_id==0)
                                { ?>

                                   <a href="#">
                                      <i class="fa fa-list"></i>
                                      <span><?php echo $menu_name; ?></span>
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                              <?php } ?>
                                 <ul class="treeview-menu">
                                <?php
                                  for($j=0;$j<$menu_count;$j++){
                                     if(($menu_id)==($menu[$j][0]->parent_id)){                                                              
                                      if($menu[$j][0]->menu_link=="#"){
                                          ?><li><a href="<?php echo $menu[$j][0]->menu_link; ?>"><i class="fa fa-dot-circle-o"></i><?php echo $menu[$j][0]->menu_name; ?></a></li> <?php
                                      }else{
                                          ?><li><a href="<?php echo base_url();?><?php echo $menu[$j][0]->menu_link; ?>"><i class="fa fa-dot-circle-o"></i><?php echo $menu[$j][0]->menu_name; ?></a></li> <?php
                                      }
                                    ?>
                          	<?php }} ?>
                             </ul>
                      </li>
                      <?php  }
                }  ?>

        </ul>
        

    </section>
    <!-- /.sidebar -->
  </aside>