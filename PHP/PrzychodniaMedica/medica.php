<?php
    $connection = mysqli_connect("127.0.0.1", "root", "123q", "medica");
    function cechy($id){
        global $connection;
        $query = "SELECT nazwa, cecha FROM abonamenty JOIN szczegolyabonamentu ON abonamenty.id = Abonamenty_id JOIN cechy ON cechy.id = Cechy_id WHERE abonamenty.id = $id";
        $result = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($result)) {
            echo "<li>".$row["cecha"]."</li>";
        }
    }
    ?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Przychodnia Medica</title>
        <meta charset="utf-8">
        <link rel="icon" type="image/x-icon" href="./obraz2.png">
        <link rel="stylesheet" type="text/css" href="./styl.css">
    </head>
    <body>
        <header>
            <h1>Abonamenty w przychodni Medica</h1>
        </header>
        <article>
            <?php

            $query = "SELECT nazwa, cena, opis FROM abonamenty";
            $result = mysqli_query($connection, $query);

            while($row = mysqli_fetch_array($result)) {
                echo "<h3>Pakiet " . $row["nazwa"] . " - cena " . $row["cena"] . " zł</h3>";
                echo "<p>" . $row["opis"] . "</p>";
            }
            ?>
            <a href="./opis.html">Dowiedz się więcej</a>
        </article>
        <main>
            <section>
                <h2>Standardowy</h2>
                <ul>
                    <?php
                        cechy(1);
                    ?>
                </ul>
            </section>
            <section>
                <h2>Premium</h2>
                <ul>
                    <?php
                        cechy(2);
                    ?>
                </ul>
            </section>
            <section>
                <h2>Dziecko</h2>
                <ul>
                    <?php
                        cechy(3);
                    ?>
                </ul>
            </section>
        </main>
        <footer>
            <p>
                <img src="obraz2.png" alt="przychodnia">
                Strone przygotowal: 00000000000
            </p>
        </footer>
    </body>
</html>
<?php
    mysqli_close($connection);
?>