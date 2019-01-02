<!DOCTYPE html>
<html lang="pl" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>BLOG POST</title>
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
       <link rel="stylesheet" href="style.css">
   </head>
   <body>
      <div id="panel">
         <div class="button"><i class="fas fa-angle-right"></i></div>
         <h3>PANEL</h3>
         <form id="form" method="POST" action="zamiesc-post.php" enctype="multipart/form-data">
            <p>Tytuł: </p> <input type="text" name="title"> <br><br>
            <p>Treść artykułu: </p> <textarea name="content" rows="10" cols="30"></textarea> <br><br>
            <div class="clearfix"></div>
            <p>Obrazek: </p> <input type="file" name="picture"> <br><br>
            Podpis obrazka: <input type="text" name="caption"> <br><br>
            <!-- Wielkość podpisu:
            <select name="wielkosc">
               <option value="12px">Mała</option>
               <option selected value="22px">Średnia</option>
               <option value="32px">Duża</option>
            </select> <br><br>
            Obramowanie: <input data-border="true" type="radio" name="border" value="true">Tak  <input data-border="false" type="radio" name="border" value="false" checked> Nie <br><br>
            <input class="border-side" disabled type="checkbox" name="border-left" value="left">lewa
            <input class="border-side" disabled type="checkbox" name="border-right" value="right">prawa
            <input class="border-side" disabled type="checkbox" name="border-top" value="top">góra
            <input class="border-side" disabled type="checkbox" name="border-bottom" value="bottom">dół <br><br> -->
            <input id="submit" type="submit" value="Umieść post">
         </form>
      </div>

      <div id="container">
      </div>
      <script src="main.js"></script>
   </body>
</html>
