<?php

$newComment = [
  'id'      => $_POST['id'],
  'author'    => $_COOKIE['user'],
  'comment' => $_POST['comment']
];

$allComments = [];

if (file_exists('comments.txt')) {
  $comments = file_get_contents('comments.txt');
  $allComments  = json_decode($comments, true);
}

$allComments[] = $newComment;

$commentsEncoded = json_encode($allComments);
file_put_contents('comments.txt', $commentsEncoded);

header('Location: ../?action=post&id='.$_POST['id']);

?>
