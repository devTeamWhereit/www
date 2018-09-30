<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config["username"] = "root";
$config["password"] = "okok2002";
$config["hostname"] = "ds243212.mlab.com"; // default : localhost
$config["port"] = "43212"; // default : 27017
$config["dbname"] = "whereit_test";
$config["persist"] = true; // default : true
$config["persist_key"] = "ci_mongodb_persist";
$config["replica_set"] = false; // default : false;
$config["connectTimeoutMS"] = 3000;// default : 3 seconds

/* End of file mongo.php

// Generally localhost
$config['host'] = "ds243212.mlab.com";
// Generally 27017
$config['port'] = 43212;
// The database you want to work on
$config['db'] = "whereit_test";
// Required if Mongo is running in auth mode
$config['user'] = "root";
$config['pass'] = "okok2002";


*/