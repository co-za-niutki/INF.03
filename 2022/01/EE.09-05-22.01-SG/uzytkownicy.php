<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="styl5.css" />
  </head>
  <body>
    <section id="b1"><h2>Nasze osiedle</h2></section>

    <section id="b2">
      <?php
        $conn = mysqli_connect('localhost', 'root', '', 'portal');
        $sql = "SELECT COUNT(*) FROM dane";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_row($result);
        echo "<p>Liczba użytkowników portalu: $row[0]</p>";
        mysqli_close($conn);
      ?>
    </section>
    <section id="lewy">
      <h3>Logowanie</h3>
      <form method="post">
        <label for="login">login</label><br />
        <input type="text" id="login" name="login" /><br />
        <label for="haslo">Hasło:</label><br />
        <input type="password" id="haslo" name="haslo" /><br />
        <input type="submit" value="Zaloguj" />
      </form>
    </section>
    <section id="prawy">
      <h3>Wizytówka</h3>
      <div id="wizytowka">
        <?php
          if ($_POST["login"] != "" && $_POST["haslo"] != "") {
            $login = $_POST["login"];
            $haslo = sha1($_POST["haslo"]);

            $conn = mysqli_connect('localhost', 'root', '', 'portal');
            $sql = "SELECT * FROM uzytkownicy WHERE login='$login'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) != 0){
              $row = mysqli_fetch_assoc($result);

              if ($row["haslo"]==$haslo){
                $sql2 = "SELECT uzytkownicy.login, dane.rok_urodz, dane.przyjaciol, dane.hobby, dane.zdjecie FROM uzytkownicy, dane WHERE uzytkownicy.id=dane.id AND uzytkownicy.login='$login'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $wiek = date("Y") - $row2["rok_urodz"];
                echo "<img src='$row2[zdjecie]' alt='osoba' />";
                echo "<h4>$row2[login] ($wiek)</h4>";
                echo "<p>hobby: $row2[hobby]</p>";
                echo "<h1><img src='icon-on.png'>$row2[przyjaciol]</h1>";
                echo "<a href='dane.html'>Więcej informacji</a>";
              }
              else{
                echo "<p>hasło niepoprawne</p>";
              }

            }else{
              echo "<p>login nie istnieje</p>";

            }
          }
          mysqli_close($conn);
        ?>
      </div>
    </section>
    <footer>Stronę wykonał: 00000000000</footer>
  </body>
</html>
