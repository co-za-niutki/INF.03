<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Port Lotniczy</title>
    <link rel="stylesheet" href="styl5.css" />
  </head>
  <body>
    <section id="b1"><img src="zad5.png" alt="logo lotnisko" /></section>
    <section id="b2"><h1>Przyloty</h1></section>

    <section id="b3">
      <h3>przydatne linki</h3>
      <a href="kwerendy.txt" target="_blank">Pobierz...</a>
    </section>
    <main>
      <table>
        <tr>
          <th>czas</th>
          <th>kierunek</th>
          <th>numer rejsu</th>
          <th>status</th>
        </tr>
        <?php
          $conn = mysqli_connect("localhost", "root", "", "egzamin");
          $sql = "SELECT czas, kierunek, nr_rejsu, status_lotu FROM przyloty ORDER BY czas ASC";
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['czas']."</td>";
            echo "<td>".$row['kierunek']."</td>";
            echo "<td>".$row['nr_rejsu']."</td>";
            echo "<td>".$row['status_lotu']."</td>";
            echo "</tr>";
          }
          mysqli_close($conn);
        ?>
      </table>
    </main>
    <section id="f1">
    <?php
      if (!isset($_COOKIE['visited'])) {
          setcookie('visited', 'true', time() + 7200);
          echo "<p style='font-weight: bold;'>Dzień dobry! Strona lotniska używa ciasteczek</p>";
      } else {
          echo "<p style='font-style: italic;'>Witaj ponownie na stronie lotniska</p>";
      }
    ?>
    </section>
    <section id="f2">Autor: 0000000000</section>
  </body>
</html>
