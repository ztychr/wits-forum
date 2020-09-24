<h2>New Post</h2>


<?php
if ($_SESSION['loggedIn'] == false) {
  header('Location: ?action=login&return=pleaselogin');
}
?>

<form action="php/createpost.php" method="post">
  <p>Title:</p>
  <input type="text" name="title"><br><br>

  <p>Text:</p>
  <textarea name="content" rows="10" cols="80"></textarea>
  <br> <br>

  <input class="button" type="submit" value="Save">
  <button class="button" onclick="window.location.href = '?action=forum';">Cancel</button>

</form>
