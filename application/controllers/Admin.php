<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __Construct()
	{
		parent::__construct();
		$this->load->model('Admin_Model');
		$this->form_validation->set_error_delimiters('<div class="text-danger" style="font-size:14px;font-style: italic;margin-top:5px;margin-bottom:20px;">', '</div>');
	}
	public function index()
	{
		$data['adminData'] =getAdminDetails();
		$this->load->view('admin/login',$data);
	}
	public function adminlogin()
	{
		$data['adminData'] =getAdminDetails();
		$this->load->view('admin/login',$data);
	}
	public function checkSession()
	{
		$admin_session=$this->session->userdata('login-in');
		if (!isset($admin_session)) {
			redirect(base_url()."Admin");
		}
	}
	public function httpPost($url,$params)
	{
	  $postData = '';
	   //create name value pairs seperated by &
	   foreach($params as $k => $v) 
	   { 
		  $postData .= $k . '='.$v.'&'; 
	   }
	   
	   $postData = rtrim($postData, '&');
	 
		$ch = curl_init();  
	 
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_HEADER, false); 
		curl_setopt($ch, CURLOPT_POST, strlen($postData));
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    
	 
		$output=curl_exec($ch);
	 
		curl_close($ch);
		return $output;
	 
	}
	
	public function admin_login()
	{
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/login');
		}else{
			$userDbpass=$this->Admin_Model->getAdminDetail();
			if ($userDbpass) {
				$adminDbpassword=$userDbpass->password;
				$enterPassword=md5($this->input->post('password'));
				if ($adminDbpassword==$enterPassword) {
					$admin_session=array(
						'id'=>$userDbpass->id,
						'admin_name' => $userDbpass->first_name.' '.$userDbpass->last_name,
						'admin_email' => $userDbpass->email,
						'user_type' => $userDbpass->user_type,
						'admin_status'=>1
					);
					$this->session->set_userdata('login-in',$admin_session);
					$sess_data=$this->session->userdata('login-in');


					$admin_session=$this->session->userdata('login-in');
				 	$this->db->set('agent_id',$admin_session['id']);
				 	$this->db->set('agent_type',$admin_session['user_type']);
				 	$this->db->set('login_time',date('d-m-Y H:i:s'));
				 	$this->db->set('date',date('d-m-Y'));
				 	$this->db->set('status',1);
				 	$this->db->insert('lb_logins');
				 	redirect(base_url()."Admin/dashboard");
				}else{
					$data['error_message']="Your Password is incorrect";
					$this->load->view('admin/login',$data);
				}
			}else{
				$data['error_message']="Email Account Doesn't Exist";
				$this->load->view('admin/login',$data);
			}
		}
	}
	
	public function logout()
	{
		
		$admin_session=$this->session->userdata('login-in'); 
	 	$this->db->set('logout_time',date('d-m-Y H:i:s'));
	 	$this->db->where('agent_id',$admin_session['id']);
	 	$this->db->where('date',date('d-m-Y'));
	 	$this->db->where('status',1);
	 	$this->db->update('lb_logins');

		$this->session->set_userdata('login-in');
		$this->session->sess_destroy();
		//redirect(base_url()."Admin");
		redirect(base_url()."admin");
	}
	
	public function dashboard()
	{
		$this->checkSession();
		$data['adminData'] =getAdminDetails();
		$this->load->view('admin/maindashboard',$data);
	}
	
	function do_upload($fileName,$path)
	{
		$this->checkSession();
		$config['upload_path'] = './uploads/'.$path;
		$config['allowed_types'] = 'gif|jpg|png|pdf|svg|jpeg';
	//	$config['max_size']	= '2000*********';
	//	$config['max_width']  = '160';
	//	$config['max_height']  = '190';
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload($fileName))
		{
			return $error = array('error' => $this->upload->display_errors(),'upload_data' => "");
		}
		else
		{
			return $data = array('upload_data' => $this->upload->data(),'error' =>"");
		}
	}
	
	public function menu_management()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();	
		$data['menus']=$this->Admin_Model->get_all_menus();
		$data['role_data']=$this->Admin_Model->get_all_role();
		//$data['main_content']='admin_files/admin_menu';
		$this->load->view('admin/menu/menu',$data);
	}


	public function add_menu()
	{
		$this->checkSession();
		$this->Admin_Model->add_menu();
		redirect($_SERVER['HTTP_REFERER']);
	}


	public function edit_menu_page($menuid)
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();	
		$data['menus']=$this->Admin_Model->get_menu_byid($menuid);
		$data['menuslist']=$this->Admin_Model->get_all_menus();
		$data['role_data']=$this->Admin_Model->get_all_role();
		$data['menu_list']='menu_management';
		$this->load->view('admin/menu/edit_menu',$data);

	}

	public function edit_menu()
	{
		$this->checkSession();
		$this->Admin_Model->edit_menu($_POST);
	}

	public function delete_menu()
	{
		$this->checkSession();
		$data=$this->Admin_Model->delete_menu($_POST);
		if($data){
	 		echo json_encode("Menu deleated Successfully");
	 	}else{
	 		echo json_encode("Menu deletion Failed");
	 	}
	}
	
	function ContactQuery()
	{
		$this->checkSession();
		$data['adminData'] =getAdminDetails();
		$data['allElement']=$this->Admin_Model->getContactQuery();
		$this->load->view('admin/inquiry_list',$data);
	}
	
	function event_inquiry_delete($id)
	{
		$this->checkSession();
		$this->db->select("*");
		$this->db->where("id",$id);
		$this->db->delete("lb_event_inquiry");
		$sessionData = array('message'  => '<span class="text-success">Event Inquiry Deleted Successfully !!</span>');
		$this->session->set_userdata($sessionData);
		header("Location:".base_url()."Admin/event_inquiry/");
	}

	function event_list()
	{
		$this->checkSession();
		$data['adminData'] =getAdminDetails();
		$data['allElement']=$this->Admin_Model->event_list();
		$this->load->view('admin/event/event_list',$data);
	}
	function event_featured($catId,$status)
	{
		$this->checkSession();
		$this->db->set("featured",$status);
		$this->db->where("event_id",$catId);
		$this->db->update("lb_event_tb");
		$sessionData = array('message'  => '<span class="text-success">Event Featured Status Updated Successfully !!</span>');
		$this->session->set_userdata($sessionData);
		header("Location:".base_url('Admin/event_list/'));
	}

	function event_status($catId,$status)
	{
		$this->checkSession();
		$this->db->set("status",$status);
		$this->db->where("event_id",$catId);
		$this->db->update("lb_event_tb");
		$sessionData = array('message'  => '<span class="text-success">Event Status Updated Successfully !!</span>');
		$this->session->set_userdata($sessionData);
		header("Location:".base_url('Admin/event_list/'));
	}
    
	function event_delete($catId)
	{
		$this->checkSession();
		$this->db->set("status",3);
		$this->db->where("event_id",$catId);
		$this->db->update("lb_event_tb");
		$sessionData = array('message'  => '<span class="text-success">Event Deleted Successfully !!</span>');
		$this->session->set_userdata($sessionData);
		header("Location:".base_url('Admin/event_list/'));
	}
	
	function add_event()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$this->load->view('admin/event/add_event',$data);
	}
	
	function add_eventdata()
	{
		extract($_POST);
		$this->checkSession();
		if($_FILES['image']['size']>0)
		{
			$logoData = $this->do_upload('image','event');
			$cover = $logoData["upload_data"]["file_name"];
		}
		else{
			$cover = NULL;
		}
		$this->Admin_Model->add_eventdata($cover);
		$sessionData = array('message'  => '<span class="text-success">Event Added Successfully !!</span>');
		$this->session->set_userdata($sessionData);
		redirect(base_url("Admin/add_event"));
	}

	function edit_event($id)
	{
		$data['adminData']=getAdminDetails();
		$data['info'] = $this->Admin_Model->edit_event($id);
		$this->load->view('admin/event/edit_event',$data);
	}
	
	function update_eventdata()
	{
		$this->checkSession();
		if($_FILES['image']['size']>0)
		{
			$logoData = $this->do_upload('image','event');
			$cover = $logoData["upload_data"]["file_name"];
		}
		else{
			$cover = NULL;
		}
		$this->Admin_Model->update_eventdata($cover);
		$sessionData = array('message'  => '<span class="text-success">Event Updated Successfully !!</span>');
		$this->session->set_userdata($sessionData);
		redirect(base_url("Admin/event_list"));
	}
	
	public function event_images()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$this->load->view("admin/event/add_images",$data);
	}

	public function submit_eventimage()
	{       
		$this->load->library('upload');

		$files = $_FILES;
		$cpt = count($_FILES['userfile']['name']);
		for($i=0; $i<$cpt; $i++)
		{           
			$_FILES['userfile']['name']= $files['userfile']['name'][$i];
			$_FILES['userfile']['type']= $files['userfile']['type'][$i];
			$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
			$_FILES['userfile']['error']= $files['userfile']['error'][$i];
			$_FILES['userfile']['size']= $files['userfile']['size'][$i];    
			$config = array();
			$config['upload_path'] = 'uploads/event/';
			// $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG';
			$config['allowed_types'] = '*';
			$config['max_size']      = '0';
			$config['overwrite']     = FALSE;
			$path = $_FILES['userfile']['name'][$i];
			$config['file_name'] = "staredu_".time().$_FILES['userfile']['name'];
			$this->upload->initialize($config);
		
			if ( ! $this->upload->do_upload()) {
				echo $this->upload->display_errors(); die();
			}
			else
			{
				$return_data = $this->upload->data();
			    $this->Admin_Model->submit_eventimage($return_data['file_name']);
			}	
		}
		redirect("admin/event_images/");
	}

	function delete_eventimages($photoId)
	{
		$this->db->where("image_id",$photoId);
		$this->db->delete("lb_event_images");
		$sessionData = array('message'  => '<span class="text-success">Image Deleted Successfully !!</span>');
		$this->session->set_userdata($sessionData);
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function add_gallery()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$this->load->view('admin/gallery/add_gallery',$data);
	}
	
	function add_gallerydata()
	{
		extract($_POST);
		$this->checkSession();
		if($_FILES['image']['size']>0)
		{
			$logoData = $this->do_upload('image','gallery');
			$cover = $logoData["upload_data"]["file_name"];
		}
		else{
			$cover = NULL;
		}
		$this->Admin_Model->add_gallerydata($cover);
		$sessionData = array('message'  => '<span class="text-success">Gallery Added Successfully !!</span>');
		$this->session->set_userdata($sessionData);
		redirect(base_url("Admin/add_gallery"));
	}
	
	function gallery_list()
	{
		$this->checkSession();
		$data['adminData'] =getAdminDetails();
		$data['allElement']=$this->Admin_Model->gallery_list();
		$this->load->view('admin/gallery/gallery_list',$data);
	}
	
	function gallery_status($catId,$status)
	{
		$this->checkSession();
		$this->db->set("status",$status);
		$this->db->where("id",$catId);
		$this->db->update("lb_gallery_tb");
		$sessionData = array('message'  => '<span class="text-success">Gallery Status Updated Successfully !!</span>');
		$this->session->set_userdata($sessionData);
		header("Location:".base_url('Admin/gallery_list'));
	}
    
	function gallery_delete($catId)
	{
		$this->checkSession();
		$this->db->set("status",3);
		$this->db->where("id",$catId);
		$this->db->update("lb_gallery_tb");
		$sessionData = array('message'  => '<span class="text-success"> Deleted Successfully !!</span>');
		$this->session->set_userdata($sessionData);
		header("Location:".base_url('Admin/gallery_list'));
	}
	
	function edit_gallery($id)
	{
		$data['adminData']=getAdminDetails();
		$data['info'] = $this->Admin_Model->edit_gallery($id);
		$this->load->view('admin/gallery/edit_gallery',$data);
	}
	
	public function add_album()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$this->load->view("admin/gallery/add_album",$data);
	}
	
	public function submit_galleryimage()
	{   
		extract($_POST);
		$this->load->library('upload');
		$files = $_FILES;
		$cpt = count($_FILES['userfile']['name']);
		for($i=0; $i<$cpt; $i++)
		{           
			$_FILES['userfile']['name']= $files['userfile']['name'][$i];
			$_FILES['userfile']['type']= $files['userfile']['type'][$i];
			$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
			$_FILES['userfile']['error']= $files['userfile']['error'][$i];
			$_FILES['userfile']['size']= $files['userfile']['size'][$i];    
			$config = array();
			$config['upload_path'] = 'uploads/gallery/album/';
			// $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG';
			$config['allowed_types'] = '*';
			$config['max_size']      = '0';
			$config['overwrite']     = FALSE;
			$path = $_FILES['userfile']['name'][$i];
			$config['file_name'] = "staredu_".time().$_FILES['userfile']['name'];
			$this->upload->initialize($config);
		
			if ( ! $this->upload->do_upload()) {
				echo $this->upload->display_errors(); die();
			}
			else
			{
				$return_data = $this->upload->data();
			    $this->Admin_Model->submit_galleryimage($return_data['file_name']);
			}	
		}
		redirect($return_url);
	}

	function delete_album_photo($photoId)
	{
		$this->db->where("image_id",$photoId);
		$this->db->delete("lb_gallery_images");
		$sessionData = array('message'  => '<span class="text-success">Album Image Deleted Successfully !!</span>');
		$this->session->set_userdata($sessionData);
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function update_gallery()
	{
		$this->checkSession();
		if($_FILES['image']['size']>0)
		{
			$logoData = $this->do_upload('image','gallery');
			$cover = $logoData["upload_data"]["file_name"];
		}
		else{
			$cover = NULL;
		}
		$this->Admin_Model->update_gallery($cover);
		$sessionData = array('message'  => '<span class="text-success">Gallery Updated Successfully !!</span>');
		$this->session->set_userdata($sessionData);
		redirect(base_url("Admin/gallery_list"));
	}
	
	function add_media()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$this->load->view('admin/media/add_media',$data);
	}
	
	function add_mediadata()
	{
		extract($_POST);
		$this->checkSession();
		if($_FILES['image']['size']>0)
		{
			$logoData = $this->do_upload('image','media');
			$cover = $logoData["upload_data"]["file_name"];
		}
		else{
			$cover = NULL;
		}
		$this->Admin_Model->add_mediadata($cover);
		$sessionData = array('message'  => '<span class="text-success">Media Added Successfully !!</span>');
		$this->session->set_userdata($sessionData);
		redirect(base_url("Admin/add_media"));
	}
	
	function media_list()
	{
		$this->checkSession();
		$data['adminData'] =getAdminDetails();
		$data['allElement']=$this->Admin_Model->media_list();
		$this->load->view('admin/media/media_list',$data);
	}
	
	function media_status($catId,$status)
	{
		$this->checkSession();
		$this->db->set("status",$status);
		$this->db->where("id",$catId);
		$this->db->update("lb_media_tb");
		$sessionData = array('message'  => '<span class="text-success">Media Status Updated Successfully !!</span>');
		$this->session->set_userdata($sessionData);
		header("Location:".base_url('Admin/media_list'));
	}
    
	function media_delete($catId)
	{
		$this->checkSession();
		$this->db->set("status",3);
		$this->db->where("id",$catId);
		$this->db->update("lb_media_tb");
		$sessionData = array('message'  => '<span class="text-success">Media Deleted Successfully !!</span>');
		$this->session->set_userdata($sessionData);
		header("Location:".base_url('Admin/media_list'));
	}
	
	function edit_media($id)
	{
		$data['adminData']=getAdminDetails();
		$data['info'] = $this->Admin_Model->edit_media($id);
		$this->load->view('admin/media/edit_media',$data);
	}
	
	function update_media()
	{
		$this->checkSession();
		if($_FILES['image']['size']>0)
		{
			$logoData = $this->do_upload('image','media');
			$cover = $logoData["upload_data"]["file_name"];
		}
		else{
			$cover = NULL;
		}
		$this->Admin_Model->update_media($cover);
		$sessionData = array('message'  => '<span class="text-success">Media Updated Successfully !!</span>');
		$this->session->set_userdata($sessionData);
		redirect(base_url("Admin/media_list"));
	}
	
	public function show_add_employee_group_page()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$data['menu_data']=$this->Admin_Model->get_menu_for_permission();
		$data["title"]="Add Employee Group";
		$this->load->view('admin/group/add_employee_group',$data);
	}

	////////////////////  Function to add employee group  ///////////////////////////////////

	public function add_employee_group()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$this->Admin_Model->add_employee_group($_POST);
	}
	///////////////////// Funtion to show assign permission page /////////////////////////
	public function assign_group_permission_page()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$data['employee_group_data']=$this->Admin_Model->assign_group_permission_page();
		$this->load->view('admin/group/assign_group_permision_page');
	}

	//////////////////// Function to manage employee group ///////////////////////////////////////

	public function show_manage_employee_group()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$data['employee_group_data']=$this->Admin_Model->get_all_employee_group();
		$data['title']="Admin_Model Group";
		$this->load->view('admin/group/manage_employee_group',$data);
	}
	//////////////////// function to edit employee group details ///////////////////////////////////
	public function show_employee_group_edit($employee_group_id)
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$data['employee_group_detail']=$this->Admin_Model->get_employee_group_specific($employee_group_id);
		$data['menu_data']=$this->Admin_Model->get_menu_for_permission();
		$data['exist_menu_of_group']=$this->Admin_Model->get_assigned_menu_of_group($employee_group_id);
		$data['title']="Group Edit";
		$this->load->view('admin/group/manage_employee_group_edit',$data);
	}
	////////////////// Function to edit employee group detail  //////////////////////////////////////////

	public function edit_employee_group()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$this->Admin_Model->edit_employee_group($_POST);
	}

	//////////////////  function to deactivate employee group  //////////////////////////////////////////

	public function DeactivateEmployeeGroup()
	{
		$this->checkSession();
    	$result=$this->Admin_Model->DeactivateEmployeeGroup($_POST);
    	if($result){
    		echo json_encode("Group Deactivated successfully");
    	}else{
    		echo json_encode("Group Deactivated Failed");
    	}
	}
	//////////////////  function to Activate employee group  //////////////////////////////////////////
	public function ActivateEmployeeGroup()
	{
		$this->checkSession();
			$result=$this->Admin_Model->ActivateEmployeeGroup($_POST);
			if($result){
				echo json_encode("Group Activated successfully");
			}else{
				echo json_encode("Group Activated Failed");
			}
	}
	///////////////////////////////////  Function to Delete Employee  ////////////////////////////////////////////////////
	public function deleteEmployee()
	{
		$this->checkSession();
		$result=$this->Admin_Model->DeleteEmployee($_POST);
		if($result==TRUE){
			echo json_encode("Group Deleted Successfully");
		}else{
			echo json_encode("Group Deletion Failed");
		}
	}
	/////////////////////  Function to show assigned groups ///////////////////////////////////////////////////
	public function show_assigned_group()
	{
		$this->checkSession();
		$data['adminData']=getAdminDetails();
		$data['group_data']=$this->Admin_Model->get_all_employee_group();
		$data['title']="Assigned User Group";
		$this->load->view('admin/group/show_assigned_user',$data);
	}
	/////////////////////  Function to show assigned groups by id ///////////////////////////////////////////////////
	public function get_assigned_group_by_id()
	{
		$this->checkSession();
		$data=$this->Admin_Model->get_assigned_group_by_id($_POST);		
		if($data){
			echo  json_encode($data);
		}else{
			$data="notfound";
			echo  json_encode($data);
		}	
	}
	
	function inquiry_list_delete($id)
	{
		$this->db->where("contact_id",$id);
		$this->db->delete("lb_contact_query");
		$sessionData = array('message'  => '<span class="text-success">Inquiry Deleted Successfully !!</span>');
		$this->session->set_userdata($sessionData);
		header("Location:".base_url()."Admin/ContactQuery");
	}
	/////////////////////////////////////////End Group////////////////////////////////////
	public function changepassword()
	{
		$this->checkSession();
		$data['adminData'] =getAdminDetails();
		$this->load->view('admin/password/change-password',$data);
	}
	public function changepassworddata()
	{
		$this->checkSession();
		$this->form_validation->set_rules('pass','Password','trim|required|xss_clean|matches[co_pass]');
		$this->form_validation->set_rules('co_pass','Confirm Password','trim|required|xss_clean');	
		if ($this->form_validation->run() == FALSE)
		{
			$data['adminData'] =getAdminDetails();
			$this->load->view('admin/password/change-password',$data);
		}
		else
		{
			$this->Admin_Model->changpass();
			$message = array('message'=>'<span class="text-success">Password Updated Successfully !!</span>');
			$this->session->set_userdata($message);
			redirect(base_url('Admin/changepassword'));
		}
	}
}


