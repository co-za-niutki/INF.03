<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wynajem pokoi</title>
    <link rel="stylesheet" href="styl2.css" />
  </head>
  <body>
    <header><h1>Pensjonat pod dobrym humorem</h1></header>
    <section id="lewy">
      <a href="index.html">GŁÓWNA</a>
      <img src="1.jpg" alt="pokoje" />
    </section>
    <section id="srodek">
      <a href="cennik.php">CENNIK</a>
      <table>
        <?php
          $conn=mysqli_connect('localhost','root','','wynajem');
          $query="SELECT * FROM pokoje";
          $result=mysqli_query($conn,$query);

          while($record=mysqli_fetch_array($result))
          {
            echo "<tr><td>".$record[0]."</ td><td>".$record[1]."</ td><td>".$record[2]."</ td><tr>";
          }

          mysqli_close($conn);
        ?>
      </table>
    </section>
    <section id="prawy">
      <a href="kalkulator.html">KALKULATOR</a>
      <img src="3.jpg" alt="pokoje" />
    </section>
    <footer><p>Stronę opracował: 00000000000</p></footer>
  </body>
</html>
