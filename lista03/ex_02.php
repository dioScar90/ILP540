<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $times = array_fill(0, 5, '');
        $content = '';
        $submitOk = false;
        
        if (isset($_GET['time1'], $_GET['time2'], $_GET['time3'], $_GET['time4'], $_GET['time5'])) {
            $submitOk = true;
            for ($i = 0, $j = 1; $i < sizeof($times); $i++, $j++) {
                $itemToPush = '';
                $strAux = trim($_GET["time$j"]);

                // Deixa as strings com a 1ª letra maiúscula.
                if (strpos($strAux, ' ')) {
                    $strArr = explode(' ', $strAux);
                    $strAux = '';
                    foreach ($strArr as $item) {
                        $strAux .= reset($strArr) == $item ? ucfirst(mb_strtolower($item)) : ' '.ucfirst(mb_strtolower($item));
                    }
                    $itemToPush = $strAux;
                }
                else {
                    $itemToPush = ucfirst(mb_strtolower($strAux));
                }

                $times[$i] = $itemToPush;
            }

            $fileName = "times.txt";
            $file = fopen($fileName, "w")
                or die("Falha na abertura do arquivo!");

            for ($i = 0; $i < sizeof($times); $i++) {
                $content .= $i > 0 ? "\n" : "";
                $content .= $times[$i];
            }

            fwrite($file, $content);
            fclose($file);
        }
    ?>
    
    <form action="" method="get">
        <label for="">Digite 5 times de futebol:</label>
        <input type="text" name="time1" value="<?= $times[0] ?>">
        <input type="text" name="time2" value="<?= $times[1] ?>">
        <input type="text" name="time3" value="<?= $times[2] ?>">
        <input type="text" name="time4" value="<?= $times[3] ?>">
        <input type="text" name="time5" value="<?= $times[4] ?>">

        <input type="submit" value="Enviar">
    </form>

    <?php
        if ($submitOk) {
            echo "<p> Times informados e já salvos no arquivo <em>$fileName</em>. Os times são:</p>";

            $newContent = str_replace("\n", "<br>", file_get_contents($fileName));

            echo "<p> $newContent </p>";
        }
    ?>
</body>
</html>