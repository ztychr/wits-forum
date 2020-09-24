<?php

  session_start();


  $username = $_GET['username'];
  $password = $_GET['password'];
  $users = [];
  $userExists = false;
  $loggedIn = false;

  if (file_exists('users.txt')) {
    $string = file_get_contents('users.txt');
    $users  = json_decode($string, true);
  }

    foreach ($users as $u) {

      if ( $u['username'] == $username && $u['password'] == $password ) {
        #echo 'User ', $username, ' logged in.';
        $userExists = True;
        $loggedIn = True;
        break;
      }
    }

    if ($userExists == true && $loggedIn == true) {
      //$_SESSION['user'] = $_GET['username'];
      $_SESSION['loggedIn'] = true;
      setcookie('user', $_GET['username'], null, "/", null, null, false);

      header('Location: ../?action=index');

    }

    else {
      header('Location: ../?action=login&return=invalidlogin');
    }


?>
