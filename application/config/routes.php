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
//$route['default_controller'] = 'page';

//switch ($_SERVER['HTTP_HOST']) {
//    case 'sponsor.skiesinsure.com':
//    case 'sponsor.sdc':
//        $route['login'] = "sponsor/page/login";
//        $route['register'] = "sponsor/page/register";
//        $route['logout'] = "sponsor/page/logout";
//        $route['(:any)'] = "sponsor/$1";
//        $route['(:any)/(:any)'] = 'sponsor/$1/$2';
//        $route['(:any)/(:any)/(:any)'] = 'sponsor/$1/$2/$3';
//        $route['(:any)/(:any)/(:any)/(:any)'] = 'sponsor/$1/$2/$3/$4';
//        break;
//
//    case 'events.voicesagainstbraincancer.org':
//    case 'event.sdc':
//        $route['(:any)'] = "event/$1";
//        break;
//}

$route['(:any)'] = 'sponsor/page/login';
$route['(:any)/sponsor/login'] = 'sponsor/page/login';
$route['(:any)/sponsor/register'] = 'sponsor/page/register';
$route['(:any)/sponsor/logout'] = 'sponsor/page/logout';

$route['(:any)/(:any)'] = '$2';
$route['(:any)/(:any)/(:any)'] = '$2/$3';
$route['(:any)/(:any)/(:any)/(:any)'] = '$2/$3/$4';
$route['(:any)/(:any)/(:any)/(:any)/(:any)'] = '$2/$3/$4/$5';
$route['(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'] = '$2/$3/$4/$5/$6';
$route['(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'] = '$2/$3/$4/$5/$6/$7';

$route['default_controller'] = "SDC";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
