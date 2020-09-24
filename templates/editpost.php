
<?php
if ($_SESSION['loggedIn'] == false) {
  header('Location: ?action=login&return=pleaselogin');
}

$decodedPosts = [];
$id = "";
$title = "";
$content = "";

if (file_exists('php/posts.txt')) {
  $jsonPosts = file_get_contents('php/posts.txt');
  $decodedPosts  = json_decode($jsonPosts, true);
}

foreach ($decodedPosts as $p) {
  if ($p['id'] == $_GET['id']) {
    $id = $p['id'];
    $title = $p['title'];
    $content = $p['content'];
  }
}

?>

<h2>Edit post</h2>

<form action="php/saveedited.php" method="post">
  <p>Title:</p>

  <input type="hidden" name="id" value="<?php echo $id; ?>">

  <input type="text" name="title" value="<?php echo $title;?>"><br><br>

  <p>Text:</p>
  <textarea name="content" rows="10" cols="80"><?php echo $content;?></textarea>
  <br> <br>

  <input class="button" type="submit" value="Save">

</form>
<button class="button" onclick="window.location.href = '?action=forum';">Cancel</button>
