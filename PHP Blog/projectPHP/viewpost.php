<?php require('includes/config.php');

$stmt = $db->prepare('SELECT postID, postTitle, postCont, postDate FROM blog_posts WHERE postID = :postID');
$stmt->execute(array(':postID' => $_GET['id']));
$row = $stmt->fetch();
var_dump($row);

//if post does not exists redirect user.
if($row['postID'] == ''){
    header('Location: ./');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog - <?php echo $row['postTitle'];?></title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>

<div id="wrapper">

    <h1>Blog</h1>
    <hr />
    <p><a href="./">Blog Index</a></p>


    <?php

    echo '<div>';
    echo '<h1>'.$row['postTitle'].'</h1>';
    echo '<p>Posted on '.date('jS M Y', strtotime($row['postDate'])).'</p>';
    echo '<p>'.$row['postCont'].'</p>';
    echo '</div>';

if(isset($_POST['submit'])){
    $_POST = array_map( 'stripslashes', $_POST );
    extract($_POST);
    $post_id_copy = $row['postID'];

    if($postNameComment ==''){
        $error[] = 'This post is missing a name!.';
    }

    if($postComment ==''){
        $error[] = 'Please enter the text.';
    }
        try {
            $stmt = $db->prepare('INSERT INTO blog_comments (article_id,nameOfComm,comment,dateOfComm) VALUES (:article_id, :nameOfComm, :comment, :dateOfComm)') ;
            $stmt->execute(array(
                ':article_id' => $post_id_copy,
                ':nameOfComm' => $postNameComment,
                ':comment' => $postComment,
                ':dateOfComm' => date('Y-m-d H:i:s')
            ));


            header('Location: viewpost.php?id='.$post_id_copy);
            exit;

        } catch(PDOException $e) {

            echo $e->getMessage();
        }
    }



$stmt = $db->prepare('SELECT article_id, nameOfComm, comment, dateOfComm FROM blog_comments WHERE article_id = :postID ORDER BY dateOfComm DESC');
$stmt->execute(array(':postID' => $_GET['id']));
while($row = $stmt->fetch()){
    var_dump($row);
    echo "<h5>{$row['nameOfComm']}</h5>";
    echo "<h6>{$row['dateOfComm']}</h6>";
    echo "<p>{$row['comment']}</p>";
}



?>

    <div>
        <form action='' method='post'>

            <p><label>Name</label><br />
                <input type='text' name='postNameComment' value='<?php if(isset($error)){ echo $_POST['postTitle'];}?>'></p>

            <p><label>Description</label><br />
                <textarea name='postComment' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postDesc'];}?></textarea></p>

            <p><input type='submit' name='submit' value='Submit'></p>

        </form>
    </div>


</div>
</body>
</html>