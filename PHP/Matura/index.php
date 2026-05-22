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
      <h3> Wybierz ucznia z listy:</h3>
      <?php
      $conn = mysqli_connect("127.0.0.1", "root", "root", "matura");
      $request = "SELECT maturzysta.id, maturzysta.imie, maturzysta.nazwisko FROM maturzysta WHERE maturzysta.szkola = 'T3' ORDER BY maturzysta.nazwisko ASC;";
      $response = mysqli_query($conn, $request);

      while($row = mysqli_fetch_array($response)){
        echo "<a href='./wynik.php?id=$row[id]&imie=$row[imie]&nazwisko=$row[nazwisko]'>$row[id]. $row[imie] $row[nazwisko]</a><br>";
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
