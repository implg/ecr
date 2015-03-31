<?php
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) ) {

  $to = "brunov@mail.ru";
  $name = $_POST['name'];
  $subject = "Form submission";
  $message = $name . " wrote the following: " . "\n\n" . $_POST['message'] . "\n\n" . $_POST['email'];
  $headers = "From: brunov@mail.ru"."\r\n" . "Reply-To: brunov@mail.ru"."\r\n";
  mail($to, $subject, $message, $headers);

} else {

  header("Location: index.html");
  exit();

}
?>