<?php

class Model_mforgot {

    public $db;

    public function __construct() {
        $this->db = new mysqli(HOST, USER_DB, PASS_DB, DB_NAME);
        $this->db->set_charset("utf8");
    }

    function laypass($email) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $size = strlen( $chars );
        for( $i = 0; $i < 6; $i++ ) {
        $str .= $chars[ rand( 0, $size - 1 ) ];
         }
         
        $tennguoigui = 'K19T1-TEAM3';
        $to_email = trim(strip_tags($email));
        $from_email = 'trieuhaiquan95@gmail.com';
        $tieude = 'Reset Your Password';
        $noidung = '<h1>Hi i am from MNTIME.TODAY</h1> <p>Your new password is :<H2>'. $str .'</H2></p>';
        //$noidung = str_replace("\r\n", "<br/>", $noidung);
        $username = $from_email; // Tài khoản gmail dùng để gửi thư
        $password = 'Quanmap123'; // mật khẩu của tài khoản gửi mail
        require_once 'PHPMailerAutoload.php';
        $mail = new PHPMailer();
        $mail->isSMTP(); //Tell PHPMailer to use SMTP
        $mail->SMTPDebug = 2; //0=off,1=client messages,2=client and server messages
        $mail->Debugoutput = 'html';
        $mail->CharSet = 'UTF-8';
        $mail->ContentType = 'text/html; charset=utf-8\r\n';
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;  //25,465 or 587	
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->Username = $username;
        $mail->Password = $password;
        $mail->setFrom($from_email, $tennguoigui);
        $mail->AddReplyTo($from_email, $from_email . ' Reply');
        $mail->addAddress($to_email);
        $mail->Subject = $tieude;
        $mail->msgHTML($noidung);
        
        
        echo $sql = "UPDATE user SET `pass`=md5('$str') WHERE `email`='$email'";
        if (!$rs = $this->db->query($sql))
            die($this->db->error);
        
        //$mail2 =['tennguoigui'=>$tennguoigui,'nguoinhan'=>$to_email,'tieude'=>$tieude,'noidung'=>$noidung,'file'=>$url];
        if (!$mail->send())
            return "<h3 style='color:red;'> Lỗi: " . $mail->ErrorInfo . "</h3>";
        else
            return "<h3 style='color:green;'> Đã gửi mail tới " . $to_email . "</h3>";
        
   
    }

    public function checkemail($email) {
        $data = array();
        $sql = "select count(email) as email from user where `email`='$email'";
        $rs = $this->db->query($sql) or die($this->db->error);
        $row = $rs->fetch_row();
        $dem = $row[0];
        return $dem;
    }
    

}
