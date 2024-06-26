<?php

    $hotels = [

        [
            'Name' => 'Hotel Belvedere',
            'Description' => 'Hotel Belvedere Descrizione',
            'Parking' => true,
            'Vote' => 4,
            'Distance_to_center' => 10.4
        ],
        [
            'Name' => 'Hotel Futuro',
            'Description' => 'Hotel Futuro Descrizione',
            'Parking' => true,
            'Vote' => 2,
            'Distance_to_center' => 2
        ],
        [
            'Name' => 'Hotel Rivamare',
            'Description' => 'Hotel Rivamare Descrizione',
            'Parking' => false,
            'Vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'Name' => 'Hotel Bellavista',
            'Description' => 'Hotel Bellavista Descrizione',
            'Parking' => false,
            'Vote' => 5,
            'Distance_to_center' => 5.5
        ],
        [
            'Name' => 'Hotel Milano',
            'Description' => 'Hotel Milano Descrizione',
            'Parking' => true,
            'Vote' => 2,
            'Distance_to_center' => 50
        ],

    ];

    $keys = array_keys($hotels[0]);

    $with_parking = $_GET['with_parking'];

    $hotelsWithParking = [];

    foreach ($hotels as $currentHotel) {
        if ($currentHotel['Parking'] === true) {
            array_push($hotelsWithParking, $currentHotel);
        }
    }

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel-php</title>
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body class="d-flex flex-column align-items-center">
    <h1 class="my-2">Hotel php</h1>

    <form method="GET" id="my_form">
        <div class="mb-3 my_txt">
            <div class="form-check">
            <input name="with_parking" class="form-check-input" type="checkbox" value="true" id="flexCheckDefault" <?php if (isset($_GET['with_parking'])) echo "checked"; ?>>
                <label class="form-check-label" for="flexCheckDefault">
                    Parking
                </label>
            </div>
        </div>

        <input id="submit" type="submit">
    </form>

    <table class="table w-75 border border-secondary my-3">
        <thead>
            <tr class="table-primary">
            <?php
                foreach ($keys as $key) {
                    echo "<th scope=\"col\">$key</th>";
                }
            ?>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($hotels as $currentHotel) {
                    echo "
                    <tr class=\"table-secondary\">";
                    foreach($currentHotel as $key => $value) {

                        if($key == 'Parking') {
                            $value = ($value) ? 'Si' : 'No';
                        }

                        echo "<td>$value</td>";
                    }
                    echo "
                    </tr>";
                }
            ?>
        </tbody>
    </table>
    <?php
    // Controllo se $with_parking è uguale a true
    if ($_GET['with_parking'] === 'true') {
        // Qui scrivi ciò che vuoi mostrare solo se $with_parking è true
        echo "<p>Testo da visualizzare solo se \$with_parking è true.</p>";
    }
?>
</body>
</html>