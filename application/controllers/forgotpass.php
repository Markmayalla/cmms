<?php

include 'ChromePhp.php';


class Forgot_password extends CI_Controller{

     public function ForgotPassword()
   {
   	      
         $email = $this->input->post('email');      
         $findemail = $this->account_model->ForgotPassword($email);  
           $findemail = $this->user_model->ForgotPassword($email); 
         if($findemail){
          $this->account_model->sendpassword($findemail);   
           $this->user_model->ForgotPassword($findemail);      
           }else{
          $this->session->set_flashdata('msg',' Email not found!');
          redirect(base_url().'index.php/web/login','refresh');
      }
   }

    public function ForgotPass($email)
 {
        $this->db->select('email');
        $this->db->from('accounts'); 
        $this->db->where('email', $email); 
        $query=$this->db->get();
        return $query->row_array();
 }
 public function sendpassword($data)
{
        $email = $data['email'];
        $query1=$this->db->query("SELECT *  from accounts where email = '".$email."' ");
        $row=$query1->result_array();
        if ($query1->num_rows()>0)
      
{
        $passwordplain = "";
        $passwordplain  = rand(999999999,9999999999);
        $newpass['password'] = md5($passwordplain);
        $this->db->where('email', $email);
        $this->db->update('accounts', $newpass); 
        $mail_message='Dear '.$row[0]['email'].','. "\r\n";
        $mail_message.='Thanks for contacting regarding to forgot password,<br> Your <b>Password</b> is <b>'.$passwordplain.'</b>'."\r\n";
        $mail_message.='<br>Please Update your password.';
        $mail_message.='<br>Thanks & Regards';
        $mail_message.='<br>Your company name';        
        date_default_timezone_set('Etc/UTC');
        require FCPATH.'assets/PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPSecure = "tls"; 
        $mail->Debugoutput = 'html';
        $mail->Host = "smtp.mailtrap.io";
        $mail->Port =2525;
        $mail->SMTPAuth = true;   
        $mail->Username = "362c96389549af";    
        $mail->Password = "d9dfbec3dde260";
        $mail->setFrom('from@exampe.com', 'Example');
        $mail->IsHTML(true);
        $mail->addAddress($email);
        $mail->Subject = 'OTP from company';
        $mail->Body    = $mail_message;
        $mail->AltBody = $mail_message;
if (!$mail->send()) {
     $this->session->set_flashdata('msg','Failed to send password, please try again!');
} else {
   $this->session->set_flashdata('msg','Password sent to your email!');
}
  redirect(base_url().'index.php/web/login/','refresh');        
}
else
{  
 $this->session->set_flashdata('msg','Email not found try again!');
 redirect(base_url().'index.php/web/login/','refresh');
}
}

}



?>