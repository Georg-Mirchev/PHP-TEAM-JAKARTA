<?php require('includes/config.php');

$stmt = $db->prepare('SELECT postID,postDesc , postTitle, postCont, postDate FROM blog_posts WHERE postID = :postID');
$stmt->execute(array(':postID' => $_GET['id']));
$row = $stmt->fetch();
<<<<<<< HEAD
=======

>>>>>>> origin/master

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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>


<header>
    <nav class="navbar navbar-default container" role="navigation">
        <div class="container-fluid	">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./">TEAM "JAKARTA"</a>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="./">Posts</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main>
        <div class="panel-body-default container">
            <div class="panel panel-default">
                <div class="panel-body">
    <?php

    echo '<div class="posts">';
    echo '<h1>'.$row['postTitle'].'</h1>';
    echo '<h2>'.$row['postDesc'].'</h2>';
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
                ':nameOfComm' => htmlspecialchars($postNameComment),
                ':comment' => htmlspecialchars($postComment),
                ':dateOfComm' => date('y-m-d H:i:s')
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
<<<<<<< HEAD
    echo '<blockquote>';
=======

>>>>>>> origin/master
    echo "<h5>{$row['nameOfComm']}</h5>";
    echo "<h6>{$row['dateOfComm']}</h6>";
    echo "<p>{$row['comment']}</p>";
    echo '</blockquote>';
}

?>
                    <div class="well bs-component">
        <form class="form-horizontal" action='' method='post'>
            <fieldset>
                <legend >Comment</legend><br />
                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="postNameComment">Name</label>
                            <div class="col-lg-10">
                                <input type='text' id="postNameComment" name='postNameComment' value='<?php if(isset($error)){ echo $_POST['postTitle'];}?>'>
                            </div>
                    </div>
                <div class="form-group">
                    <label for="postComment" class="col-lg-2 control-label">Description<br /></label>
                        <div class="col-lg-10">
                            <textarea name='postComment' id="postComment" cols='47' rows='5' style="resize: none"><?php if(isset($error)){ echo $_POST['postDesc'];}?></textarea>
                        </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <input class="btn btn-default" type='submit' name='submit' value='Submit'>
                    </div>
                </div>
            </fieldset>
        </form>
<<<<<<< HEAD
                    </div>
                </div>
            </div>
        </div>
</main>
=======
    </div>


</div>
<div id='sidebar'>
    <?php require('sidebar.php'); ?>
</div>
>>>>>>> origin/master
</body>
</html>