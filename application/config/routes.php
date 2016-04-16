<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "site/home";
$route['home'] = "site/home";
$route['meat'] = "site/home/items/meat";
$route['fish'] = "site/home/items/fish";
$route['chicken'] = "site/home/items/chicken";
$route['mutton'] = "site/home/items/mutton";
$route['beef'] = "site/home/items/beef";
$route['about'] = "site/home/about";
$route['contact'] = "site/home/contact";
$route['enquiry'] = "site/home/enquiry";
$route['filter_products/(:any)/(:any)'] = "site/home/filter_products/$1/$2";

$route['admin'] = "admin/dashboard";
$route['dashboard/(:any)'] = "admin/dashboard/$1";
$route['process/(:any)'] = "admin/process/$1";


$route['widget/(:any)'] = "widget/frame/index/$1";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */