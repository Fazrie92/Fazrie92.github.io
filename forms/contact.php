<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'fazrie64@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = $_POST['nama'];
  $contact = $_POST['email'];
  $contact = $_POST['topik'];
  $contact = $_POST['pesan'];
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['nama'];
  $contact->from_email = $_POST['email'];
  $contact->topik = $_POST['topik'];
  $contact->pesan = $_POST['pesan'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['nama'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['topik'], 'topik', 30);
  $contact->add_message( $_POST['pesan'], 'pesan', 100);

  echo $contact->send();
?>