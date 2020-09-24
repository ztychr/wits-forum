<?php
$decodedPosts = [];

$title   = $_POST['title'];
$content = $_POST['content'];
$id      = $_POST['id'];
$index = 0;

if (file_exists('posts.txt')) {
  $jsonPosts = file_get_contents('posts.txt');
  $decodedPosts  = json_decode($jsonPosts, true);
}

foreach ($decodedPosts as $p) {
  if ($p['id'] == $id) {
    $decodedPosts[$index]['title'] = $title;
    $decodedPosts[$index]['content'] = $content;
  }
  $index += 1;
}

$newposts = json_encode($decodedPosts);
file_put_contents('posts.txt', $newposts);


header('Location: ../?action=forum&return=postedited');

 ?>
