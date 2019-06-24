<?php
include "config.php";
?>
<!doctype html>
<html>
    <head>
        <title>Load more data using jQuery,AJAX, and PHP</title>
        <link href="style.css" type="text/css" rel="stylesheet">
        <script src="jquery.min.js" type="text/javascript"></script>
        <script src="scripts.js"></script>
    </head>
    <body>
        <div class="container">

            <?php
            $rowperpage = 4;

            // counting total number of posts
            $allcount_query = "SELECT count(*) as allcount FROM posts";
            $allcount_result = mysqli_query($con,$allcount_query);
            $allcount_fetch = mysqli_fetch_array($allcount_result);
            $allcount = $allcount_fetch['allcount'];

            // select first 5 posts
            $query = "select * from posts order by id asc limit 0,$rowperpage ";
            $result = mysqli_query($con,$query);

            while($row = mysqli_fetch_array($result)){

                $id = $row['id'];
                $img = $row['img'];
                $title = $row['title'];
                $content = $row['content'];
                $shortcontent = substr($content, 0, 160)."...";
                $link = $row['link'];
            ?>

                <div class="post" id="post_<?php echo $id; ?>">
                  <img src="<?php echo $img; ?>" alt="">
                    <h1><?php echo $title; ?></h1>
                    <p>
                        <?php echo $shortcontent; ?>
                    </p>
                    <a href="'.$link.'" target="_blank" class="more">More</a>
                </div>

            <?php
            }
            ?>

            <h1 class="load-more">Load More</h1>
            <input type="hidden" id="row" value="0">
            <input type="hidden" id="all" value="<?php echo $allcount; ?>">

        </div>
    </body>
</html>
