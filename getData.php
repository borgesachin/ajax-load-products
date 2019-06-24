<?php

// configuration
include 'config.php';

$row = $_POST['row'];
$rowperpage = 4;

// selecting posts
$query = 'SELECT * FROM posts limit '.$row.','.$rowperpage;
$result = mysqli_query($con,$query);

$html = '';

while($row = mysqli_fetch_array($result)){
    $id = $row['id'];
    $img = $row['img'];
    $title = $row['title'];
    $content = $row['content'];
    $shortcontent = substr($content, 0, 160)."...";
    $link = $row['link'];
    // Creating HTML structure
    $html .= '<div id="post_'.$id.'" class="post">';
    $html .= '<img src="'.$img.'" alt="">';
    $html .= '<h1>'.$title.'</h1>';
    $html .= '<p>'.$shortcontent.'</p>';
    $html .= '<a href="'.$link.'" target="_blank" class="more">More</a>';
    $html .= '</div>';

}

echo $html;
