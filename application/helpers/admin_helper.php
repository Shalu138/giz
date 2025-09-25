<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('getAdminDetails')){
   function getAdminDetails(){
       //get main CodeIgniter object
       $ci =& get_instance();
       
       //load databse library
       $ci->load->database();
       	
       $admin_session=$ci->session->userdata('login-in');
	   @$id=$admin_session['id'];

	   $ci->db->select('*');
	   $ci->db->where('id',$id);
	   $query=$ci->db->get('lb_admin');
	   return $query->row();
    }
}