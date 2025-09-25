<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'Home';
$route['404_override'] = 'Home/page404';
$route['translate_uri_dashes'] = FALSE;

//////////////////////////////////Admin URL/////////////////////////////
$route['admin']='Admin/index';
$route['Admin/login.html']='Admin/adminloginForm';
$route['Admin/dashboard.html']='Admin/dashboard';
$route['Admin/logout.html']='Admin/adminLogout';
$route['admin/checkmobilenumber.html']='Admin/checknumbers';
/////////////////////////////////End Admin URL//////////////////////////

$route['about-us']='Home/about_us';
$route['index']='Home/index';
$route['legal']='Home/legal';
$route['speakers']='Home/speakers';
$route['programme']='Home/programme';
$route['venue']='Home/venue';
$route['registration']='Home/registration';



/////////////////////////////////End URL//////////////////////////
/*
$route['our-leadership-team']='Home/team';
$route['our-alliances']='Home/our_alliances';
$route['services']='Home/services';
$route['rewardsprogram']='Home/rewardsprogram';
$route['contact']='Home/contact';
$route['downloads']='Home/downloads';
$route['comingsoon']='Home/comingsoon';
$route['events/(:any)'] = 'Home/events/$1';
$route['gallery']='Home/gallery';
$route['gallery/(:any)']='Home/gallery/$1';
$route['gallery-details/(:any)']='Home/gallery_details/$1';
$route['media/(:any)'] = 'Home/media/$1';
$route['media-coverage/(:any)'] = 'Home/media_coverage/$1';
$route['news']='Home/news';
$route['physical-meeting-solutions']='Home/physical_meeting_solutions';
$route['thankyou']='Home/thankyou';
$route['(:any)'] = 'Home/events_details/$1';
*/
$route['404_override']='Home/page404';

