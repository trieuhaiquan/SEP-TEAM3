<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');

class Controller_index {

    public $time;
    public $params;
    public $current_action;
    public $cname = "index";

    function __construct($action, $params) {

        $this->time = new Model_mindex;
        $this->current_action = $action;
        $this->params = $params;
    }

    function index() {
        $user = $this->time->user();
        require_once "View/layout-default/index.phtml";
    }

    function trangchu() {
        if (isset($_SESSION['login_id'])) {
            $iduser = $_SESSION['login_id'];
            $tag = $this->time->tag($iduser);
            $managetime = $this->time->managetime($iduser);
        }
        require_once 'View/layout-default/trangchu.phtml';
    }

    function managetag() {
        if (isset($_SESSION['login_id'])) {
            $iduser = $_SESSION['login_id'];
            $tag = $this->time->tag($iduser);
            $managetime = $this->time->managetime($iduser);
        }
        require_once 'View/layout-default/trangchu.phtml';
    }

    function addtags() {
        if (isset($_SESSION['login_id'])) {

            $iduser = $_SESSION['login_id'];
            $tag = $this->time->tag($iduser);
            $sstag = mb_strtolower($_POST['tag']);
            foreach ($tag as $t) {
                $sstag2 = mb_strtolower($t['tentag']);
                if ($sstag == $sstag2) {
                    $errtag = "<div class='alert alert-danger'> <strong>Importtant! This Tag Already Exists</strong></div>";
                    $_SESSION['errtag'] = $errtag;
                    header('location:' . BASE_URL . "index/managetag");
                    exit();
                }
            }
            if (isset($_POST['tag'])) {

                $tag = $_POST['tag'];
                unset($_SESSION['errtag']);
                $iduser = $_SESSION['login_id'];
                $addtag = $this->time->addtag($tag, $iduser);
                header('location:' . BASE_URL . "index/managetag");
            } else
                echo'You didnt input name of tag';
        }
        header('location:' . BASE_URL . "index/managetag");
    }

    function xoatag() {
        if (isset($_SESSION['login_id'])) {

            $iduser = $_SESSION['login_id'];
            $idtag = $this->params[0];
            $xoatag = $this->time->xoatag($idtag, $iduser);
            header('location:' . BASE_URL . "index/managetag");
        }
        header('location:' . BASE_URL . "index/managetag");
    }

    function fixtag() {
        if (isset($_SESSION['login_id'])) {
            if (isset($_POST['tag'])) {
                $iduser = $_SESSION['login_id'];
                $tag = $_POST['tag'];
                $idtag = $this->params[0];
                $fixtag = $this->time->fixtag($tag, $idtag, $iduser);
                header('location:' . BASE_URL . "index/managetag");
            } else
                echo'You didnt input name of tag';
        }
        header('location:' . BASE_URL . "index/managetag");
    }

    function managetime() {
        if (isset($_SESSION['login_id'])) {
            $iduser = $_SESSION['login_id'];
            $tag = $this->time->tag($iduser, $iduser);
            $managetime = $this->time->managetime($iduser);
        }
        require_once 'View/layout-default/trangchu.phtml';
    }

    function addtime() {
        if (isset($_SESSION['login_id'])) {
            $iduser = $_SESSION['login_id'];
            $managetime = $this->time->managetime($iduser);
            $iduser = $_SESSION['login_id'];
            $a = strtotime($_POST['timestart']);
            $b = strtotime($_POST['timeend']);
            $c = time();
            $ss = $b-$a;


            foreach ($managetime as $t) {
                $tstart = strtotime($t['timestart']);
                $tend = strtotime($t['timeend']);
            }


            if ($a < $c) {
                $errtime = "<div class='alert alert-danger'> <strong>Danger!</strong> Time Start must be than now time.</div>";
                $_SESSION['errtime'] = $errtime;
                header('location:' . BASE_URL . "index/managetime");
            } elseif (isset($tstart) && ((($a >= $tstart) && ($a <= $tend)) || (($b >= $tstart) && ($b <= $tend)) || (($a <= $tstart) && ($b >= $tend)))) {
                $errtime = "<div class='alert alert-danger'> <strong>Danger!</strong> This time used.</div>";
                $_SESSION['errtime'] = $errtime;
                header('location:' . BASE_URL . "index/managetime");
            } elseif ($a > $b) {
                $errtime = "<div class='alert alert-danger'> <strong>Danger!</strong> Time Start Can't not be larger than Time end</div>";
                $_SESSION['errtime'] = $errtime;
                header('location:' . BASE_URL . "index/managetime");
            } 
            elseif($ss>28800)
            {
                $errtime = "<div class='alert alert-danger'> <strong>Danger!</strong> Range of time can not more than 8 hours</div>";
                $_SESSION['errtime'] = $errtime;
                header('location:' . BASE_URL . "index/managetime");
            }
              
            elseif (isset($_POST['tag'])) {

                $idtag = $_POST['tag'];
                $timestart = $_POST['timestart'];
                $timeend = $_POST['timeend'];
                $timestart2 = $_POST['timestart'];
                $timeend2 = $_POST['timeend'];
                $priority = $_POST['priority'];
                $totalestimate = strtotime($timeend) - strtotime($timestart);
                $addtime = $this->time->addtime($idtag, $timestart, $timeend, $priority, $timestart2, $timeend2, $totalestimate, $iduser);
                unset($_SESSION['errtime']);
                header('location:' . BASE_URL . "index/managetime");
            }
        }
        header('location:' . BASE_URL . "index/managetime");
    }

    function xoatime() {
        if (isset($_SESSION['login_id'])) {
            $idtime = $this->params[0];
            $iduser = $_SESSION['login_id'];
            $xoatime = $this->time->xoatime($idtime, $iduser);
            header('location:' . BASE_URL . "index/managetime");
        }
        header('location:' . BASE_URL . "index/managetime");
    }

    function fixtime() {
        if (isset($_SESSION['login_id'])) {
            
            $iduser = $_SESSION['login_id'];
            $managetime = $this->time->managetime($iduser);
            $iduser = $_SESSION['login_id'];
            $a = strtotime($_POST['timestart']);
            $b = strtotime($_POST['timeend']);
            $c = time();
            $ss = $b-$a;


            foreach ($managetime as $t) {
                $tstart = strtotime($t['timestart']);
                $tend = strtotime($t['timeend']);
            }


            if ($a < $c) {
                $errtime = "<div class='alert alert-danger'> <strong>Danger!</strong> Time Start must be than now time.</div>";
                $_SESSION['errtime'] = $errtime;
                header('location:' . BASE_URL . "index/managetime");
            } elseif (isset($tstart) && ((($a >= $tstart) && ($a <= $tend)) || (($b >= $tstart) && ($b <= $tend)) || (($a <= $tstart) && ($b >= $tend)))) {
                $errtime = "<div class='alert alert-danger'> <strong>Danger!</strong> This time used.</div>";
                $_SESSION['errtime'] = $errtime;
                header('location:' . BASE_URL . "index/managetime");
            } elseif ($a > $b) {
                $errtime = "<div class='alert alert-danger'> <strong>Danger!</strong> Time Start Can't not be larger than Time end</div>";
                $_SESSION['errtime'] = $errtime;
                header('location:' . BASE_URL . "index/managetime");
            } 
            elseif($ss>28800)
            {
                $errtime = "<div class='alert alert-danger'> <strong>Danger!</strong> Range of time can not more than 8 hours</div>";
                $_SESSION['errtime'] = $errtime;
                header('location:' . BASE_URL . "index/managetime");
            }
            
            elseif (isset($_POST['tag'])) {
                $idtag = $_POST['tag'];
                $timestart = $_POST['timestart'];
                $timeend = $_POST['timeend'];
                $timestart2 = $_POST['timestart'];
                $timeend2 = $_POST['timeend'];
                $priority = $_POST['priority'];
                $totalestimate = strtotime($timeend) - strtotime($timestart);
                $idtime = $this->params[0];
                $iduser = $_SESSION['login_id'];
                $fixtime = $this->time->fixtime($idtag, $timestart, $timeend, $priority, $timestart2, $timeend2, $idtime, $totalestimate, $iduser);
                header('location:' . BASE_URL . "index/managetime");
            } else
                echo'You didnt input name of tag';
        }
        header('location:' . BASE_URL . "index/managetime");
    }

    function updatetime() {
        if (isset($_SESSION['login_id'])) {
            $iduser = $_SESSION['login_id'];
            $managetime3 = $this->time->managetime3($iduser);
            if ($managetime3 == 0) {
                $idtime = $this->params[0];
                $updatetime = $this->time->updatetime($idtime, $iduser);
                unset($_SESSION['errtime']);
                header('location:' . BASE_URL . "index/managetime");
            } else {
                $errtime = "<div class='alert alert-danger'> <strong>Danger!</strong> You are Working other work</div>";
                $_SESSION['errtime'] = $errtime;
                header('location:' . BASE_URL . "index/managetime");
            }
        }
        header('location:' . BASE_URL . "index/managetime");
    }

    function endtime() {
        if (isset($_SESSION['login_id'])) {
            $iduser = $_SESSION['login_id'];
            $idtime = $this->params[0];
            $time = time();
            $managetime2 = $this->time->managetime2($idtime, $iduser);
            foreach ($managetime2 as $t) {
                $tstart = strtotime($t['timestartreal']);
            }
            $total = $time - $tstart;
            $endtime = $this->time->endtime($idtime, $total, $iduser);
            unset($_SESSION['errtime']);
            header('location:' . BASE_URL . "index/managetime");
        }
        header('location:' . BASE_URL . "index/managetime");
    }

    function workdone() {
        if (isset($_SESSION['login_id'])) {
            $iduser = $_SESSION['login_id'];
            $tag = $this->time->tag($iduser);
            $managetime = $this->time->managetime($iduser);
            $workdone = $this->time->workdone($iduser);
        }
        require_once 'View/layout-default/trangchu.phtml';
    }

    function report() {
        if (isset($_SESSION['login_id'])) {
            $iduser = $_SESSION['login_id'];
            $tag = $this->time->tag($iduser);
            $managetime = $this->time->managetime($iduser);
        }
        require_once 'View/layout-default/trangchu.phtml';
    }

// thanh chi here 
    function searchreport() {
        if (isset($_SESSION['login_id'])) {
            if (isset($_POST['submit'])) {
                $a = strtotime($_POST['start']);
                $b = strtotime($_POST['end']);
                $c = time();
                if($a> $b)
                {
                     $errreport = "<div class='alert alert-danger'> <strong>Danger!</strong> Time End Must Be More Than Time Start</div>";
                     $_SESSION['errreport'] = $errreport;
                     header('location:' . BASE_URL . "index/report");
                     
                }
                elseif($a>$c)
                {
                     $errreport = "<div class='alert alert-danger'> <strong>Danger!</strong> Time Start Must Be In Past</div>";
                     $_SESSION['errreport'] = $errreport;
                     header('location:' . BASE_URL . "index/report");
                     
                }
                else
                {
                $tag = $_POST['tag'];
                $dstart = $_POST['start'];
                $dend = $_POST['end'];
                $iduser = $_SESSION['login_id'];
                unset($_SESSION['errreport']);
                $search = $this->time->search($tag, $dstart, $dend, $iduser);
                $_SESSION['search'] = $search;
                header('location:' . BASE_URL . "index/report");
                }
            }
        }
        header('location:' . BASE_URL . "index/report");
    }

    function export() {
        if (isset($_SESSION['login_id'])) {
            $iduser = $_SESSION['login_id'];
            $managetime = $this->time->managetime($iduser);
            require_once 'View/layout-default/trangchu.phtml';
        }
    }

    

    function register() {
     
            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $pass1 = $_POST['pass1'];
                $pass2 = $_POST['pass2'];
                if ($pass1 != $pass2) {
                    $errregis = 'Password Confirm wrong';
                    $_SESSION['errregis'] = $errregis;
                    header('location:' . BASE_URL);
                } else {

                    $register = $this->time->register($name, $email, $pass1, $pass2);
                    unset($_SESSION['errregis']);
                    $thanhcong = 'Register Success';
                    $_SESSION['resuc'] = $thanhcong;
                    header('location:' . BASE_URL);
                }
            }

    }

    function login() {

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $pass = md5($_POST['pass']);
            $login = $this->time->login($email, $pass);
            if ($login == true) {
                unset($_SESSION['fail']);
                header('location:' . BASE_URL . "index/trangchu");
            } else {
                $fail = '<i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:red;font-weight:bolder;">Email or Password Wrong!!!!</i>';
                $_SESSION['fail'] = $fail;

                header('location:' . BASE_URL);
            }
            ;
        }
    }

    function logout() {
        session_destroy();
        header('location:' . BASE_URL);
    }

    function xoadone() {
        if (isset($_SESSION['login_id'])) {
            $iduser = $_SESSION['login_id'];
            $idtime = $this->params[0];
            $xoadone = $this->time->xoadone($idtime, $iduser);
            header('location:' . BASE_URL . "index/workdone");
        }
        header('location:' . BASE_URL . "index/workdone");
    }

    function changepass() {
        if (isset($_SESSION['login_id'])) {
            $iduser = $_SESSION['login_id'];
            $managetime = $this->time->managetime($iduser);
            require_once 'View/layout-default/trangchu.phtml';
        }
    }
    function changepass2()
    {
       
             if(isset($_POST['submit']))
             {
                     if($_POST['pass1'] != $_POST['pass2'])
                     {
                         $errchange = "<div class='alert alert-danger'> <strong>Danger!</strong> Wrong confirm password</div>";
                         $_SESSION['errchange'] = $errchange;
                         header('location:' . BASE_URL . "index/changepass");
                     }
                     elseif(md5($_POST['passcu']) != $_SESSION['password'])
                     {
                         $errchange = "<div class='alert alert-danger'> <strong>Danger!</strong> Wrong confirm password</div>";
                         $_SESSION['errchange'] = $errchange;
                         header('location:' . BASE_URL . "index/changepass");
                     }
                     else
                     {
                     $pass1 = md5($_POST['pass1']);
                     $iduser = $_SESSION['login_id'];
                     $changepass = $this->time->changepass($pass1,$iduser);
                     unset($_SESSION['errchange']);
                     header('location:' . BASE_URL . "index/thanhcong");
                     
                     }

                 
             }
        
    }
    function thanhcong()
    {
            if (isset($_SESSION['login_id'])) {
            $iduser = $_SESSION['login_id'];
            $managetime = $this->time->managetime($iduser);
            require_once 'View/layout-default/trangchu.phtml';
        }
    }

}
