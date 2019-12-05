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
$route['default_controller'] = 'welcome';
$route['courier'] = 'PageController/courier';
$route['dashboard'] = 'PageController/dashboard';
$route['profile'] = 'PageController/profile';
$route['branch'] = 'PageController/branch';
$route['changePassword'] = 'PageController/changePassword';
$route['addBranch'] = 'PageController/addBranch';
$route['manageBranch'] = 'PageController/manageBranch';
$route['addStaff'] = 'PageController/addStaff';
$route['manageStaff'] = 'PageController/manageStaff';
$route['newCourier'] = 'PageController/newCourier';
$route['Delivered'] = 'PageController/Delivered';
$route['arrivedDestination'] = 'PageController/arrivedDestination';
$route['courierPickup'] = 'PageController/courierPickup';
$route['intransit'] = 'PageController/intransit';
$route['outofDelivery'] = 'PageController/outofDelivery';
$route['manageBranch/(:num)'] = 'PageController/manageBranch';
$route['shipped'] = 'PageController/shipped';
$route['countWiseReport'] = 'PageController/countWiseReport';
$route['dateWiseReport'] = 'PageController/dateWiseReport';
$route['salesReport'] = 'PageController/salesReport';
$route['addCourier'] = 'PageController/addCourier';
$route['searchCourier'] = 'PageController/searchCourier';
$route['contactUs'] = 'PageController/contactUs';
$route['logIn'] = 'PageController/logIn';
$route['courierDetails'] = 'PageController/courierDetails';

$route['deleteCourierStatus'] = 'StaffController/deleteCourierStatus';
$route['updateCourier'] = 'StaffController/updateCourier';
$route['deleteCourier'] = 'StaffController/deleteCourier';
$route['updateProfileOfStaff'] = 'StaffController/updateProfileOfStaff';
$route['updatePassword'] = 'StaffController/updatePassword';
$route['editCourierHistorydetails'] = 'StaffController/editCourierHistorydetails';
$route['getCourierListByStatus'] = 'StaffController/getCourierListByStatus';
$route['getCourierListBySearch'] = 'StaffController/getCourierListBySearch';
$route['search'] = 'StaffController/findCourierBySearchText';
$route['courierRegistration'] = 'StaffController/courierRegistration';
$route['getCourierList'] = 'StaffController/getCourierList';
$route['registerCourierStatus'] = 'StaffController/registerCourierStatus';
$route['getAllCourierHistoryList'] = 'StaffController/getAllCourierHistoryList';

$route['deleteBranch'] = 'AjaxController/deleteBranch';
$route['deleteStaff'] = 'AjaxController/deleteStaff';
$route['updateBranch'] = 'AjaxController/updateBranch';
$route['updateStaff'] = 'AjaxController/updateStaff';
$route['userRegistration'] = 'AjaxController/userRegistration';
$route['branchRegistration'] = 'AjaxController/branchRegistration';
$route['getAllBranchList'] = 'AjaxController/getAllBranchList';
$route['registerStaff'] = 'AjaxController/registerStaff';
$route['getAllStaffList'] = 'AjaxController/getAllStaffList';

$route['register'] = 'LoginController/register';
$route['logout'] = 'LoginController/logout';
$route['submitLogin'] = 'LoginController/submitLogin';
//$route['register'] = 'PageController/register';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
