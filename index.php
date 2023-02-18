<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        class Fruit {
            private $name;
            private $color;

            function getName() {
                return $this->name;
            }

            function setName($name) {
                $this->name = $name;
            }

            function getColor() {
                return $this->color;
            }

            function setColor($color) {
                $this->color = $color;
            }
        }

        $apple = new Fruit();
        $apple->setName("Maçã");
        $apple->setColor("Vermelha");

        $banana = new Fruit();
        $banana->setName("Banana");
        $banana->setColor("Amarela");
    ?>
</body>
</html>