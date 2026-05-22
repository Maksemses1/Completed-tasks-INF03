<!DOCTYPE html>
<html lang="pl">
  <head>
    <title>Matura</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styl.css">
  </head>
  <body>
    <header>
      <h1>System informacji dla maturzystów</h1>
    </header>
    <aside>
      <img src="./ma.jpg" alt="Matura">
      <img src="./tu.jpg" alt="Matura">
      <img src="./ra.jpg" alt="Matura">
    </aside>
    <section>
      <?php
      $conn = mysqli_connect("127.0.0.1", "root", "root", "matura");
      $request = "SELECT arkusz.rok, arkusz.sesja, arkusz.przedmiot, wynik.punkty FROM arkusz JOIN wynik ON arkusz.symbol = wynik.symbol WHERE wynik.maturzysta_id = $_GET[id];";
      $response = mysqli_query($conn, $request);

      echo "<h2>$_GET[imie] $_GET[nazwisko]</h2>";

      while($row = mysqli_fetch_array($response)){
        echo "<h3>$row[rok] $row[sesja]</h3>";
      echo "<p>$row[przedmiot]: $row[punkty]</p>";
      }
      ?>

    </section>
     <section>
      <div class="bloki">
        <h4>Przedmioty</h4>
        <?php
        $request = "SELECT DISTINCT arkusz.przedmiot FROM arkusz;";
        $response = mysqli_query($conn, $request);
        while($row = mysqli_fetch_array($response)){
          echo "$row[przedmiot] ";
        }
        ?>
      </div>
      <div class="bloki">
        <h4>Lata</h4>
        <?php
        $request = "SELECT MIN(arkusz.rok) AS 'mlodszy', MAX(arkusz.rok) AS 'starszy' FROM arkusz;";
        $response = mysqli_query($conn, $request);
        while($row = mysqli_fetch_array($response)){
          echo "$row[mlodszy] - $row[starszy]";
        }
        ?>
      </div>
      <div class="bloki">
        <h4>Najlepszy wynik</h4>
        <?php
        $request = "SELECT maturzysta_id, AVG(punkty) AS Wynik FROM wynik GROUP BY maturzysta_id ORDER BY Wynik DESC LIMIT 1;";
        $response = mysqli_query($conn, $request);
        while($row = mysqli_fetch_array($response)){
          echo "$row[Wynik]%";
        }
        ?>
      </div>
      <div class="bloki">
        <h4>Najgorszy wynik</h4>
        <?php
        $request = "SELECT maturzysta_id, AVG(punkty) AS Wynik FROM wynik GROUP BY maturzysta_id ORDER BY Wynik ASC LIMIT 1;";

        $response = mysqli_query($conn, $request);
        while($row = mysqli_fetch_array($response)){
          echo "$row[Wynik]%";
        }
        mysqli_close($conn);
        ?>
      </div>
    </section>
    <footer>
      <p>Stronę wykonał: 00000000000</p>
    </footer>
  </body>
</html>
