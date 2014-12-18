<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container-fluid	container">
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
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="https://github.com/infreezer/PHP-TEAM-JAKARTA" target="_blank  ">GitHub</a></li>
                    </ul>
                    <form method="post" class="navbar-form navbar-right search">
                        <input type="text" class="form-control col-lg-8" placeholder="Search">
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <main>
            <div class="panel-body-inverse container">
                <div class="panel panel-inverse">
                    <div class="panel-body">

                        <div class="sidebar">
                                        <div class="list-group">
                                            <a class="list-group-item active headingFontSize">
                                                Recent posts
                                            </a>
                                            <?php require('sidebar.php'); ?>
                                        </div>
                        </div>
    <?php
    try {

        $stmt = $db->query('SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC');
        while($row = $stmt->fetch()){

            echo '<div class="panel panel-default posts">';
            echo '<div class="panel-heading"><a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></div>';
//            echo '<h2><a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h2>';
            echo '<div class="panel-body content"><div class="postDate">Posted on '.date('jS M Y H:i:s', strtotime($row['postDate']));
            echo '</div>';
            echo '<p>'.$row['postDesc'].'</p>';
            echo '</div>';
            echo '<div class="panel-footer"><a class="btn btn-primary btn-xs" href="viewpost.php?id='.$row['postID'].'">Read More</a></div>';
            echo '</div>';

        }

    } catch(PDOException $e) {
        echo $e->getMessage();
    }
    ?>


                        </div>
                    </div>
                </div>
        </main>
</body>
</html>

