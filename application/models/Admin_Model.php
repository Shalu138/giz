<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Model extends CI_Model{
	
	public function getblog()
	{
		$db2 = $this->load->database('blogs', TRUE);  
	//	$query=$db2->query("SELECT * FROM wp_posts wp INNER JOIN wp_postmeta wpm ON (wp.ID = wpm.post_id AND wpm.meta_key = '_thumbnail_id')
   // INNER JOIN wp_postmeta wpm2 ON (wpm.meta_value = wpm2.post_id AND wpm2.meta_key = '_wp_attached_file')");	
	$query=$db2->query("SELECT * FROM wp_posts wp INNER JOIN wp_postmeta wpm ON (wp.ID = wpm.post_id AND wpm.meta_key = '_thumbnail_id')
    INNER JOIN wp_postmeta wpm2 ON (wpm.meta_value = wpm2.post_id AND wpm2.meta_key = '_wp_attached_file') where wp.post_status ='publish' and wp.post_type ='post' limit 9");		
		if($query->num_rows()>0){			
			return $query->result();
		}else{
			return false;
		}
	}
	
	public function submit_galleryimage($image)
	{
		extract($_POST);
		$this->db->set('gallery_id',$gid);
		$this->db->set('image_name',$image);
		$this->db->insert('lb_gallery_images');
	}
	
	public function getgallery_details($id)
	{
		$this->db->select('*');
		$this->db->from('lb_gallery_images');
		$this->db->where('gallery_id',$id);
        $this->db->order_by('image_id ','desc');
		return $query=$this->db->get()->result();
	}
	
	public function gallery_details($id)
	{
		$this->db->select('*');
		$this->db->where('title_url',$id);
		$this->db->where('status',1);
		$query=$this->db->get('lb_gallery_tb');
		return $query->row();
	}
		
	public function getgallerycount()
	{	
		$this->db->select('*');
		$this->db->from('lb_gallery_tb');
		$this->db->where('status',1);
        $this->db->order_by('created_at','desc');
		return $query=$this->db->get()->num_rows();
	}
	
	public function getgallerylist($limit, $offset)
	{
		$this->db->select('*');
		$this->db->from('lb_gallery_tb');
		$this->db->where('status',1);
        $this->db->order_by('created_at','desc');
		$this->db->limit($limit,$offset);
		return $query=$this->db->get()->result();
	}
	
	public function getmediacount()
	{	
		$this->db->select('*');
		$this->db->from('lb_media_tb');
		$this->db->where('status',1);
        $this->db->order_by('created_at','desc');
		return $query=$this->db->get()->num_rows();
	}
	
	public function getmedialist($limit, $offset)
	{
		$this->db->select('*');
		$this->db->from('lb_media_tb');
		$this->db->where('status',1);
        $this->db->order_by('created_at','desc');
		$this->db->limit($limit,$offset);
		return $query=$this->db->get()->result();
	}
	
	public function events_details($id)
	{
		$this->db->select('*');
		$this->db->where('event_url',$id);
		$this->db->where('status',1);
		$query=$this->db->get('lb_event_tb');
		return $query->row();
	}
	
	public function media_coverage($id)
	{
		$this->db->select('*');
		$this->db->where('title_url',$id);
		$this->db->where('status',1);
		$query=$this->db->get('lb_media_tb');
		return $query->row();
	}

	public function geteventcount()
	{	
		$this->db->select('*');
		$this->db->from('lb_event_tb');
		$this->db->where('status',1);
        $this->db->order_by('start_date','desc');
		return $query=$this->db->get()->num_rows();
	}
	
	public function geteventlist($limit, $offset)
	{
		$this->db->select('*');
		$this->db->from('lb_event_tb');
		$this->db->where('status',1);
        $this->db->order_by('start_date','desc');
		$this->db->limit($limit,$offset);
		return $query=$this->db->get()->result();
	}
	
	public function getAdminDetail()
	{
		$this->db->select('*');
		$this->db->where('email',$this->input->post('email'));
		$this->db->where('status',1);
		$query=$this->db->get('lb_admin');
		return $query->row();
	}
	
	public function get_all_menus()
	{
		$this->db->order_by('position','asc');
		$query=$this->db->get('lb_menu');
		if($query->num_rows() > 0){
		return $query->result();
		}
	}
	public function add_menu()
	{
		$menu_insert=array(
			'menu_name'=>$this->input->post('menu_name'),
			'parent_id'=>$this->input->post('parent_menu'),
			'position'=>$this->input->post('position'),
			'menu_link'=>$this->input->post('link')
		);
		$this->db->insert('lb_menu',$menu_insert);
		
		
	}
	public function get_all_role()
	{
		$query=$this->db->get("lb_user_types");
		if ($query->num_rows()>0){
			return $query->result();
		}else{
			return FALSE;
		}
	}
	function get_menu_byid($menuid)
	{
		$query=$this->db->get_where('lb_menu',array('menu_id'=>$menuid));
		if($query->num_rows()>0){
			 return $query->result();
		}
	}

	function edit_menu()
	{
		$menu_id=$this->input->post('menu_id');
		
		$data=array(
			'menu_name'=>$this->input->post('menu_name'),
			'menu_link'=>$this->input->post('menu_link'),
			'position'=>$this->input->post('position'),
			'parent_id'=>$this->input->post('parent_menu')			
			);
		
	    $this->db->update('lb_menu',$data,array('menu_id'=>$menu_id));
	    
           
            if($this->db->affected_rows()>=0){
			    echo "<script>alert('menu Upadated Successfully');</script>";
			    echo"<script>window.location.href='".base_url()."Admin/menu_management'</script>";
		    }else{
			    echo "<script>alert('Menu Upadation Failed');</script>";
			    echo"<script>window.location.href='".base_url()."Admin/menu_management'</script>";
		    }
	    }

	
	function delete_menu()
	{
		$menu_id=$this->input->post("menuId");
		$result=$this->db->delete("lb_menu", array('menu_id'=>$menu_id));
		if($result){
			
				return TRUE;
			}else{
				return FALSE;
			}
		}
	
	public function ListCategory()
	{
		$this->db->select('category_id,category_name');
		$this->db->order_by('category_id',"desc");
		$this->db->where('category_status',1);
		$getResult = $this->db->get('lb_category_tb');
        return $getResult->result(); 
	}
	
	public function getContactQuery()
	{
		$this->db->select('*');
		$this->db->order_by('contact_id','desc');
		$getResult = $this->db->get('lb_contact_query');
		return $getResult->result(); 
	}

	function event_inquiry_list()
	{
		$this->db->select('*');
		$this->db->order_by('id',"desc");
		$getResult = $this->db->get('lb_event_inquiry');
        return $getResult->result(); 
	}
	public function getEventName($eventid)
	{
		$this->db->select("event_name");
		$this->db->where('event_id',$eventid);
		return $this->db->get("lb_event_tb")->row_array();
	}
	function event_list()
	{
		$this->db->select('*');
		$this->db->where('status !=',3);
		$this->db->order_by('event_id',"desc");
		$getResult = $this->db->get('lb_event_tb');
        return $getResult->result(); 
	}
	function media_list()
	{
		$this->db->select('*');
		$this->db->where('status !=',3);
		$this->db->order_by('id',"desc");
		$getResult = $this->db->get('lb_media_tb');
        return $getResult->result(); 
	}
	function add_mediadata($cover)
	{
		extract($_POST);
		$date = date('Y-m-d h:i:s');
		$this->db->set('title',$this->input->post("title"));
		$this->db->set('title_url',$this->urlMaker($this->input->post("title")));
		$this->db->set('organizer',$this->input->post("organizer")); 
		$this->db->set('description',$this->input->post("description"));
		$this->db->set('images',$cover);
		$this->db->set('created_at',$date);		
		$this->db->set('status',$this->input->post("status"));	
		$this->db->insert('lb_media_tb');
	}
	
	function edit_media($id)
	{
		$this->db->select('*');
		$this->db->where('id',$id);
		$getResult = $this->db->get('lb_media_tb');
        return $getResult->row(); 
	}
	
	function update_media($cover=NULL)
	{
		extract($_POST);
		//$date = date('Y-m-d h:i:s');
		$this->db->set('title',$this->input->post("title"));
		$this->db->set('title_url',$this->urlMaker($this->input->post("title")));
		$this->db->set('organizer',$this->input->post("organizer")); 
		$this->db->set('description',$this->input->post("description"));
		if($cover!=NULL){
			$this->db->set('images',$cover);
		}
		//$this->db->set('created_at',$date);		
		$this->db->set('status',$this->input->post("status"));
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('lb_media_tb');
	}
	
	function add_eventdata($cover)
	{
		extract($_POST);
		$date = date('Y-m-d h:i:s');
		$this->db->set('event_name',$this->input->post("title"));
		$this->db->set('event_url',$this->urlMaker($this->input->post("title")));
		$this->db->set('email',$this->input->post("event_email"));   
		$this->db->set('phone_no',$this->input->post("event_contact_no"));
		$this->db->set('description',$this->input->post("description"));
		$this->db->set('address',$this->input->post("address"));	
		$this->db->set('start_date',date("Y-m-d",strtotime($this->input->post("start_date"))));
		$this->db->set('end_date',$this->input->post("end_date"));
		$this->db->set('images',$cover);
		$this->db->set('created_at',$date);		
		$this->db->set('status',$this->input->post("status"));	
		$this->db->insert('lb_event_tb');
	}
	
	function edit_event($id)
	{
		$this->db->select('*');
		$this->db->where('event_id',$id);
		$getResult = $this->db->get('lb_event_tb');
        return $getResult->row(); 
	}
	function update_eventdata($cover=NULL)
	{
		extract($_POST);
		$date = date('Y-m-d h:i:s');
		$this->db->set('event_name',$this->input->post("title"));
		$this->db->set('event_url',$this->urlMaker($this->input->post("title")));
		$this->db->set('email',$this->input->post("event_email"));   
		$this->db->set('phone_no',$this->input->post("event_contact_no"));
		$this->db->set('description',$this->input->post("description"));
		$this->db->set('address',$this->input->post("address"));	
		$this->db->set('start_date',date("Y-m-d",strtotime($this->input->post("start_date"))));
		$this->db->set('end_date',$this->input->post("end_date"));
		if($cover!=NULL){
			$this->db->set('images',$cover);
		}
		$this->db->set('modified_at',$date);		
		$this->db->set('status',$this->input->post("status"));
		$this->db->where('event_id',$this->input->post('event_id'));
		$this->db->update('lb_event_tb');
	}
	
	public function geteventimages()
	{
		$this->db->select('*');
		$getResult = $this->db->get('lb_event_images');
        return $getResult->result(); 
	}
	public function submit_eventimage($image)
	{
		$this->db->set('image_name',$image);
		$this->db->insert('lb_event_images');
	}
	
	public function get_menu_for_permission()
	{
		$this->db->order_by("position", "asc");
		$query=$this->db->get("lb_menu");
		if($query->num_rows()>0){
			return $query->result();
		}

	}

	public function add_employee_group()
	{
		$created_at=date("Y-m-d h:i:sa");
		$modified_at=date("Y-m-d h:i:sa");
		$employee_group_name=$this->input->post('employee_group');
		$employee_group_permission_menu[]=$this->input->post('menu_id');
		// print_r($employee_group_permission_menu); die();
		$data=array(
			'user_name'=>$employee_group_name,
			'status'=>1,
			'created_at'=>date("Y-m-d h:i:sa"),
			'modified_at'=>date("Y-m-d h:i:sa")
		);
		$this->db->insert("lb_user_types",$data);
		if($this->db->insert_id()>0){
				//$user_group_id=$this->db->insert_id();
				

				//$total_sub_menu=count($employee_group_permission_menu);
				for($i=0;$i<count($employee_group_permission_menu[0]);$i++){

					$role_id=$user_group_id;
					$menu_id=$employee_group_permission_menu[0][$i];
					$created_at=date("Y-m-d h:i:sa");
					$modified_at=date("Y-m-d h:i:sa");

					$data1=array(
						'user_type_id'=>$role_id,
						'menu_id'=>$menu_id,
						'status'=>1,
						'created_at'=>$created_at,
						'updated_at'=>$modified_at
					);
					$this->db->insert("lb_role_menu",$data1);

					
				}
				echo '<script>alert("Group inserted Successfully");</script>';
				echo "<script>window.location.href='".base_url()."Admin/show_add_employee_group_page';</script>";
		}else{
				echo '<script>alert("Group insertion Failed");</script>';
				echo "<script>window.location.href='".base_url()."Admin/show_add_employee_group_page';</script>";
		}

	}

	public function get_all_employee_group()
	{
		$query=$this->db->query("select * from lb_user_types where id!=1");
		if($query->num_rows()>0){
			return $query->result();
		}
	}

	public function get_all_employee_department()
	{
		$query=$this->db->query("select * from b2b_department");
		if($query->num_rows()>0){
			return $query->result();
		}
	}

	public function get_employee_group_specific($employee_group_id)
	{
		$query=$this->db->get_where('lb_user_types',array('id'=>$employee_group_id));
		if($employee_group_id){
			return $query->row();
		}
	}

	public function get_assigned_menu_of_group($employee_group_id)
	{
		// echo $employee_group_id; die();
		$query=$this->db->get_where('lb_role_menu',array('user_type_id'=>$employee_group_id));
			 // print_r($query->result()); die();
		
		if($query->num_rows()>0){
			 // print_r($query->result()); die();
			return $query->result();
		}
	}

	public function edit_employee_group()
	{

		//print_r($_POST);die();
		$employee_group_name=$this->input->post('employee_group');
		$employee_group_id=$this->input->post('employee_group_id');
		$employee_group_permission_menu[]=$this->input->post('menu');

		$data=array(
			'user_name'=>$employee_group_name,
			'status'=>1,
			'modified_at'=>date("Y-m-d h:i:sa")
		);
		$this->db->update("lb_user_types",$data,array('id'=>$employee_group_id));
		if($this->db->affected_rows()>0){
				$query=$this->db->get_where("lb_role_menu",array('user_type_id'=>$employee_group_id));
				if($query->num_rows()>0){
					$this->db->delete("lb_role_menu",array('user_type_id'=>$employee_group_id));
				}

				for($i=0;$i<count($employee_group_permission_menu[0]);$i++){

					$role_id=$employee_group_id;
					$menu_id=$employee_group_permission_menu[0][$i];
					$created_at=date("Y-m-d h:i:sa");
					$modified_at=date("Y-m-d h:i:sa");

					$data1=array(
						'user_type_id'=>$role_id,
						'menu_id'=>$menu_id,
						'status'=>1,
						'created_at'=>$created_at,
						'updated_at'=>$modified_at
					);
					$this->db->insert("lb_role_menu",$data1);
				}
				echo '<script>alert("Group updated Successfully");</script>';
				echo "<script>window.location.href='".base_url()."Admin/show_manage_employee_group';</script>";
		}else{
				echo '<script>alert("Group updation Failed");</script>';
				echo "<script>window.location.href='".base_url()."Admin/show_manage_employee_group';</script>";
		}
	}

	public function DeactivateEmployeeGroup()
	{
		$groupID=$this->input->post('employeegroupid');
    	$data=array('status'=>0);
    	$result=$this->db->update('lb_user_types',$data,array('id'=>$groupID));
    	if($result){
    		return true;
    	}else{
    		return false;
    	}
	}

	public function ActivateEmployeeGroup()
	{
		$groupID=$this->input->post('employeegroupid');
    	$data=array('status'=>1);
    	$result=$this->db->update('lb_user_types',$data,array('id'=>$groupID));
    	if($result){
    		return true;
    	}else{
    		return false;
    	}
	}

	public function show_employee_page()
	{
		$sess_data=$this->session->userdata("admin_logged_in");
		$parent_role_id=$sess_data["user_type"];
		$query1=$this->db->query("select child_role_id from b2b_assign_users where parent_role_id='".$parent_role_id."' ");
		$arr=$query1->result_array();
		$newarray=array();
		$i=0;
		foreach($arr as $newarr){	
			foreach ($newarr as $key => $value) {
				$newarray[$i]=$value;
				$i++;
			}					
		}				
		$matches=implode(',',$newarray); 		
		if($matches){
			$query=$this->db->query("select u.*,e.*,ut.user_name from b2b_users u inner join b2b_employee e on u.employee_id=e.id left outer join lb_user_types ut on u.user_type=ut.id where  ut.id IN ( ".$matches." ) ");			
			if($query->num_rows()>0){				
				return $query->result();
			}
		}else{
			return "";
		}
	}

	

	public function DeleteEmployee()
	{
		$employee_id=$this->input->post("GroupId");
		$result=$this->db->delete("lb_user_types",array('id'=>$employee_id));
		if($result){
			
				return TRUE;
			}
			else{
				return FALSE;
			}
		
	}

	//////////////////////////// Function to assign Groups to another Group /////////////////////////////
	public function assign_user()
	{
		$parent_role_id=$this->input->post("parent_role_id");	
			$query1=$this->db->get_where('lb_user_types',array('id'=>$parent_role_id));
			$result1=$query1->row();
		$parent_role_name=$result1->user_name;			
		$child_role_id[]=$this->input->post("child_role_id");		
		
		$query=$this->db->get_where('b2b_assign_users',array('parent_role_id'=>$parent_role_id));
		if($query->num_rows()>0){
			$this->db->delete('b2b_assign_users',array('parent_role_id'=>$parent_role_id));
		}

		$length=count($child_role_id[0]);		
		for($i=0 ;$i<$length ;$i++){

			$query2=$this->db->get_where('lb_user_types',array('id'=>$child_role_id[0][$i]));
			$result2=$query2->row();
			$child_role_name=$result2->user_name;

			$data=array(
				'parent_role_id'=>$parent_role_id,
				'parent_role_name'=>$parent_role_name,
				'child_role_id'=>$child_role_id[0][$i],
				'child_role_name'=>$child_role_name,
				'status'=>1,
				'created_at'=>date("Y-m-d h:i:sa"),
				'updated_at'=>date("Y-m-d h:i:sa")
			);
			$this->db->insert('b2b_assign_users',$data);			
		}
			echo "<script>alert('Group Assigned to  $parent_role_name Group');</script>";
			echo "<script>window.location.href='".base_url()."Admin/show_assign_user';</script>";	
	}

	public function get_assigned_user_group()
	{
		$query=$this->db->get('b2b_assign_users');
		if($query->num_rows()>0){
			return $query->result();
		}
	}
	public function urlMaker($string)
	{
	    $string = utf8_encode($string);
		//$string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);   
		$string = preg_replace('/[^a-z0-9- ]/i', '', $string);
		$string = str_replace(' ', '-', $string);
		$string = trim($string, '-');
		$string = strtolower($string);
		if (empty($string)) {
		    return 'n-a';
		}
		return $string;
	}
	
	public function changpass()
	{
		$admin_session=$this->session->userdata('login-in'); 
		$this->db->set("password",md5($this->input->post("pass")));
		$this->db->set("text_password",$this->input->post("pass"));
		$this->db->where("id",$admin_session['id']);
		$this->db->update("lb_admin");		
	}
	
	function add_gallerydata($cover)
	{
		extract($_POST);
		$date = date('Y-m-d h:i:s');
		$this->db->set('title',$this->input->post("title"));
		$this->db->set('title_url',$this->urlMaker($this->input->post("title")));
		$this->db->set('location',$this->input->post("location"));	
		$this->db->set('date',date("Y-m-d",strtotime($this->input->post("date"))));
		$this->db->set('images',$cover);
		$this->db->set('created_at',$date);		
		$this->db->set('status',$this->input->post("status"));	
		$this->db->insert('lb_gallery_tb');
	}
	
	function edit_gallery($id)
	{
		$this->db->select('*');
		$this->db->where('id',$id);
		$getResult = $this->db->get('lb_gallery_tb');
        return $getResult->row(); 
	}
	
	function update_gallery($cover=NULL)
	{
		extract($_POST);
		$this->db->set('title',$this->input->post("title"));
		$this->db->set('title_url',$this->urlMaker($this->input->post("title")));
		$this->db->set('location',$this->input->post("location"));	
		$this->db->set('date',date("Y-m-d",strtotime($this->input->post("date"))));
		if($cover!=NULL){
			$this->db->set('images',$cover);
		}	
		$this->db->set('status',$this->input->post("status"));
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('lb_gallery_tb');
	}
	
	function gallery_list()
	{
		$this->db->select('*');
		$this->db->where('status !=',3);
		$this->db->order_by('id',"desc");
		$getResult = $this->db->get('lb_gallery_tb');
        return $getResult->result(); 
	}
}