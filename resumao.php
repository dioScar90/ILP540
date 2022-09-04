<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
    <style>
        body {
            background-color: honeydew;
        }

        p, h1, h3 {
            font-family: georgia, "sans-serif";
        }

        ul {
            margin: 0;
        }

        h3 {
            margin-bottom: 0;
        }

        .green {
            color: green;
        }

        .code_block {
            background-color: #f9f9f9;
            border: 1px solid lightgrey;
            padding: 5px;
            width: fit-content;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <h1>Algumas características do PHP</h1>
    <p>No PHP, todas as variáveis terão <strong>sempre</strong> um símbolo de <strong>$</strong> na frente. Por exemplo:</p>
    <div class="code_block">
        <code>$palmeiras = 'Tri-campeão da América.';</code>
    </div>
    <p>No exemplo acima foi declarado a variável <code>$palmeiras</code> e já na declaração foi definido o seu valor (que é o fato do Palmeiras ser o atual tri-campeão da Libertadores). Como o valor é um texto, o PHP já automaticamente atribui a <code>$palmeiras</code> também o tipo <code>string</code>. Os tipos mais comuns que provavelmente iremos usar na aula são os mesmos de sempre:</p>
    <div class="code_block">
        <ul>
            <li><code>string</code>: texto.</li>
            <li><code>int</code>: números inteiros.</li>
            <li><code>float</code>: números quebrados.</li>
            <li><code>bool</code>: verdadeiro/falso.</li>
            <li><code>array</code>: array, lista (vetor) etc.</li>
            <li><code>null</code>: nulo.</li>
        </ul>
    </div>
    <p>Sempre na hora de declarar uma variável é necessário também atribuir um valor, ainda que seja vazio, como por exemplo <code>$variavelStr = '';</code> ou <code>$variavelInt = 0;</code>. Nesse exemplo criamos 2 variáveis, uma <code>string</code> e a outra <code>int</code>. Melzinho na chupeta.</p>
    <p>Depois de declarada a variável (e automaticamente ela ter sido tipada pelo PHP) é possível fazer o que quiser com ela, desde mudar seu valor, concatenar com outros valores e inclusive atribuir valor de outro tipo (que, nesse caso, fará com que o PHP automaticamente altere seu tipo). Por exemplo:</p>
    <div class="code_block">
        <code>
            $varExemplo = '';<span class="green"> // Variável declarada, nesse momento sem nada (valor vazio) porém já é uma string.</span>
            <br>
            <code>$varExemplo = 'Turma do armário';<span class="green"> // Atribuído o texto 'Turma do armário' na variável.</span>
            <br>
            <code>$varExemplo = 'Fulano';<span class="green"> // Atribuído novo texto, nesse caso o anterior foi removido e agora o valor é 'Fulano'.</span>
            <br>
            <code>$varExemplo .= ' saiu do Armário';<span class="green"> // Atribuído novo texto, porém sem excluir o anterior, então agora o valor será 'Fulano saiu do armário'.</span>
            <br>
            <code>$varExemplo = 12;<span class="green"> // Atribuído novo valor, que agora é um número inteiro, então consequentemente nesse momento a variável deixa de ser do tipo string e passa a ser do tipo int.</span>
        </code>
    </div>
    <p>No exemplo acima a variável <code>$varExemplo</code> iniciou no tipo <code>string</code> e no final estava no tipo <code>int</code>.</p>
    <p>Até aqui, na minha opinião, tirando a característica do <strong>$</strong> no início da variável (<strong>sempre</strong> precisa disso, não se esqueça), eu acho bem parecido com o Python (exceto também quanto ao <strong>;</strong> no final das linhas de comando). Agora começa um pouco a diferenciar do Python e ficar mais parecido com o C#, que é na hora da escrita das linhas de repetição e condição. Alguns exemplos:</p>

    <h3>for</h3>
    <div class="code_block">
        <code>
            for ($i = 0; $i < sizeof($arr); $i++) {
                <br><span class="green">&emsp;// Seu código aqui.;</span>
            <br>}
        </code>
    </div>

    <h3>if/else</h3>
    <div class="code_block">
        <code>
            if (condicao...) {
                <br><span class="green">&emsp;// Seu código aqui.;</span>
            <br>}
            <br>else if (condicao...) {
                <br><span class="green">&emsp;// Seu código aqui.;</span>
            <br>}
            <br>else {
                <br><span class="green">&emsp;// Seu código aqui.;</span>
            <br>}
        </code>
    </div>
    
    <h3>switch</h3>
    <div class="code_block">
        <code>
            switch ($i) {
                <br>&emsp;case 0:</span>
                    <br><span class="green">&emsp;&emsp;// Seu código aqui.;</span>
                    <br>&emsp;&emsp;break;</span>
                <br>&emsp;case 1:</span>
                    <br><span class="green">&emsp;&emsp;// Seu código aqui.;</span>
                    <br>&emsp;&emsp;break;</span>
                <br>&emsp;case 2:</span>
                    <br><span class="green">&emsp;&emsp;// Seu código aqui.;</span>
                    <br>&emsp;&emsp;break;</span>
                <br>&emsp;default:</span>
                    <br><span class="green">&emsp;&emsp;// Seu código aqui.;</span>
            <br>}
        </code>
    </div>

    <h3>foreach</h3>
    <div>
        <div class="code_block">
            <code style="display:inline-block;">
                foreach ($arr as $item) {
                    <br><span class="green">&emsp;// Seu código aqui.;</span>
                <br>}
            </code>
        </div>
        <span style="display:inline-block;width:200px;">ou<span>
        <div class="code_block">
            <code style="display:inline-block;">
                foreach ($arr as $item):
                    <br><span class="green">&emsp;// Seu código aqui.;</span>
                <br>endforeach;
            </code>
        </div>
    </div>
    <p>Algumas funções prontas do PHP que podem ser úteis:</p>
    <ul>
        <li><code>isset()</code>: Verifica se o parâmetro informado já está declarado e retorna <code>true/false</code>.</li>
        <li><code>sizeof()</code>: Retorna o tamanho de um array, semelhante ao <code>.Length</code> do C#.</li>
        <li><code>strlen()</code>: Retorna a quantidade de caracteres de uma string.</li>
        <li><code>gettype()</code>: Retorna o tipo do parâmetro informado ('array', 'bool', 'string' etc.).</li>
        <li><code>is_string(), is_numeric(), is_array() etc.</code>: Verifica se o parâmetro informado é do tipo escrito na função e retorna <code>true/false</code>.</li>
        <li><code>strtoupper()</code>: Transforma todas as letras de uma string em letras maiúsculas.</li>
    </ul>
	<?php
		
	?>
</body>
</html>