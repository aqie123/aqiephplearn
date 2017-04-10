<?php
ini_set('session.cookie_lifetime','3600');
ini_set('session.cookie_domain','.aqie.com');
session_start();
var_dump($_SESSION);