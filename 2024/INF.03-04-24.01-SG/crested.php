<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hodowla świnek morskich</title>
    <link rel="stylesheet" href="styl.css" />
  </head>
  <body>
    <header><h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1></header>
    <nav>
      <a href="peruwianka.php">Rasa Peruwianka</a>
      <a href="american.php">Rasa American</a>
      <a href="crested.php">Rasa Crested</a>
    </nav>
    <section id="prawy">
      <h3>Poznaj wszystkie rasy świnek morskich</h3>
      <ol>
      <?php
            $conn=mysqli_connect('localhost','root','','hodowla');
            $sql = "SELECT rasa FROM rasy;";
            $row = mysqli_query($conn,$sql);

            while($record = mysqli_fetch_array($row))
            {
              echo "<li>".$record["rasa"]."</ li>";
            }

            mysqli_close($conn);
          ?>
      </ol>
    </section>
    <section id="lewy">
      <img src="crested.jpg" alt="Świnka morska rasy crested" />
      <?php
            $conn=mysqli_connect('localhost','root','','hodowla');
            $sql = "SELECT DISTINCT data_ur, miot, rasa FROM swinki, rasy WHERE swinki.rasy_id=rasy.id AND rasy.id=7";
            $row = mysqli_query($conn,$sql);

            while($record = mysqli_fetch_array($row))
            {
              echo "<h2>Rasa: ".$record["rasa"]."</h2>";
              echo "<p>Data urodzenia: ".$record["data_ur"]."</p>";
              echo "<p>Oznaczenie miotu: ".$record["miot"]."</p>";
            }

            mysqli_close($conn);
          ?>
      <hr />
      <h2>Świnki w tym miocie</h2>
      <?php
            $conn=mysqli_connect('localhost','root','','hodowla');
            $sql = "SELECT imie, cena, opis FROM swinki WHERE rasy_id=7;";
            $row = mysqli_query($conn,$sql);

            while($record = mysqli_fetch_array($row))
            {
              echo "<h3>".$record["imie"]." - ".$record["cena"]."</h3>";
              echo "<p>".$record["opis"]."</p>";
            }

            mysqli_close($conn);
          ?>
    </section>
    <footer><p>Stronę wykonał: 00000000000</p></footer>
  </body>
</html>
