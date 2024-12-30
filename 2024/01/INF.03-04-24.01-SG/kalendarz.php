<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Zadania na lipiec</title>
    <link rel="stylesheet" href="styl6.css" />
  </head>
  <body>
    <section id="b1">
      <img src="logo1.png" alt="lipiec" />
    </section>
    <section id="b2">
      <h1>TERMINARZ</h1>
      <p>
        najbliższe zadania:
        <?php
          $conn = mysqli_connect("localhost","root","","terminarz");
          $sql = "SELECT DISTINCT wpis FROM zadania WHERE dataZadania BETWEEN '2020-07-01' AND '2020-07-07' AND wpis !=''";
          $result = mysqli_query($conn, $sql);

          while($row = mysqli_fetch_assoc($result)) {
            echo $row['wpis']. "; ";
          } 

          mysqli_close($conn)
        ?>
      </p>
    </section>
    <main>
      <?php
        $conn = mysqli_connect("localhost","root","","terminarz");
        $sql = "SELECT dataZadania, wpis FROM zadania WHERE dataZadania LIKE '%%%%-07-%%'";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)) {
          echo "<div class='cal'>";
          echo "<h6>" . $row['dataZadania'] . "</h6>";
          echo "<p>" . $row['wpis'] . "</p>";
          echo "</div>";
        } 

        mysqli_close($conn)
      ?>
    </main>
    <footer>
      <a href="sierpien.html">Terminarz na sierpień</a>
      <p>Stronę wykonał: 00000000000</p>
    </footer>
  </body>
</html>
