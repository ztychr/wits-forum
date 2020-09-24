<?php

$post = [
  'id'      => uniqid(),
  'author'  => $_COOKIE['user'],
  'title'   => $_POST['title'],
  'content' => $_POST['content'],
];

$allPosts = [];

if (file_exists('posts.txt')) {
  $posts = file_get_contents('posts.txt');
  $allPosts  = json_decode($posts, true);
}

$allPosts[] = $post;

$postEncoded = json_encode($allPosts);
file_put_contents('posts.txt', $postEncoded);

header('Location: ../?action=forum&return=postcreated');
?>
