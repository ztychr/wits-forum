
<?php
if ($_SESSION['loggedIn'] == false) {
  header('Location: ?action=login');
}
?>

<h2>Home</h2>

<p>Welcome to the WITS Forum. Please visit the forum page to talk to other people and create posts.</p>
