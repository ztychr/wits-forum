<?php

$messageType = $_GET['return'];
$message = "";

if ($messageType == 'invalidlogin') {
  $message = "Invalid username or password. Please try again.";
}

elseif ($messageType == 'emailexists') {
  $message = "The entered e-mail already exists in the database.";
}

elseif ($messageType == 'userexists') {
  $message = "Username is already taken. Please pick another.";
}

elseif ($messageType == 'usercreated') {
  $message = "User was created successfully.";
}

elseif ($messageType == 'fillinfo') {
  $message = "Please fill in all informations.";
}

elseif ($messageType == 'postcreated') {
  $message = "Your post was successfully created.";
}

elseif ($messageType == 'pleaselogin') {
  $message = "Please log in to see this content.";
}

elseif ($messageType == 'postedited') {
  $message = "Your post was edited.";
}

echo '<p>', $message, '</p>';

?>
