<?php
session_start();
//session_destroy();
unset($_SESSION['MEMBER']);
//landing page
header('Location:http://localhost/TugasProyek/PWL/php/index.php?hal=home');    