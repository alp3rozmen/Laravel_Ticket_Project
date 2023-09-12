<?php
session_start();
session_destroy();
redirect()->to('/login')->send();
exit;
?>