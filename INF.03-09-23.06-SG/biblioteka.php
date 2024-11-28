<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Biblioteka</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header>
      <h1>Biblioteka w Książkowicach Małych</h1>
    </header>
    <section id="lewy">
      <h4>Dodaj czytelnika</h4>
      <form action="biblioteka.php" method="post">
        <label for="imie">Imię: </label>
        <input type="text" id="imie" name="imie" /><br />
        <label for="nazwisko">Nazwisko: </label>
        <input type="text" id="nazwisko" name="nazwisko" /><br />
        <label for="symbol">Symbol: </label>
        <input type="number" id="symbol" name="symbol" /><br />
        <button type="submit">AKCEPTUJ</button>
      </form>
        <?php
          $conn=mysqli_connect('localhost','root','','biblioteka');

        ?>
    </section>
    <section id="srodek">
      <img src="biblioteka.png" alt="biblioteka" />
      <h6>ul. Czytelników&nbsp;15; Książkowice&nbsp;Małe</h6>
      <p><a href="mailto:biuro@bib.pl">Czy masz jakieś uwagi?</a></p>
    </section>
    <section id="prawy">
      <h4>Nasi czytelnicy:</h4>
      <ol>
        <?php
          $query="SELECT imie, nazwisko FROM czytelnicy ORDER BY nazwisko ASC;";
          $result=mysqli_query($conn,$query);

          while($record=mysqli_fetch_array($result))
          {
            echo "<li>".$record["imie"]." ".$record["nazwisko"]."</ li>";
          }

          mysqli_close($conn);
        ?>
      </ol>
    </section>
    <footer>
      <p>Projekt witryny: 0000000000</p>
    </footer>
  </body>
</html>
