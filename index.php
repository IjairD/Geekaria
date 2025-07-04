<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="Images/miniLogo.png" type="png">
    <title>Geekaria</title>
</head>

<body>
    <?php require 'geral/cabecalho.php'; ?>
    <main>
        <div class="carousel-container">
        <button class="arrow left" onclick="scrollCarousel(-1)">&#10094;</button>

        <div class="carousel">
            <div class="card">
                <img src="images/CadeiraHover.png">
                <p>Cadeira Gamer TGT Heron Tc, espuma moldada, preto e
                    verde,
                    TGT-HRTC-BL02
                </p>
                <a href="#">Adicionar ao carrinho</a>
            </div>
            <div class="card">
                <img src="images/CadeiraHover.png">
                <p>Cadeira Gamer TGT Heron Tc, espuma moldada, preto e
                    verde,
                    TGT-HRTC-BL02
                </p>
                <a href="#">Adicionar ao carrinho</a>
            </div>
            <div class="card">
                <img src="images/CadeiraHover.png">
                <p>Cadeira Gamer TGT Heron Tc, espuma moldada, preto e
                    verde,
                    TGT-HRTC-BL02
                </p>
                <a href="#">Adicionar ao carrinho</a>
            </div>
            <div class="card">
                <img src="images/CadeiraHover.png">
                <p>Cadeira Gamer TGT Heron Tc, espuma moldada, preto e
                    verde,
                    TGT-HRTC-BL02
                </p>
                <a href="#">Adicionar ao carrinho</a>
            </div>
            <div class="card">
                <img src="images/CadeiraHover.png">
                <p>Cadeira Gamer TGT Heron Tc, espuma moldada, preto e
                    verde,
                    TGT-HRTC-BL02
                </p>
                <a href="#">Adicionar ao carrinho</a>
            </div>
            <div class="card">
                <img src="images/CadeiraHover.png">
                <p>Cadeira Gamer TGT Heron Tc, espuma moldada, preto e
                    verde,
                    TGT-HRTC-BL02
                </p>
                <a href="#">Adicionar ao carrinho</a>
            </div>
            <div class="card">
                <img src="images/CadeiraHover.png">
                <p>Cadeira Gamer TGT Heron Tc, espuma moldada, preto e
                    verde,
                    TGT-HRTC-BL02
                </p>
                <a href="#">Adicionar ao carrinho</a>
            </div>
            <div class="card">
                <img src="images/CadeiraHover.png">
                <p>Cadeira Gamer TGT Heron Tc, espuma moldada, preto e
                    verde,
                    TGT-HRTC-BL02
                </p>
                <a href="#">Adicionar ao carrinho</a>
            </div>
        </div>

        <button class="arrow right" onclick="scrollCarousel(1)">&#10095;</button>
    </div>
    </main>
    <?php require 'geral/rodape.php'; ?>

    <script>
        function scrollCarousel(direction) {
            const carousel = document.querySelector('.carousel');
            const cardWidth = document.querySelector('.card').offsetWidth + 20; // inclui margin
            carousel.scrollBy({
                left: direction * cardWidth,
                behavior: 'smooth'
            });
        }
    </script>
</body>

</html>