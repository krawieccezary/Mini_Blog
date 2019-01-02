<?php

// print_r($_POST);
// print_r($_FILES);

function is_ajax_request(){
   return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}

   $title = isset($_POST['title']) ? $_POST['title'] : '';
   $content = isset($_POST['content']) ? $_POST['content'] : '';
   $caption = isset($_POST['caption']) ? $_POST['caption'] : '';
   $date = date("d-m-Y");

   $errors = [];
   if($title == '') {$errors[] = 'title';}
   if($content == '') {$errors[] = 'content';}
   if($caption == '') {$errors[] = 'caption';}

   if(!empty($errors)) {
      if(is_ajax_request()) {
         $result_array = array('errors' => $errors);
         echo json_encode($result_array);
      } else {
         echo "There were errors on: " . implode(', ', $errors) . "</p>";
         echo "<p><a href='index.html'>Back</a></p>";
      }
      exit;
   }


if($_FILES['picture']['error'] == UPLOAD_ERR_OK) {
   $image_name = $_FILES['picture']['name'];

   if(!move_uploaded_file($_FILES['picture']['tmp_name'], "./images/$image_name")){
      $info = "Nieprawidłowy plik. Proszę wybrać inny.";
   };
};

if($_FILES['picture']['error'] == UPLOAD_ERR_NO_FILE) {
   $info = "Zdjęcie nie zostało wybrane. Proszę wybrać plik.";
}

$blog_posts = [];
$blog_post = [
   'title' => $title,
   'content' => $content,
   'caption' => $caption
];


if(is_ajax_request()){

   echo "<div class='post'>";
      echo "<h1 class='title'>$title</h1>";
      echo "<p class='data'>$date</p>";
      echo "<div class='content-container'>";

      if(isset($image_name)) {
         echo "<div class='image-wrap'>";
            echo "<img src='images/$image_name' alt='image'>";
            echo "<p class='caption'>$caption</p>";
         echo "</div>";
      } else {
         echo "<div class='image-wrap'>";
            echo "<p>$info</p>";
            echo "<form id='form' method='POST' action='zamiesc-post.php' enctype='multipart/form-data'>";
            echo "<input type='file' name='picture'>";
            echo "<input id='submit' type='submit' value='Dodaj zdjęcie'>";
            echo "</form>";
         echo "</div>";
      };
   echo "<p class='content'>$content</p>";
   echo "<div class='options'>";
   echo "<button class='like_post' type='button'>I Like It!</button>";
   echo "<button class='comment_post' type='button'>Add Comment</button>";
   echo "<button class='delete_post' type='button'>Delete Post</button>";
   echo "</div>";
};

?>
