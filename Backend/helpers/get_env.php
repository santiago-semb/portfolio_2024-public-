<?php 
require 'set_global_env_variables.php';

#$dotenv = new Dotenv("$_SERVER[DOCUMENT_ROOT]\portfolio_2024\.env");
$dotenv = new Dotenv("$_SERVER[DOCUMENT_ROOT]/.env");
$dotenv->load();
