<?php

use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */

// NAVIGATION BAR
$routes->get('/home', 'HomeController::home');
$routes->get('/contact-us', 'HomeController::contactUs');
$routes->get('/banner', 'HomeController::banner');

// REGISTRATION
$routes->get('registration', 'RegistrationController::register');
$routes->post('registration/processForm', 'RegistrationController::processForm');

// LOGIN
$routes->get('login', 'LoginController::login'); // Removed extra space here
$routes->post('login/processLogin', 'LoginController::processLogin');

// NEWS
$routes->get('news', 'NewsController::news');
$routes->get('news/(:segment)', 'NewsController::show/$1');
$routes->get('news/create', 'NewsController::create');
$routes->post('news/store', 'NewsController::store');

// SOS
$routes->get('security', 'SecurityController::sos');
$routes->post('security/capture-fire-incident', 'SecurityController::captureFireIncident');
$routes->post('security/send-to-admin-dashboard', 'SecurityController::sendToAdminDashboard');
