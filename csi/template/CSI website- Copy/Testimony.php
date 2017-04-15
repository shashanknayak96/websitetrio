<?php
// date_default_timezone_set('Etc/UTC');

require 'PHPMailer-master/PHPMailerAutoload.php';


 $name = @trim(stripslashes($_POST['tname']));
$email = @trim(stripslashes($_POST['temail']));
$message = @trim(stripslashes($_POST['tmessage']));
  $errors= array();
 
 $image = $_FILES["image"]["name"];
echo $image;
if(isset($_FILES['image'])){

move_uploaded_file($_FILES['image']['tmp_name'],"images/".$_FILES["image"]["name"]);
}
else{
  print_r($errors);
}
 $file = 'images/'.$image;
echo $file;
$mail = new PHPMailer;
$mail->isSMTP();

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';


$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Username = "yagnesh.devashrayee@universalcoe.edu.in";
$mail->Password = "yagnesh12345";
//mail->setFrom('testimonymessages.com', 'Testimony');
$mail->addAddress('yagnesh.devashrayee@universalcoe.edu.in', 'Testimony');
$mail->AddAttachment($file,'myphoto.png');

$mail->Subject = 'Testimonies';
$mail->isHTML(true);
$testimony = '<strong>Name:</strong>'.$name.'.<br><strong>Email-Id:</strong>'.$email.'<br><strong>Message:</strong>'.$message.'.';
$mail->Body = $testimony;

//send the message, check for errors
if (!$mail->send()) {    
  "<script>
   window.location.href='/CSI website- Copy/index.html';
   alert('Sorry, we are experiencing some problems.. Please try again later.);
   </script>
   "
} else {
   "<script>
   window.location.href='/CSI website- Copy/index.html';
   alert('Message sent successfully!);
   </script>
   "
}

?>
