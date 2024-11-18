<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css" />
  </head>
  <body>
    <header><h1>Portal dla wędkarzy</h1></header>
    <section id="l1">
      <h3>Ryby zamieszkujące rzeki</h3>
      <ol>
        <?php
          $conn = mysqli_connect("localhost", "root", "", "wedkowanie");
          $query = "SELECT nazwa, akwen, wojewodztwo FROM ryby, lowisko WHERE ryby.id=lowisko.Ryby_id AND rodzaj=3";
          $result = mysqli_query($conn,$query);
          while ($record = mysqli_fetch_array($result)) {
            echo '<li>'.$record["nazwa"]." pływa w rzece ".$record["akwen"].", ".$record["wojewodztwo"]."</li>";
          };
          mysqli_close($conn);
        ?>
      </ol>
    </section>
    <section id="p">
      <img src="ryba1.jpg" alt="Sum" />
      <br />
      <a href="kwerendy.txt">Pobierz kwerendy</a>
    </section>
    <section id="l2">
      <h3>Ryby drapieżne naszych wód</h3>
      <table>
        <tr>
          <th>L.p.</th>
          <th>Gatunek</th>
          <th>Występowanie</th>
        </tr>
        <?php
          $conn = mysqli_connect("localhost", "root", "", "wedkowanie");
          $query = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia=1";
          $result = mysqli_query($conn,$query);
          while ($record = mysqli_fetch_array($result)) {
            echo '<tr><td>'.$record["id"].'</td><td>'.$record["nazwa"].'</td><td>'.$record["wystepowanie"].'</td></tr>';
          };
          mysqli_close($conn);
        ?>
      </table>
    </section>
    <footer><p>Stronę wykonał: 0000000000</p></footer>
  </body>
</html>
