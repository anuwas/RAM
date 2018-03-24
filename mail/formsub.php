<?php
require("PHPMailerAutoload.php");
if($_POST){
    $ContactUsName = $_POST['ContactUsName'];
    $ContactUsEmail = $_POST['ContactUsEmail'];
    $ContactUsPhone = $_POST['ContactUsPhone'];
    $ContactUsPreferredTime = $_POST['ContactUsPreferredTime'];
    $ContactUsPreferredLocation = $_POST['ContactUsPreferredLocation'];
    $ContactUsHowDidYouHearAboutUs = $_POST['ContactUsHowDidYouHearAboutUs'];
    $ContactUsMessage = $_POST['ContactUsMessage'];
    $ContactUsNewPatient = $_POST['ContactUsNewPatient'];
    $subject = $_POST['ContactUsPreferredLocation'];
    $recipients=array();

    
    $mail = new PHPMailer();

    // set mailer to use SMTP
    $mail->IsSMTP();
    $mail->Host = "xxx.com";
    $mail->SMTPAuth = true; 
    $mail->Username = "xxx.com";  // SMTP username
    $mail->Password = ""; // SMTP password
    $mail->From = "xxxs.com";

    //$to = "sidhi.infin@gmail.com";
    
    //$headers = "From: ".$ContactUsEmail . "\r\n";
    /*$headers = "From: ". $ContactUsName . "\r\n" ;
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";*/

    $message = '<html><body>';
    $message .= '<h1>Diamond Physicians</h1>';
    $message .= '</body></html>';
    $message = '<html><body>';
    $message = '<p>The following form has been received:</p>';
    $message .= '';
    $message .= "<p><span>Name:</span>" . strip_tags($ContactUsName) . "</p>";
    $message .= "<p><span>Email : </span><a href='mailto:".strip_tags($ContactUsEmail)."'>" . strip_tags($ContactUsEmail) . "</a></p>";
    $message .= "<p><span>Phone : </span><a href='tel:".strip_tags($ContactUsPhone)."'>" . strip_tags($ContactUsPhone) . "</a></p>";
    $message .= "<p><span>Preferred Time for Complimentary Consultation : </span>" . strip_tags($ContactUsPreferredTime) . "</p>";
    $message .= "<p><span>Preferred Location : </span>" . strip_tags($ContactUsPreferredLocation) . "</p>";
    $message .= "<p><span>How Did You Hear About Us?  </span>" . strip_tags($ContactUsHowDidYouHearAboutUs) . "</p>";
    $message .= "<p><span>Are you a new patient?  </span>" . strip_tags($ContactUsNewPatient) . "</p>";
    $message .= "<p><span>Message : </span>" . strip_tags($ContactUsMessage) . "</p>";
    $message .= "</body></html>";

    if($ContactUsPreferredLocation=='Frisco')
    {
        $mail->AddAddress("drc@diamondphysicians.com","drc");
        $mail->AddAddress("ndyer@diamondphysicians.com","ndyer");
        $mail->AddAddress("diamondfrisco@diamondphysicians.com","diamondfrisco");
        $mail->AddAddress("vermatech2010@gmail.com","vermatech2010");
        $mail->AddAddress("info@medology360.com","info");
        $mail->AddAddress("diamondatl@diamondphysicians.com","diamondatl");
        $mail->AddAddress("drjames@diamondphysicians.com","drjames");
        $mail->AddAddress("sudhu.void@gmail.com","sudu");

        /*$recipients = array(
            "drc@diamondphysicians.com,
ndyer@diamondphysicians.com,
diamondfrisco@diamondphysicians.com,vermatech2010@gmail.com,
info@medology360.com,diamondatl@diamondphysicians.com,drjames@diamondphysicians.com"
        );*/
    }
    
    
    elseif($ContactUsPreferredLocation=='Dallas')
    {
        /*$recipients = array(
            "diamondpc@diamondphysicians.com,info@medology360.com,drjames@diamondphysicians.com"    
        );*/
        $mail->AddAddress("diamondpc@diamondphysicians.com","diamondpc");
        $mail->AddAddress("info@medology360.com","info");
        $mail->AddAddress("drjames@diamondphysicians.com","drjames");
        $mail->AddAddress("sudhu.void@gmail.com","sudu");
        $mail->AddAddress("vermatech2010@gmail.com","vermatech2010");
    }
    elseif($ContactUsPreferredLocation=='North Carrollton')
    {
        /*$recipients = array(
            "drstuart@diamondphysicians.com,
angie@doctorstuart.net,
mrodriguez@diamondphysicians.com,diamondnc@diamondphysicians.com,info@medology360.com,drjames@diamondphysicians.com"
        );*/
        $mail->AddAddress("drstuart@diamondphysicians.com","drstuart");
        $mail->AddAddress("angie@doctorstuart.net","angie");
        $mail->AddAddress("mrodriguez@diamondphysicians.com","mrodriguez");
        $mail->AddAddress("diamondnc@diamondphysicians.com","diamondnc");
        $mail->AddAddress("info@medology360.com","info");
        $mail->AddAddress("drjames@diamondphysicians.com","drjames");
        $mail->AddAddress("sudhu.void@gmail.com","sudu");
        $mail->AddAddress("vermatech2010@gmail.com","vermatech2010");
    }
    $mail->WordWrap = 50;
    $mail->IsHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = $message;

    if(!$mail->Send())
    {
       echo "Message could not be sent. ";
       echo "Mailer Error: " . $mail->ErrorInfo;
       exit;
    }else{
    echo "Message has been sent";
    }

}else{
    
}

?>

