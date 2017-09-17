<!DOCTYPE html>
<html>
  <head>
    <title>PHP!</title>
    <link rel="stylesheet" href="/dist/bootstrap.css">
    <script src="/dist/bootstrap.min.js"></script>
  </head>
  <body

    <?php

      // vypis header
      include 'header.php';

      // $content = obsah stranky, napr. pre homepage clanky
      // pre registraciu, reg. formular, atd...
      // pre neexistujucu stranku, napr. /hocico - default hlasku
    ?>
    <div id="content"><?= $content; ?></div>

    <?php
      // vypis footer
      include 'footer.php';
    ?>
  </body>
</html>