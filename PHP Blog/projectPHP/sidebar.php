<ul>
<?php

$stmt = $db->query('SELECT postTitle, postID FROM blog_posts ORDER BY postID DESC LIMIT 5');
while($row = $stmt->fetch()){
//    echo "<li><a href=\""."./"."viewpost.php?id=".$row['postID']."\""."</a>".$row['postTitle']."</li>";
    echo "<li><a class=\"list-group-item\" href=\""."./"."viewpost.php?id=".$row['postID']."\"".">" .$row['postTitle']. "</a>"."</li>";
}
?>
</ul>