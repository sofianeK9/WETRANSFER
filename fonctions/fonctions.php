<?php
session_start();
session_destroy();
header("Location: /WeTransfer/pages/connexion.php");
exit();


