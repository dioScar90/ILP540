<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercícios</title>
</head>
<body>
    <?php
        $jogos = $jogoSorteado = $numerosAcertados = array();
        for ($i = 0; $i < 10; $i++) {
            $jogo = array();
            for ($j = 0; $j < 6; $j++) {
                do {
                    $aux = rand(1,60);
                } while (in_array($aux, $jogo));
                array_push($jogo, $aux);
            }
            sort($jogo);
            array_push($jogos, $jogo);
        }
        
        $jogoSorteado = array();
        for ($i = 0; $i < 6; $i++) {
            do {
                $aux = rand(1,60);
            } while (in_array($aux, $jogoSorteado));
            array_push($jogoSorteado, $aux);
        }
        sort($jogoSorteado);
        
        foreach ($jogos as $key => $item) {
            $aux = array();
            for ($i = 0; $i < sizeof($jogoSorteado); $i++) {
                if (in_array($jogoSorteado[$i], $item)) {
                    array_push($aux, $jogoSorteado[$i]);
                }
            }
            array_push($numerosAcertados, $aux);
        }
        
        $numerosSorteados = '';
        foreach ($jogoSorteado as $key => $item) {
            $numerosSorteados .= reset($jogoSorteado) == $item ? $item : ', '.$item;
        }
    ?>
    <h3>Números da MegaSena sorteados:</h3>
    <p><strong><?= $numerosSorteados ?></strong>.</p>
    <h3>Acertos por jogo:</h3>
    <?php
        for ($i = 0; $i < sizeof($jogos); $i++) {
            $num = $i + 1;
            $esseJogo = '';
            for ($j = 0; $j < sizeof($jogos[$i]); $j++) {
                $esseJogo .= reset($jogos[$i]) == $jogos[$i][$j] ? $jogos[$i][$j] : ', '.$jogos[$i][$j];
            }

            if (empty($numerosAcertados[$i])) {
                echo "<p>Jogo #$num: <strong>$esseJogo</strong> → Nenhuma dezena acertada.</p>";
            }
            else {
                $esseAcerto = '';
                $qtdeAcertos = sizeof($numerosAcertados[$i]);
                foreach ($numerosAcertados[$i] as $key => $item) {
                    $esseAcerto .= reset($numerosAcertados[$i]) == $item ? $item : ', '.$item;
                }
                echo "<p>Jogo #$num: <strong>$esseJogo</strong> → Acertou $qtdeAcertos dezena(s): <strong>$esseAcerto</strong>.</p>";
            }
        }
    ?>
</body>
</html>