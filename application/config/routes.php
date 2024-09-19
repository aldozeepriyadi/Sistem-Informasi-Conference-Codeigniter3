<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'landingpage';

// route dashboard
$route['landingpage'] = 'landingpage';


$route['404_override'] = 'landingpage/notfound';
$route['translate_uri_dashes'] = FALSE;
