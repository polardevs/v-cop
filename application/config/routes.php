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
// $route['^(en|th)/importcar/(:num)$'] = "import_car/get_importcar_by_id/$2";
// $route['ebook/(:num)$'] = 'home/detail/1/$1';
// $route['video/(:num)$'] = 'home/detail/2/$1';
// $route['category/(:num)$'] = 'home/category/$1';
// $route['sort/(:any)$'] = 'home/sort/$1';
// $route['group/(:num)/category/(:num)$'] = 'home/category/$1/$2';
// $route['service/(:any)$'] = 'home/service/$1';

$route['404_override'] = '';

$route['test'] = "welcome/test";
$route['default_controller'] = "home";
$route['register'] = 'home/Register';
$route['redirect'] = 'home/Redirect';
$route['showcorp'] = 'home/ShowCorp';
$route['forgot'] = 'home/Forgot';
$route['welcome'] = 'welcome';
$route['provincestat'] = 'home/ProvinceStat';
$route['download'] = 'home/Download';

$route['update'] = 'update';
$route['update/student'] = 'update/StudentUpdate';

$route['school'] = 'school';
$route['school/list'] = 'school/viewList';
$route['corp'] = 'school';
$route['corp/list'] = 'school/viewList';

$route['misCollege'] = 'mis';
$route['dekdeeAcheeva'] = 'dekdee';

$route['news'] = 'news';
$route['activity'] = 'news';
$route['newsdtl/(:num)$'] = 'news/detail';
$route['activitydtl/(:num)$'] = 'news/detail';


$route['student'] = 'student';
$route['student-profile'] = 'student/Profile';
$route['work-history'] = 'student/WorkHistory';
$route['train-history'] = 'student/TrainHistory';
$route['portfolio-student'] = 'student/Portfolio';
$route['portfolio-student/add'] = 'student/AddPortfolio';
$route['portfolio-student/Upd'] = 'student/UpdPortfolio';

$route['apprentice'] = 'student/Apprentice';

$route['student-manage'] = 'student/User';
$route['transcript-student'] = 'student/Transcript';

$route['profile-company'] = 'company/Profile';
$route['coordinator/add'] = 'company/AddCoordinator';
$route['position'] = 'company/Position';
$route['comapany-manage'] = 'company/User';


$route['position/add'] = 'jobs/AddPosition';
$route['position/update'] = 'jobs/UpdatePosition';
$route['jobdetail'] = 'jobs';
$route['favorites-jobs'] = 'jobs/Favorites';

$route['apply-job'] = 'Application/ApplyJob';
$route['mailbox'] = 'Application/Mailbox';
$route['position/company-apprentice'] = 'Application/Apprentice';
$route['position/comapany-mail'] = 'Application/cMail';

$route['showresume'] = 'Resume';

$route['sjobs'] = 'searchJobs';
$route['quick-job'] = 'searchJobs/QuickJob';
$route['new-job'] = 'searchJobs/NewJob';
$route['search-jobs'] = 'searchJobs/StudentJobs';

$route['spersons'] = 'searchPersons';
$route['company-find'] = 'searchPersons/SearchPersons';
$route['favorites-persons'] = 'searchPersons/Favorites';

$route['analysis-report'] = 'report/Analysis';
$route['staft'] = 'report/Stafts';
$route['vcop-rank'] = 'report/Ranks';
$route['rank-file'] = 'report/RankFiles';
$route['report/student'] = 'report/Student';

/* End of file routes.php */
/* Location: ./application/config/routes.php */