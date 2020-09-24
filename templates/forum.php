<h2>Forum posts</h2>

<?php



$decodedPosts = [];

if (file_exists('php/posts.txt')) {
  $jsonPosts = file_get_contents('php/posts.txt');
  $decodedPosts  = json_decode($jsonPosts, true);
}

foreach ($decodedPosts as $p) {
  echo '<p><a class="post" href="?action=post&id=', $p['id'], '">', $p['title'], '</a> posted by: ', $p['author'], ' </p>' ;
}

if ($_SESSION['loggedIn'] == true) {
echo '<button class="button" onclick="window.location.href = \'?action=newpost\';">New Post</button>';
}
else {
  echo 'You must be logged in to write new posts.';
}

?>
