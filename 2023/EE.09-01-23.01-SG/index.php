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
      <?php
        $conn = mysqli_connect("localhost", "root", "", "firma");
        $sql = "SELECT imie, nazwisko, adres, miasto, czyRODO, CzyBadania FROM pracownicy WHERE id=2";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);

        echo '<h3>Dane</h3>';
        echo '<p>'.$row['imie'].' '.$row['nazwisko'].'</p>';
        echo '<hr/>';
        echo '<h3>Adres</h3>';
        echo '<p>'.$row['adres'].'</p>';
        echo '<p>'.$row['miasto'].'</p>';
        echo '<hr/>';
        if ($row['czyRODO']==1){
          echo '<p>RODO: podpisano</p>';
        }
        else {
          echo '<p>RODO: nie podpisano</p>';
        }

        if ($row['CzyBadania']==1){
          echo '<p>Badania: aktualne</p>';
        }
        else{
          echo '<p>Badania: nie aktualne</p>';
        }
      ?>
      <hr />
      <h3>Dokumenty pracownika</h3>
      <a href="cv.txt">Pobierz</a>
      <h1>Liczba zatrudnionych pracowników</h1>
        <?php
          $sql = "SELECT COUNT(*) FROM pracownicy;";
          $result = mysqli_query($conn,$sql);
          $row = mysqli_fetch_array($result);

          echo '<p>'.$row[0].'</p>';
        ?>
    </section>
    <section id="prawy">
      <?php
        $sql = "SELECT id, imie, nazwisko FROM pracownicy WHERE id=2";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);

        echo  '<img src="'.$row['id'].'.jpg" alt="pracownik"/>';
        echo '<h2>'.$row['imie'].' '.$row['nazwisko'].'</h2>';

        $sql = "SELECT pracownicy.id, stanowiska.nazwa, stanowiska.opis FROM pracownicy, stanowiska WHERE pracownicy.stanowiska_id=stanowiska.id AND pracownicy.id=2";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        
        echo '<h4>'.$row[1].'</h4>';
        echo '<h5>'.$row[2].'</h5>';
          
        mysqli_close($conn);
      ?>
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
