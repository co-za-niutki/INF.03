<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Motocykle</title>
    <link rel="stylesheet" href="styl.css" />
  </head>
  <body>
    <img src="motor.png" alt="motocykl" id="motor" />
    <header><h1>Motocykle - moja pasja</h1></header>
    <section id="lewy">
      <h2>Gdzie pojechać?</h2>
      <dl>
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'motory');
        $sql = 'SELECT wycieczki.nazwa, wycieczki.opis, wycieczki.poczatek, zdjecia.zrodlo FROM wycieczki, zdjecia WHERE wycieczki.zdjecia_id=zdjecia.id';
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)) {
          echo "<dt> $row[nazwa], rozpoczyna się w $row[poczatek], <a href='$row[zrodlo].jpg'>zobacz zdjęcie</a></dt>";
          echo "<dd>$row[opis]</dd>";
        }
        ?>
      </dl>
    </section>
    <section id="prawy1">
      <h2>Co kupić?</h2>
      <ol>
        <li>Honda CBR125R</li>
        <li>Yamaha YBR125</li>
        <li>Honda VFR8001</li>
        <li>Honda CBR1100XX</li>
        <li>BMW R1200GS LC</li>
      </ol>
    </section>
    <section id="prawy2">
      <h2>Statystyki</h2>
      <p>
        Wpisanych wycieczek:
        <?php
        $sql = 'SELECT COUNT(*) FROM wycieczki';
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        echo $row[0];
        mysqli_close($conn);
        ?>
      </p>
      <p>Użytkowników forum: 200</p>
      <p>Przesłanych zdjęć 1300</p>
    </section>
    <footer><p>Stronę wykonał: 00000000000</p></footer>
  </body>
</html>
