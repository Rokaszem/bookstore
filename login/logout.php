<?php
session_start();
session_destroy();
header("Location: /bookstore2/");
exit();