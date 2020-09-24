<!DOCTYPE html>
<?php
session_start();
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link href="css/style.css" rel="stylesheet" />

    <title>WITS Forum</title>
  </head>

  <body>
  <div class="content">
    <h1>WITS Forum</h1>
      <div class="navbar">
        <?php
          if ($_SESSION['loggedIn'] == true && isset($_COOKIE['user'])) {
            echo '<a class="nav" href="?action=index">Home</a>';
            echo '<a class="nav" href="?action=forum">Forum</a>';
            echo '<a class="nav" class="logout" href="?action=logout">Log out</a>';
            echo '<div class="username">', $_COOKIE['user'], '</div>';

          }

          else {
            echo '<a class="nav" href="?action=login">Login</a>';
            echo '<a class="nav" href="?action=signup">Sign Up</a>';
            echo '<a class="nav" href="?action=forum">Forum</a>';
          }

        ?>

        <?php
          if ($_GET['action'] == 'logout') {
          session_destroy();
          setcookie('user', $_COOKIE['user'], time() -1);
          header('Location: ?action=login');
        }
        ?>
      </div>

      <?php
      if ($_SESSION['loggedIn'] == true && isset($_COOKIE['user'])) {
    }
    ?>
