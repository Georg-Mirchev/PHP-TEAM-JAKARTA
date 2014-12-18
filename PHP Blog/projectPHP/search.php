<ul>
    <?php

        var_dump($_GET['search']);
        if(isset($_GET['search'])) {
            echo $_GET['search'];
            $search = $_GET['search'];
            var_dump($_GET);
            $stmt = $db->query('SELECT postID, postTitle, postTags FROM blog_posts ORDER BY postID');
            while ($row = $stmt->fetch() && searchInTags($row['postTags'], $search)) {
                echo "<li><a href=\"" . "./" . "viewpost.php?id=" . $row['postID'] . "\"" . "</a>" . $row['postTitle'] . "</li>";
            }
        }

    function searchInTags($tags,$searchString){
        preg_match_all('/[A-Za-z]+/m',$searchString,$matches);
        foreach($matches[0] as $words){
            if(strpos($tags,$words) !== false){
                return true;
            }
        }
        return false;
    }
    ?>
</ul>