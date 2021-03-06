<?php
$page_title = "Register";
$hide_sidebars = true;
define('OSW_IN_SYSTEM', true);
require_once('inc/header.php');

if (!$user_uuid) {
	if (isset($_POST['process'])) {
		if ($osw->Users->register_user()) {
			switch ($osw->config['activation_type']) {
				default:
                    echo "REGISTER_SUCCESS_NO_ACTIVATION";
                    break;
				case 1:
                    echo "REGISTER_SUCCESS_USER_ACTIVATION";
                    break;
				case 2:
                    echo "REGISTER_SUCCESS_ADMIN_ACTIVATION";
                    break;
            }
		}else{
            echo "Registration failed. Please try again. If the problem persist please contact a OpenSimWeb developer.";
		}
	}else{
        require_once('register_form.php');
	}
}else{
    echo "You are already logged in.";
}

require_once('inc/footer.php');
?>