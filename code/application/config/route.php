<?PHP

$route = array();
//**************************CLIENT ROUTE*******************//
$route['account'] = 'login_c/login';
$route['logout-client'] = 'login_c/logoutClient';
$route[''] = 'home_c';
$route['home/(:any)'] = 'home_c/home';
$route['job-details/(:any)'] = 'home_c/jobDetails';
$route['post-job'] = 'jobpost_c/postJob';
$route['insert-job'] = 'jobpost_c/addJob';


//**************************ADMIN ROUTE*******************//
$route['login'] = 'login_c';
$route['login/admin-login'] = 'login_c/login';
$route['logout'] = 'login_c/logout';
$route['dashboard'] = 'dashboard_c';



$route['city/index'] = 'city/invoke';
$route['city/detail'] = 'city/detail';
$route['city/add'] = 'city/add';
$route['city/insert'] = 'city/insert';
$route['city/detail/(:any)'] = 'city/detail';
$route['city/edit/(:any)'] = 'city/edit';
$route['city/update/(:any)'] = 'city/update';



$route['state/index'] = 'state_c/invoke';
$route['state/detail'] = 'state_c/detail';
$route['state/add'] = 'state_c/add';
$route['state/insert'] = 'state_c/insert';
$route['state/detail/(:any)'] = 'state_c/detail';
$route['state/edit/(:any)'] = 'state_c/edit';
$route['state/update/(:any)'] = 'state_c/update';


$route['keyword/index'] = 'keyword_c/invoke';
$route['keyword/detail'] = 'keyword_c/detail';
$route['keyword/add'] = 'keyword_c/add';
$route['keyword/insert'] = 'keyword_c/insert';
$route['keyword/detail/(:any)'] = 'keyword_c/detail';
$route['keyword/edit/(:any)'] = 'keyword_c/edit';
$route['keyword/update/(:any)'] = 'keyword_c/update';



$route['department/index'] = 'department_c/invoke';
$route['department/detail'] = 'department_c/detail';
$route['department/add'] = 'department_c/add';
$route['department/insert'] = 'department_c/insert';
$route['department/detail/(:any)'] = 'department_c/detail';
$route['department/edit/(:any)'] = 'department_c/edit';
$route['department/update/(:any)'] = 'department_c/update';


$route['job_posting/index'] = 'job_posting_c/invoke';
$route['job_posting/detail'] = 'job_posting_c/detail';
$route['job_posting/add'] = 'job_posting_c/add';
$route['job_posting/insert'] = 'job_posting_c/insert';
$route['job_posting/detail/(:any)'] = 'job_posting_c/detail';
$route['job_posting/edit/(:any)'] = 'job_posting_c/edit';
$route['job_posting/update/(:any)'] = 'job_posting_c/update';



$route['job_interview/index'] = 'job_interview_c/invoke';
$route['job_interview/detail'] = 'job_interview_c/detail';
$route['job_interview/add'] = 'job_interview_c/add';
$route['job_interview/insert'] = 'job_interview_c/insert';
$route['job_interview/detail/(:any)'] = 'job_interview_c/detail';
$route['job_interview/edit/(:any)'] = 'job_interview_c/edit';
$route['job_interview/update/(:any)'] = 'job_interview_c/update';


$route['job_center/index'] = 'job_center_c/invoke';
$route['job_center/detail'] = 'job_center_c/detail';
$route['job_center/add'] = 'job_center_c/add';
$route['job_center/insert'] = 'job_center_c/insert';
$route['job_center/detail/(:any)'] = 'job_center_c/detail';
$route['job_center/edit/(:any)'] = 'job_center_c/edit';
$route['job_center/update/(:any)'] = 'job_center_c/update';



$route['admin/employee/index'] = 'employee_c/invoke';
$route['admin/employee/detail'] = 'employee_c/detail';
$route['admin/employee/add'] = 'employee_c/add';
$route['admin/employee/insert'] = 'employee_c/insert';
$route['admin/employee/detail/(:any)'] = 'employee_c/detail';
$route['admin/employee/edit/(:any)'] = 'employee_c/edit';
$route['admin/employee/update/(:any)'] = 'employee_c/update';


$route['admin/registration/index'] = 'job_interview_registration_c/invoke';
$route['admin/registration/detail'] = 'job_interview_registration_c/detail';
$route['admin/registration/add'] = 'job_interview_registration_c/add';
$route['admin/registration/insert'] = 'job_interview_registration_c/insert';
$route['admin/registration/detail/(:any)'] = 'job_interview_registration_c/detail';
$route['admin/registration/edit/(:any)'] = 'job_interview_registration_c/edit';
$route['admin/registration/update/(:any)'] = 'job_interview_registration_c/update';
?>