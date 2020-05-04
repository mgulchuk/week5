<?php

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start a session
session_start();

// Require the autoload file
require_once("vendor/autoload.php");

// Instantiate the F3 Base Class
$f3 = Base::instance();

// Default route
$f3->route('GET /', function($f3)
{
    // create variables in the f3 hive
    $f3->set('username', 'jshmo');
    $f3->set('password', sha1('Password01'));
    $f3->set('title', 'working with templates');
    $f3->set('color', 'purple');
    $f3->set('radius', '10');

    $f3->set('fruits', array('apple', 'orange', 'banana'));

    $f3->set('bookmarks', array('https://www.cnet.com', 'https://www.reddit.com/r/news', 'https://edition.cnn.com/sport'));

    $f3->set('desserts', array("chocolate"=>"Chocolate Mousse", "vanilla"=>"Vanilla Custard", "strawberry"=>"Strawberry Shortcake"));

    //Conditional content
    $f3->set('preferredCustomer', true);
    $f3->set('lastLogin', strtotime('-1 week'));


    $view = new Template();
    echo $view->render('views/info.html');
});

// Run F3
$f3->run();

