<html>
    <head>
        <meta charset="utf-8">
        <title>Painel</title>
        <link href="css/styles.css" rel="stylesheet">
        <script src="js/jquery-1.11.0.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="js/slick.min.js"></script>
        <style>
            /* Estilo geral da tabela */
            table {
                width: 80%;
                margin: 20px auto;
                border-collapse: collapse;
                text-align: center;
            }

            /* Estilo das células da tabela */
            th, td {
                padding: 15px;
                border: 1px solid #000;
            }

            /* Estilo da célula com o retângulo amarelo */
            .highlight {
                background-color: yellow;
                border: 2px solid black;
                font-weight: bold;
                color: black;
            }

            /* Estilo para a tabela */
            td {
                font-size: 18px;
            }
            
            /* Estilos da lista de produtos */
            .product-table {
                list-style-type: none;
                padding: 0;
            }

            .product-table li {
                display: flex;
                justify-content: space-between;
                align-items: center;
                border: 1px solid black;
                padding: 10px;
                margin-bottom: 10px;
            }

            .product-name {
                width: 60%;
            }

            .product-price {
                width: 30%;
                text-align: center;
                background-color: yellow;
                border: 2px solid black;
                padding: 5px;
                font-weight: bold;
            }

            /* Estilos do produto no slideshow */
            .product {
                margin: 20px;
                text-align: center;
                padding: 10px;
            }

            .product h1 {
                font-size: 22px;
            }

            .product h2 {
                font-size: 18px;
                color: green;
            }

        </style>
    </head>
    <body>
        <div class="main">
            <div class="header">
                <div class="logo">
                    <img src="images/logo.png" width="200px"/>
                </div>
                <div class="banner"></div>
            </div>

            <div id="slideshowl">
                <div>
                    <div class="content">
                        <ul class="product-table">
                            <?php
                            $arquivo = fopen('produto.txt', 'r');
                            $cont = 0;
                            while(!feof($arquivo)) {
                                $linha = fgets($arquivo, 1024);
                                $list = explode(";", $linha);
                            ?>
                            
                            <li class="product" id="<?php echo $cont; ?>">
                                <span class="product-name"><?php echo $list[0]; ?></span>
                                <span class="product-price">R$ <?php echo isset($list[1]) ? $list[1] : '0'; ?></span>
                            </li>
                            
                            <?php
                            $cont++;
                            }
                            fclose($arquivo);
                            ?>
                        </ul>
                    </div>
                </div>
            </div>

            <script>
            var page = 5;
            var pageSize = 12;
            var pageCount =  Math.floor($(".product").length / pageSize);

            $(".product").hide();
            $(".product").each(function(n) {
                if (n >= pageSize * (page - 1) && n < pageSize * page)
                    $(this).show();
            });

            setInterval(function() {
                $(".product").hide();

                if(page == pageCount + 1){
                    page = 1;
                    console.log(page);
                }else{
                    page = page + 1;
                    console.log(page);
                }

                $(".product").each(function(n) {
                    if (n >= pageSize * (page - 1) && n < pageSize * page)
                        $(this).show();
                });
            }, 5000);
            </script>
        </div>
    </body>
</html>
