<?php include '../../config/init.php' ?>
<?php confirm_login(); ?>

<?php

session_unset();
session_destroy();
Redirect_to("../../index.php");

?>
