<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Poznaj Europę</title>
    <link rel="stylesheet" href="styl9.css" />
  </head>
  <body>
    <header><h1>BIURO PODRÓŻY</h1></header>
    <section id="lewy">
      <h2>Promocje</h2>
      <table>
        <tr>
          <td>Warszawa</td>
          <td>od 600 zł</td>
        </tr>
        <tr>
          <td>Wenecja</td>
          <td>od 1200 zł</td>
        </tr>
        <tr>
          <td>Paryż</td>
          <td>od 1200 zł</td>
        </tr>
      </table>
    </section>
    <section id="srodek">
      <h2>W tym roku jedziemy do...</h2>
      <?php
        $conn = mysqli_connect('localhost', 'root', '', 'podroze');
        $sql = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis ASC";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<img src=$row[nazwaPliku] alt=$row[podpis] title=$row[podpis] />";
        }
      ?>
    </section>
    <section id="prawy">
      <h2>Kontakt</h2>
      <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
      <p>telefon: 444555666</p>
    </section>
    <section id="dane">
      <h3>W poprzednich latach byliśmy...</h3>
      <ol>
        <?php
          $sql = "SELECT cel, dataWyjazdu FROM wycieczki WHERE dostepna=false;";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
              echo "<li>Dnia $row[dataWyjazdu] pojechaliśmy do $row[cel]</li>";
          }
          mysqli_close($conn);
        ?>
      </ol>
    </section>
    <footer><p>Stronę wykonał: 00000000000</p></footer>
  </body>
</html>
