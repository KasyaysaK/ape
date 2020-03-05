<?php

include('log4php/Logger.php');
Logger::configure('config.xml');
$log = Logger::getLogger('myLogger');
$log->debug("Debug"); 
$log->info("Info");    
$log->warn("Warn");   
$log->error("Error");   
$log->fatal("Fatal"); 

require_once('Router.php');
require('autoload.php');
$router = new Router();
$router->request();