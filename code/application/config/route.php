<?PHP

$route = array();
//**************************CLIENT ROUTE*******************//
$route['account'] = 'login_c/login';
$route['logout-client'] = 'login_c/logoutClient';
$route[''] = 'home_c';
$route['home'] = 'home_c';
$route['job-details/(:any)'] = 'home_c/jobDetails';
$route['post-job'] = 'department_c/postJob';

//**************************ADMIN ROUTE*******************//
$route['login'] = 'login_c';
$route['logout'] = 'login_c/logout';
$route['dashboard'] = 'dashboard_c';
?>