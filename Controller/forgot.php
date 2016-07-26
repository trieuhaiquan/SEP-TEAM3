<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');

class Controller_forgot {

    public $forgot;
    public $params;
    public $current_action;

    function __construct($action, $params) {

        $this->forgot = new Model_mforgot;
        $this->current_action = $action;
        $this->params = $params;
    }

    function backup() {
        require_once "View/layout-default/backup.php";
    }

    function mail() {

        if (isset($_POST['submit'])) {

            $email = $_POST['email'];
            $checkemail = $this->forgot->checkemail($email);
            echo $checkemail;
            if ($checkemail == 1) {
                $laypass = $this->forgot->laypass($email);
                
            } else {
                $errbk = "<div class='alert alert-danger'> <strong>Danger!</strong> Email doesnt exist!!!</div>";
                $_SESSION['errbk'] = $errbk;
                header('location:' . BASE_URL . "forgot/backup");
            }
        }
    }

}
