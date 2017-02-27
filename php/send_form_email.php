<?php
 
if(isset($_POST['email'])) {

    $email_to = "markkea95@gmail.com";
 
    $email_subject = "Bericht van markkea.nl"; 
     
 
    function died($error) {
 
        echo "Er zijn errors opgetreden:<br />"; 
 
        echo $error."<br /><br /><br />";
 
        echo "Gaat u terug en om de foutmeldingen te verhelpen<br /><br />";
 
        die();
 
    }
 
 
    if(!isset($_POST['voornaam']) ||
 
        !isset($_POST['achternaam']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['onderwerp']) ||
 
        !isset($_POST['bericht'])) {
 
        died('Er is een probleem opgetreden.');       
 
    }
 
     
 
    $voornaam = $_POST['voornaam']; // required
 
    $achternaam = $_POST['achternaam']; // required
 
    $email_from = $_POST['email']; // required
 
    $onderwerp = $_POST['onderwerp']; // not required
 
    $bericht = $_POST['bericht']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'De ingevoerde email geeft een foutmelding.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$voornaam)) {
 
    $error_message .= 'De ingevoerde voornaam geeft een foutmelding.<br />';
 
  }
 
  if(!preg_match($string_exp,$achternaam)) {
 
    $error_message .= 'De ingevoerde achternaam geeft een foutmelding.<br />';
 
  }
 
  if(strlen($bericht) < 2) {
 
    $error_message .= 'Het bericht geeft een foutmelding.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Het bericht hieronder.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Voornaam: ".clean_string($voornaam)."\n";
 
    $email_message .= "Achternaam: ".clean_string($achternaam)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Onderwerp: ".clean_string($onderwerp)."\n";
 
    $email_message .= "Bericht: ".clean_string($bericht)."\n";
 
     
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
Het verzenden is gelukt!
  
<?php
 
}
 
?>