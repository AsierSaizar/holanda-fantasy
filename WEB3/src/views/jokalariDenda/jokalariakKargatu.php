<?php
    
    
    
    
    
    require_once (APP_DIR . "/src/required/functions.php");
    $conn = connection();
    $AutatutakoTaldea = "";
    $query = "SELECT * FROM erronka3.jokalariak WHERE taldea='$AutatutakoTaldea';";

    $result = $conn->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="jokalariBakoitza">
                <b>
                    <div class="izenAbizenClass">
                        <?= $row["izenAbizen"] ?>
                    </div>
                    <div class="posizioaClass">
                        <?=$row["posizioa"] ?>
                    </div>
                    <div class="prezioClass">
                        <?= $row["prezioa"] ?>€
                    </div>
                </b>
    
    
                <button id="saskiraGehitu" class="saskiaBotoia addToSaskia">
                    Fitxatu jokalaria
                </button>
    
       
            </div>
            <?php
        }

    } else {
        echo trans("Ez dago irizpide hauek betetzen dituet produkturik.");
    }


    $conn->close();

    ?>