<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'exam_system');
define('DB_USER', 'root');
define('DB_PASS', '');
define('BASE_URL', 'http://localhost/exam-system');
define('SITE_NAME', 'Online Examination System');

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>