<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('get_menu_details')){

	function get_user_details($role)
	{
		$ci=& get_instance();		
		$menu_id =array();	
		$menu_info=array();

		if($role==1){
			$ci->db->order_by("position", "asc");
			$query=$ci->db->get("lb_menu");
			if($query->num_rows()>0){
				return $query->result();
			}

		}else{
			$query=$ci->db->query("select * from lb_role_menu where user_type_id='$role'");
			$data=$query->result();
			// print_r($data);die();
			foreach($data as $value)
			{
				$menu_id[]=$value->menu_id;
			}

			for($i=0;$i<count($menu_id);$i++)
			{
				$id=$menu_id[$i];
				$query= $ci->db->query("select * from lb_menu where menu_id='$id'");

				$menu_info[]=$query->result();	
			}

			// echo "<pre>";print_r($menu_info);die();
			return $menu_info;
		}		
	}

	function GetMenuForRole($menu_id)
{
  $ci=& get_instance();
  $query=$ci->db->query("SELECT * FROM lb_menu  where parent_id=$menu_id  order by position ");
    
    if($query->num_rows()>0){
    $data=$query->result();
    foreach($data as $row)
    {
      if($row->menu_link !='')
      { ?>
         <li><input type="checkbox" onclick="abc(this.value);" id="<?php echo $row->menu_id; ?>" value="<?php echo $row->menu_id; ?>" name="menu[]"><?php echo $row->menu_name; ?></li>
    <?php }else
      { ?>
        <li><input type="checkbox" onclick="abc(this.value);" id="<?php echo $row->menu_id; ?>" value="<?php echo $row->menu_id; ?>" name="menu[]"><?php echo $row->menu_name; ?>
          <ul >
            <?php 
              $query1=$ci->db->query("SELECT * FROM lb_menu where parent_id='".$row->menu_id."'");
               if($query1->num_rows()>0){
                 $data1=$query1->result();
                 foreach($data1 as $row1)
                 {
                  /********* for one more step
                   *  if($row1->menu_link !='')
                    { ?>
                      <li > <a href="<?php echo base_url(); echo $row1->menu_link ; ?>" ><?php echo $row1->menu_name; ?> </a></li>
                  <?php }else
                    { ?>
                      <li class="dropdown-submenu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $row1->menu_name; ?></a>
                        <ul class="dropdown-menu multi-level">
                          <?php 
                            $query2=CI()->db->query("SELECT * FROM menu_master where parent_id='".$row1->menu_id."'");
                             if($query2->num_rows()>0){
                               $data2=$query2->result();
                               foreach($data2 as $row2)
                               { ?>
                                 <li > <a href="<?php echo base_url(); ?><?php echo $row2->menu_link ; ?>" ><?php echo $row2->menu_name; ?> </a></li>
                              <?php }
                             }
                          ?>
                        </ul>
                      </li>
                  <?php } */
                   ?>
                    <li><input type="checkbox" onclick="abc(this.value);" id="<?php echo $row1->menu_id; ?>" value="<?php echo $row1->menu_id; ?>" name="menu[]"><?php echo $row1->menu_name; ?></li>
                <?php }
               }
            ?>
          </ul>
        </li>
    <?php }
    }
    }
}




function GetMenuForRoleexist($menu_id,$group_id)
{
  $ci=& get_instance();
  $ci->load->model('Admin_Model');
  $exist_menu=$ci->Admin_Model->get_assigned_menu_of_group($group_id);
  //print_r($exist_menu);
  $exist_submenu=array();
              foreach($exist_menu as $menu)
                              {
                                $exist_submenu[]=$menu->menu_id;
                              }

  $query=$ci->db->query("SELECT * FROM lb_menu  where parent_id=$menu_id  order by position ");
    
    if($query->num_rows()>0){
    $data=$query->result();
    foreach($data as $row)
    {
      if($row->menu_link !='')
      { ?>
         <li><input type="checkbox" onclick="abc(this.value);" id="<?php echo $row->menu_id; ?>" value="<?php echo $row->menu_id; ?>" name="menu[]" <?php if( in_array($row->menu_id,$exist_submenu)): ?> checked="checked" <?php endif;  ?>><?php echo $row->menu_name; ?></li>
    <?php }else
      { ?>
        <li><input type="checkbox" onclick="abc(this.value);" id="<?php echo $row->menu_id; ?>" value="<?php echo $row->menu_id; ?>" name="menu[]"><?php echo $row->menu_name; ?>
          <ul >
            <?php 
              $query1=$ci->db->query("SELECT * FROM lb_menu where parent_id='".$row->menu_id."'");
               if($query1->num_rows()>0){
                 $data1=$query1->result();
                 foreach($data1 as $row1)
                 {
                  /********* for one more step
                   *  if($row1->menu_link !='')
                    { ?>
                      <li > <a href="<?php echo base_url(); echo $row1->menu_link ; ?>" ><?php echo $row1->menu_name; ?> </a></li>
                  <?php }else
                    { ?>
                      <li class="dropdown-submenu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $row1->menu_name; ?></a>
                        <ul class="dropdown-menu multi-level">
                          <?php 
                            $query2=CI()->db->query("SELECT * FROM menu_master where parent_id='".$row1->menu_id."'");
                             if($query2->num_rows()>0){
                               $data2=$query2->result();
                               foreach($data2 as $row2)
                               { ?>
                                 <li > <a href="<?php echo base_url(); ?><?php echo $row2->menu_link ; ?>" ><?php echo $row2->menu_name; ?> </a></li>
                              <?php }
                             }
                          ?>
                        </ul>
                      </li>
                  <?php } */
                   ?>
                    <li><input type="checkbox" onclick="abc(this.value);" id="<?php echo $row1->menu_id; ?>" value="<?php echo $row1->menu_id; ?>" name="menu[]"><?php echo $row1->menu_name; ?></li>
                <?php }
               }
            ?>
          </ul>
        </li>
    <?php }
    }
    }
}


}
if(!function_exists('active_link')) {
  function activate_menu($controller) {
  	//echo '<script>alert("hi");</script>';
    // Getting CI class instance.
    $CI = get_instance();
    // Getting router class to active.
    $class = $CI->router->fetch_class();
    return ($class == $controller) ? 'active' : '';
  }
}


function get_page_list()
  {
    $ci=& get_instance();   
     
      $query=$ci->db->query("select * from mvs_pages where parent_id=0 and is_menu=1 ORDER BY position ASC");
       //$ci->db->order_by("position", "asc");
      if($query->num_rows()>0){
        return $query->result();
      }

   
  }


  function GetSubMenu($menu_id)
    {
      $ci=& get_instance(); 
      $query=$ci->db->query("SELECT * FROM mvs_pages where parent_id='".$menu_id."'");
        
        if($query->num_rows()>0){
        $data=$query->result();
        $count=0;
        foreach($data as $row)
        {
          $final_page_url = rawurlencode(str_replace(' ', '-', strtolower($row ->page_name)));
          
          if($row->url !='')
          { 
            if($count>=4){
              echo "<li class='single-mega-menu' style='border-bottom:1px solid #eee;'>";
              echo " <a href= '".base_url().''.$final_page_url."' > $row->page_name  </a>";
              echo "</li>";
            }else{
            ?>
            
             <a href="<?php echo base_url(); echo $final_page_url;?>" ><?php echo $row->page_name; ?> </a>
           
              <?php } ?> 
        <?php $count++;


         }else{
          ?>
            <li class="single-mega-menu"> <a href="#"><?php echo $row->page_name; ?></a>
              <ul class="mega-menu-dropdown2">
                <?php 
                  $query1=$ci->db->query("SELECT * FROM mvs_pages where parent_id='".$row->id."'");
                   if($query1->num_rows()>0){
                     $data1=$query1->result();
                     foreach($data1 as $row1)
                     {
                      /********* for one more step
                       *  if($row1->menu_link !='')
                        { ?>
                          <li > <a href="<?php echo base_url(); echo $row1->menu_link ; ?>" ><?php echo $row1->menu_name; ?> </a></li>
                      <?php }else
                        { ?>
                          <li class="dropdown-submenu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $row1->menu_name; ?></a>
                            <ul class="dropdown-menu multi-level">
                              <?php 
                                $query2=CI()->db->query("SELECT * FROM menu_master where parent_id='".$row1->menu_id."'");
                                 if($query2->num_rows()>0){
                                   $data2=$query2->result();
                                   foreach($data2 as $row2)
                                   { ?>
                                     <li > <a href="<?php echo base_url(); ?><?php echo $row2->menu_link ; ?>" ><?php echo $row2->menu_name; ?> </a></li>
                                  <?php }
                                 }
                              ?>
                            </ul>
                          </li>
                      <?php } */
                       ?>
                       <li > <a href="<?php echo base_url(); ?><?php echo 'index.php/'.$row1->url ; ?>" ><?php echo $row1->page_name; ?> </a></li>
                    <?php }
                   }
                ?>
              </ul>
            </li>
        <?php }
        }
        }else{
            return json_encode(array('error'=>'invalid thngbox appid!'));
        }
    }



?>