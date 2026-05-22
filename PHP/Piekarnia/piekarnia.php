<!DOCTYPE html>
<html lang="pl">
  <head>
    <title>PIEKARNIA</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles.css">
  </head>
  <body>
    <img src="wypieki.png" alt="Produkty naszej piekarni">
    <nav>
      <a href="kw1.png">KWERENDA1</a>
      <a href="kw2.png">KWERENDA2</a>
      <a href="kw3.png">KWERENDA3</a>
      <a href="kw4.png">KWERENDA4</a>
    </nav>
    <header>
      <h1>WITAMY</h1>
      <h4>NA STRONIE PIEKARNI</h4>
      <p>Od 31 lat oferujemy najwyższej jakości pieczywo. Naturalnie świeże, naturalnie smaczne. Pieczemy wyłącznie wypieki na naturalnym zakwasie <br> bez polepszaczy i zagęstników. Korzystamy wyłącznie z najlepszych ziaren pochodzących z ekologicznych upraw położonych w rejonach <br> zgierskim i ozorkowskim.</p>
    </header>
    <main>
      <h4>Wybierz rodzaj wypieków:</h4>
      <form action="piekarnia.php" method="POST">
        <select name="rodzaj_wypieku">
          <?php
          $conn = mysqli_connect("127.0.0.1", "root", "root", "piekarnia");
          $request = "SELECT DISTINCT Rodzaj FROM wyroby ORDER BY Rodzaj DESC;";
      
          $response = mysqli_query($conn, $request);
      
          while($row = mysqli_fetch_array($response)){
            echo "<option>$row[Rodzaj]</option>";
          }
          ?>
        </select>
        <input type="submit" value="Wybierz">
      </form>
      
      <table>
        <tr>
          <th>Rodzaj</th>
          <th>Nazwa</th>
          <th>Gramatura</th>
          <th>Cena</th>
        </tr>
        <?php 
        if (isset($_POST['rodzaj_wypieku'])) {
          $request = "SELECT wyroby.Rodzaj, wyroby.Nazwa, wyroby.Gramatura, wyroby.Cena FROM wyroby WHERE wyroby.Rodzaj = '$_POST[rodzaj_wypieku]';";
          $response = mysqli_query($conn, $request);
          while($row = mysqli_fetch_array($response)){
            echo 
            "
            <tr>
              <td>$row[Rodzaj]</td>
              <td>$row[Nazwa]</td>
              <td>$row[Gramatura]</td>
              <td>$row[Cena]</td>
            </tr>
            ";
          }
        }
        
          mysqli_close($conn);
        ?>
      </table>
    </main>
    <footer>
      <p>AUTOR 00000000000</p>
      <p>Data: 23.10.2000</p>
    </footer>
  </body>
</html>
