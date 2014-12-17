
<h1>Recent Posts</h1>
<hr />

<ul>
<?php

$stmt = $db->query('SELECT postTitle, postID FROM blog_posts ORDER BY postID DESC LIMIT 5');
while($row = $stmt->fetch()){
    echo "<li><a href=\""."./"."viewpost.php?id=".$row['postID']."\""."</a>".$row['postTitle']."</li>";
}
?>
</ul>
