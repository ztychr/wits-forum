<?php
  $user = [
    'username'  => $_POST['username'],
    'firstname' => $_POST['firstname'],
    'lastname'  => $_POST['lastname'],
    'email'     => $_POST['email'],
    'password'  => $_POST['password'],
  ];

  $users = [];
  $userExists = False;
  $emailExists = False;

  if (file_exists('users.txt'))
  {
    $string = file_get_contents('users.txt');
    $users  = json_decode($string, true);
  }

  foreach ($users as $u) {
    if ( $u['username'] == $_POST['username'] ) {
      $userExists = True;
      header('Location: ../?action=signup&return=userexists');
      exit;
    }

    if ( $u['email'] == $_POST['email']) {
      $emailExists = True;
      header('Location: ../?action=signup&return=emailexists');
      exit;
    }
  }

  if (empty($_POST['username']) || empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['password'])) {
    header('Location: ../?action=signup&return=fillinfo');
  }

  elseif (isset($_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']) && $emailExists == False && $userExists == False) {

    $users[] = $user;

    $string = json_encode($users);
    file_put_contents('users.txt', $string);

    header('Location: ../?action=login&return=usercreated');
    exit;
  }

?>
