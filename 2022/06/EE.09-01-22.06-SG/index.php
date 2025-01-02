<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl.css" />
  </head>
  <body>
    <section id="baner"><h1>Forum miłośników psów</h1></section>
    <section id="lewy">
      <img src="Avatar.png" alt="Użytkownik forum" />
        <?php
          $conn = mysqli_connect("localhost", "root", "", "forumpsy");
          $sql = "SELECT konta.nick, konta.postow, pytania.pytanie FROM konta, pytania WHERE konta.id=pytania.konta_id AND pytania.id = 1";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          echo "<h4>Użytkownik: $row[nick]</h4>";
          echo "<p>$row[postow] postów na forum</p>";
          echo "<p>$row[pytanie]</p>";
          mysqli_close($conn);
        ?>
      <video src="video.mp4" controls loop></video>
    </section>
    <section id="prawy">
      <form method="post">
        <textarea name="odpowiedz" rows="4" cols="40"></textarea>
        <br />
        <input type="submit" value="Prześlij odpowiedź" />
      </form>
      <?php
        $odpowiedz = $_POST["odpowiedz"];
        if  ($odpowiedz!="") {
          $conn = mysqli_connect("localhost", "root", "", "forumpsy");
          $sql = "INSERT INTO odpowiedzi(Pytania_id, konta_id, odpowiedz) VALUES(1,5,'$odpowiedz')";
          mysqli_query($conn, $sql);
          mysqli_close($conn);
        }
      ?>
      <h2>Odpowiedźi na pytanie</h2>
      <ol>
        <?php
          $conn = mysqli_connect("localhost", "root", "", "forumpsy");
          $sql = "SELECT odpowiedzi.id, odpowiedzi.odpowiedz, konta.nick FROM odpowiedzi, konta WHERE odpowiedzi.konta_id=konta.id AND odpowiedzi.Pytania_id=1";
          $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>";
            echo "$row[odpowiedz]";
            echo "<em> $row[nick]</em>";
            echo "<hr />";
            echo "</li>";
            }
          mysqli_close($conn);
        ?>
      </ol>
    </section>
    <section id="stopka">
      Autor: 00000000000
      <a href="http://mojestrony.pl" target="_blank">Zobacz nasze realizacje</a>
    </section>
  </body>
</html>
