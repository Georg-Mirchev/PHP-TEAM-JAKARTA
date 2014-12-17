<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
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
                    <a class="navbar-brand" href="index.php">TEAM "JAKARTA"</a>
                </div>
                <div class="navbar-collapse collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Posts</a></li>
                        <li><a href="#">About</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="panel panel-default container">
            <div class="panel-body">
                <div class="panel panel-default">
                    <div class="panel-body">
    <?php
    try {

        $stmt = $db->query('SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC');
        while($row = $stmt->fetch()){

            echo '<h2><a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h2>';
            echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).'</p>';
            echo '<p>'.$row['postDesc'].'</p>';
            echo '<p><a href="viewpost.php?id='.$row['postID'].'">Read More</a></p>';


        }

    } catch(PDOException $e) {
        echo $e->getMessage();
    }
    ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
</body>
</html>