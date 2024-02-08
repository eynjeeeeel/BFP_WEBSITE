<?php

use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */


// ---------------------USER WEBSITE------------------------------------

// LOGIN
$routes->get('login', 'LoginController::login');
$routes->post('login/processLogin', 'LoginController::processLogin');

// REGISTRATION
$routes->get('registration', 'RegistrationController::register');
$routes->post('registration/processForm', 'RegistrationController::processForm');

// NAVIGATION BAR
$routes->get('/home', 'HomeController::home');
$routes->get('/contact-us', 'HomeController::contactUs');
$routes->get('/banner', 'HomeController::banner');
$routes->get('/logout', 'HomeController::logout');

// ---------------------ADMIN DASHBOARD------------------------------------
// ADMIN LOGIN
$routes->get('admin-login', 'ALoginController::adminlogin');
$routes->post('admin-login/processLogin', 'ALoginController::adminprocessLogin');

// ADMIN REGISTRATION
$routes->get('admin-registration', 'ARegistrationController::adminregister');
$routes->post('admin-registration/processForm', 'ARegistrationController::adminprocessForm');

// ADMIN DASHBOARD HEADER NAVIGATION BAR 
$routes->get('/admin-home', 'ANavigationController::adminHome');
$routes->get('/admin-manage', 'ANavigationController::adminManage');
$routes->get('/admin-logout', 'ANavigationController::adminLogout');

// ---------------------OTHER FUNCTIONS------------------------------------
// NEWS
$routes->get('news', 'NewsController::news');
$routes->get('news/(:segment)', 'NewsController::show/$1');
$routes->get('newscreate', 'NewsController::newscreate');
$routes->post('news/store', 'NewsController::store');
$routes->post('news/edit', 'NewsController::edit');
$routes->post('news/update', 'NewsController::update');
$routes->get('delete/(:segment)', 'NewsController::delete/$1'); 


// SOS
$routes->get('security', 'SecurityController::sos');
$routes->post('security/capture-fire-incident', 'SecurityController::captureFireIncident');
$routes->post('security/send-to-admin-dashboard', 'SecurityController::sendToAdminDashboard');


$routes->get('user-location', 'LocationController::showUserLocation');
$routes->post('location/update', 'LocationController::updateLocation');
