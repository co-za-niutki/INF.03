<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sklep dla uczniów</title>
    <link rel="stylesheet" href="styl.css" />
  </head>
  <body>
    <section id="baner"><h1>Dzisiejsze promocje naszego sklepu</h1></section>
    <section id="lewy">
      <h2>Taniej o 30%</h2>
      <ol>
        <?php
          $conn = mysqli_connect("localhost", "root", "", "sklep");
          $sql = "SELECT nazwa FROM towary WHERE promocja=1";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>{$row['nazwa']}</li>";
          }
          mysqli_close($conn);
        ?>
      </ol>
    </section>
    <section id="srodek">
      <h2>Sprawdź cenę</h2>
      <form method="post">
        <select name="towar">
          <option>Gumka do mazania</option>
          <option>Cienkopis</option>
          <option>Pisaki 60 sz.</option>
          <option>Markery 4 szt.</option>
        </select>
        <input type="submit" value="SPRAWDŹ" />
      </form>
      <div id="wynik">
      <?php
        $towar = $_POST['towar'];
        $conn = mysqli_connect("localhost", "root", "", "sklep");
        $sql = "SELECT cena FROM towary WHERE nazwa='$towar'";
        $result = mysqli_query($conn, $sql);
        if ($row = mysqli_fetch_assoc($result)) {
          $cena_regularna = $row['cena'];
          $cena_promocyjna = $cena_regularna * 0.7;
          echo "cena regularna: $cena_regularna zł<br>";
          echo "cena w promocji 30%: $cena_promocyjna zł";
        }
        mysqli_close($conn);
      ?>
      </div>
      </div>
    </section>
    <section id="prawy">
      <h2>Kontakt</h2>
      <p><a href="mailto:bok@sklep.pl">bok@sklep.pl</a></p>
      <img src="promocja.png" alt="promocja" />
    </section>
    <section id="stopka"><h4>Autor strony: 00000000000</h4></section>
  </body>
</html>
