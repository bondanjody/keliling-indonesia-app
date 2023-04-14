<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Untuk styling icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/style/index.css');?>" media="all"/>
    <style>
        /* slideshow style */
        .mySlides {display: none;}
        img {vertical-align: middle;}
        /* Slideshow container */
        .slideshow-container {
        max-width: 780px;
        position: relative;
        margin: auto;
        }
        /* Caption text */
        .text {
        background-color: #001219;
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 0;
        width: 100%;
        text-align: center;
        }
        /* Number text (1/3) */
        .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
        }
        /* Indikator */
        .dot {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
        }
        .active {
        background-color: #717171;
        }
        /* Fading animation */
        .fade {
        animation-name: fade;
        animation-duration: 1.5s;
        }
        @keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
        }
        /* Responsif */
        @media only screen and (max-width: 300px) {
        .text {font-size: 11px}
        }
    </style>
</head>
<body>
    <!-- container -->
    <div class="container">

        <!-- header -->
        <div class="header">
            <a href="/">
                <img src="<?php echo base_url('asset/logo/logoki.png') ?>" alt="judullogo">
            </a>
        </div>

        <!-- navbar -->
        <div class="navbar">
            <a href="/">Beranda</a>
            <a href="/tambah">Tambah</a>
            <div class="dropdown">
                <button class="dropbtn">Cek Tiket 
                <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                <a href="https://traveloka.com" target="_blank">Traveloka</a>
                <a href="https://tiket.com" target="_blank">Tiket.com</a>
                </div>
            </div> 
        </div>

        <!-- Content -->
        <div class="content-container">

            <?= $this->renderSection('content') ?>
        
        </div>

        <!-- bottom info -->
        <div class="bottom-info">
            <div class="side-1">
                <h4>Hubungi kami </h4>
                <br>
                <div class="socmed">
                    <a href="https://www.facebook.com/bondan.jody" target="_blank" class="fa fa-facebook" style="color:white;" title="Keliling Indonesia"></a>
                    <a href="https://www.twitter.com/bondan_js" target="_blank" class="fa fa-twitter" style="color: white;" title="@keliling_indonesia"></a>
                    <a href="https://www.instagram.com/bondanjs" target="_blank" class="fa fa-instagram" style="color: white;" title="kelilingindonesia"></a>
                </div>
            </div>
            <div class="side-2">
                <h4>Pengen jadi kontributor ?</h4>
                <br>
                <p>Klik <a href="../../contributor.php" class="contributor-link">di sini</a></p>
            </div>
        </div>

        <!-- footer -->
        <div class="footer">
            <p>Copyright &copy; 2022 Keliling Indonesia</p>
        </div>
    <!-- import script -->
    <script src="script/script.js"></script>
</body>
</html>