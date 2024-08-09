<?php
session_start();
session_destroy();
header("Location:index.php?sucess=Succesfully logout. Enter Your details to log in");
