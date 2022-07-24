<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador Bilhete Lotofácil</title>

    <style>

        *{margin: 0; padding: 0;}

        body{
            background-color: #97ed8a;
            font: 20px;
            color: #303030;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
        }

        .container{
            background-color: #f4f4f4;
            width: 1100px;
            margin: 0 auto;
            border-left: 2px solid #ccc;
            border-right: 2px solid #ccc;
            padding: 20px;
        }

        .imagem{
            width: 120px;
        }

        form{
            color: #5f615f;            
        }

        .btn{
            margin-top: 35px;
            border: 1px solid #ccc;
            width: 170px;
            height: 35px;
            cursor: pointer;
            font-weight: bolder;
        }

        .btn:hover{
            background-color: #2f8022;
            transition: 1.5s;
            color: #FFF;
            border: 1px solid #000;
        }

        .btn-mod{
            background-color: #2f8022;
            transition: 1.5s;
            color: #FFF;
            border: 1px solid #000;
        }

        .jogos{
            margin-top: 15px;
            color: #5f615f;  
        }
    </style>

</head>
<body>
    <div class="container">
        <h1>GERADOR DE BILHETE LOTOFÁCIL</h1> <br/>

        <img src="img/trevo.png" class="imagem" alt=""><br/>

        <h3>Escolha o número de jogos por cartela:</h3><br/>

        <form action="<?php echo $PHP_SELF; ?>" method="POST">
            <input type="radio" id="um" name="valor" value="1" checked>
            <label for="um">1 JOGO</label>
            <input type="radio" id="dois" name="valor" value="2">
            <label for="dois">2 JOGOS</label>
            <input type="radio" id="tres" name="valor" value="3">
            <label for="tres">3 JOGOS</label><br/>

            <input type="submit" class="btn <?php if(isset($_POST['valor']) && $_POST['valor'] > 0)  echo 'btn-mod' ?>" value="GERAR">
        </form>

        <?php
            if(isset($_POST['valor']) && $_POST['valor'] > 0){

                $qtd = $_POST['valor'];

                for($cont = 0; $cont < $qtd; $cont++){

                    $num = [];
                    $c = 0;
                    
                    echo "<div class='jogos'>";
                        echo "<p>Jogo ". $cont+1 . ":</p>";   
                    
                        while($c <= 14){
                            $n = rand(1, 25);
                        
                            if(!in_array($n, $num)){
                                array_push($num, $n);
                                $c++;
                            }else{
                                continue;
                            }       
                        }     
                    
                        asort($num);
                    
                        foreach($num as $a){            
                            echo "$a  ";
                        }
                    echo "</div>";
                    unset($num);  
                    echo "<br/><br/>";
                }
                echo "<h3>Boa Sorte!</h3>";
            } 
        ?>
    </div>
</body>
</html>