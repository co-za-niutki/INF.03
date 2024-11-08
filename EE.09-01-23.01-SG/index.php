<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sekretariat</title>
    <link rel="stylesheet" href="styl.css" />
  </head>
  <body>
    <section id="lewy">
      <h1>Akta Pracownicze</h1>
      <!--TODO: Skrypt 1-->
      <?php
        $conn = mysqli_connect("localhost", "root", "", "firma");
        $query = "SELECT imie, nazwisko, adres, miasto, czyRODO, CzyBadania FROM pracownicy WHERE id=2";
        $result = mysqli_query($conn,$query);
        $record = mysqli_fetch_array($result);

        echo '<h3>Dane</h3>';
        echo '<p>'.$record['imie'].' '.$record['nazwisko'].'</p>';
        
        mysqli_close($conn);
      ?>
      <hr />
      <h3>Dokumenty pracownika</h3>
      <a href="cv.txt">Pobierz</a>
      <h1>Liczba zatrudnionych pracowników</h1>
      <!--TODO: Skrypt 2-->
    </section>
    <section id="prawy">
      <!--TODO: Skrypt 3-->
    </section>
    <footer>
      Autorem aplikacji jest: 0000000000
      <ul>
        <li>skontaktuj się</li>
        <li>poznaj naszą firmę</li>
      </ul>
    </footer>
  </body>
</html>
