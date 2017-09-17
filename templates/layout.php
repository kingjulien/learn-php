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
      $pozeraneKnihy = [];
      if (isset($_COOKIE['pozeraneKnihy'])) {
        $count = count($_COOKIE['pozeraneKnihy']);
        for ($index = $count - 1;
             $index >= $count - min($count, 5);
          $index--
        ) {
          $idKnihy = $_COOKIE['pozeraneKnihy'][$index];
          $pozeraneKnihy[] = getBook($idKnihy);
        }

        /*
        foreach ($_COOKIE['pozeraneKnihy'] as $idKnihy=>$value) {
          $pozeraneKnihy[] = getBook($idKnihy);
        }
        */
      }

      // vypis footer
      include 'footer.php';
    ?>
  </body>
</html>