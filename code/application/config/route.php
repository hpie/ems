<?PHP

$route = array();
//**************************CLIENT ROUTE*******************//
$route['account'] = 'login_c/login';
$route['logout-client'] = 'login_c/logoutClient';
$route['(:any)'] = 'home_c';
$route['home/(:any)'] = 'home_c';
$route['job-details/(:any)'] = 'home_c/jobDetails';
$route['post-job'] = 'department_c/postJob';
$route['insert-job'] = 'department_c/addJob';

//**************************ADMIN ROUTE*******************//
$route['login'] = 'login_c';
$route['logout'] = 'login_c/logout';
$route['dashboard'] = 'dashboard_c';
?>