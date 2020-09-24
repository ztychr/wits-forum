<?php

$decodedPosts = [];
$allComments = [];
$index = 0;
$hasComments = false;

if (file_exists('php/posts.txt')) {
  $jsonPosts = file_get_contents('php/posts.txt');
  $decodedPosts  = json_decode($jsonPosts, true);
}
else {
  echo 'This post wasn\t found.';
}

if (file_exists('php/comments.txt')) {
  $comments = file_get_contents('php/comments.txt');
  $allComments  = json_decode($comments, true);
}

foreach ($decodedPosts as $p) {
  if ($p['id'] == $_GET['id']) {

    echo '<p>Posted by: ', $p['author'], '</p>';

    echo '<h2>', $p['title'], '</h2>';
    echo '<p>', $p['content'], '</p>';

    if ($_SESSION['loggedIn'] == true && $p['author'] == $_COOKIE['user']) {
      echo '<button class="button" onclick="window.location.href = \'?action=editpost&id=', $p['id'], '\';">Edit</button>';
      echo '<br>';
    }
  }
}

echo '<br><hr>';
echo '<p><b> Comments: </b></p>';

foreach ($allComments as $c) {
  if ($c['id'] == $_GET['id']) {
    echo '<div class="comment">';
    echo '<b>', $c['author'], ':</b> ';

    echo $allComments[$index]['comment'];
    echo '</div>';
    $hasComments = true;

  }
  $index += 1;
}

if ($hasComments == false) {
echo 'This post has no comments yet.';
}

if ($_SESSION['loggedIn'] == true && isset($_COOKIE['user'])) {
  echo '<form action="php/comment.php" method="post">';
  echo '<input type="hidden" name="id" value="',$_COOKIE['user'], '">';
  echo '<input type="hidden" name="id" value="',$_GET['id'], '">';
  echo '<br>';
  echo '<p>Comment on this post:</p>';
  echo '<textarea name="comment" rows="5" cols="40"></textarea>';
  echo '<br>';
  echo '<input class="button" type="submit" value="Comment">';
  echo '</form>';
}

?>

<button class="button" onclick="window.location.href = '?action=forum';">Back</button>
