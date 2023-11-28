<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pharmacy Dashboard</title>
    <style>
        .navbar-brand-clickable {
            display: flex;
        }

        .navbar-logo {
            width: 4%;
            height: 4%;
            margin-left: 25px;
            margin-right: 10px;
            margin-top: 0vh;
        }

        .navbar-brand-text {
            font-size: 1vw;
            margin-top: 1.5vh;
            color: black;
        }

        .navbar-text {
            font-size: 1vw;
            text-decoration: none;
            font-weight: bold;
            color: black !important;
            white-space: nowrap; /* Prevents text wrapping */
            margin-left: 10px;
            margin-right: 10px;
        }

        .collapse {
            margin-right: 20px;
        }

        .hero-section {
            background-image: url('images/apotek.png'); /* Replace 'path_to_your_image.jpg' with the actual path to your image */
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center; /* Center the background image */
            color: white; /* Set text color for better visibility */
            padding: 200px; /* Adjust padding as needed */
        }

        .hero-text {
            margin-top: -100px;
            margin-bottom: 75px;
            font-size: 2vw;
            color: white;
        }

        .small-hero-text {
            font-size: 1vw;
            color: white;
            font-style: italic;
            font-weight: bold;
        }

        hr.gah {
            border: 1px solid #0000ff;
            margin-left: 50px;
            margin-right: 50px;
        }

        .grey-thingy {
            width: 95vw;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 5rem;
            margin-bottom: 5rem;
            border-radius: 15px;
            flex-direction: column;
            z-index: 2;
        }

        .white-box-container {
            margin-top: 0.7vw;
            display: flex; /* Arrange white boxes horizontally */
            z-index: 2;
        }

        .white-box-container-again {
            display: flex; /* Arrange white boxes horizontally */
            flex-direction: column;
            justify-content: center;
            padding: 0;
            align-items: center; /* Center horizontally */
            text-align: center; /* Center the text within the box */
            margin: 1vw; /* Add some margin for spacing */
            z-index: 2;
        }

        .guh {
            text-align: center;
            justify-content: center;
            align-self: center;
            font-weight: bold;
            font-size: 100%;
            margin-top: 10px;
            margin-bottom: 0;
            z-index: 2;
            color: 06248C;
        }

        .white-box {
            display: flex;
            flex-direction: column; /* Stack content vertically */
            align-items: center; /* Center content horizontally */
            text-align: center; /* Center text within the box */
            background-color: white;
            border-radius: 15px;
            padding: 1vw;
            width: 17rem;
            height: 17rem;
            margin-left: 1vw;
            margin-right: 1vw;
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 1;
            margin-bottom: 0;
            z-index: 2;
            border: 2px solid #C1C1C1;
            border-radius: 10px;
        }

        .invisible-box {
            display: flex;
            width: 10rem;
            height: 10rem;
            align-items: center;
            justify-content: center;
        }

        .box-text {
            width: 17rem;
            height: 5rem;
            align-items: center;
            justify-content: center;
        }

        .wbimg {
            height: 50%;
            width: 50%;
            margin: 0;
        }

        .carousel .carousel-inner {
            transition: opacity 0.6s ease-in-out;
        }

        .carousel .carousel-item {
            opacity: 0;
            transition: opacity 0.6s ease-in-out;
        }

        .carousel .carousel-item.active, .carousel .carousel-item-next, .carousel .carousel-item-prev {
            opacity: 1;
        }

        .ingfo-kami {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .ingfo-box {
            border: 3px solid #c1c1c1;
            border-radius: 10px;
            padding-top: 20px;
            width: 75vw;
        }

        .footer-container {
            background-image: url('images/footer.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            color: white;
            padding: 50px;
            display: flex;
            justify-content: space-between; /* Ensures equal space between sections */
            align-items: flex-start;
            padding-top: 0;
        }

        .left-section {
            display: flex;
            flex-direction: column;
            align-items: flex-start; /* Align items to the left */
            flex: 1; /* Takes up equal horizontal space */
            justify-content: flex-start; /* Align content to the start (top) */
        }

        .footer-images {
            display: flex;
        }

        .right-section {
            flex: 1; /* Takes up equal horizontal space */
            margin-left: 600px;
        }

        .left-section h3 {
            font-size: 1.2em;
            margin-top: 250px;
            margin-bottom: 10px;
            justify-content: flex-start;
        }

        .right-section h3 {
            font-size: 1.2em;
            margin-top: 250px;
            margin-bottom: 10px;
        }

        .footer-logo {
            width: 12%;
            height: 12%;
            margin-left: 5px;
            margin-right: 5px;
            margin-top: 0vh;
        }

    </style>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <!-- Include your pharmacy logo or relevant header content here -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-white">
        <a class="navbar-brand" href="/">
            <div class="navbar-brand-clickable">
                <img src="images/logo.png" class ="navbar-logo" alt="Product 1">
                <h1 class="navbar-brand-text">APOTEK SUDI BAKTI</h1>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="navbar-text" href="#ingfokan">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="navbar-text" href="#">Market Place</a>
                </li>
                <li class="nav-item">
                    <a class="navbar-text" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="navbar-text" href="/register">Registrasi</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div id="home" class="text-center mb-6 hero-section">
                <h1 class="hero-text">Kini apotek Sudi Bakti telah<br>menyediakan platform pembelanjaan produk-produk kesehatan<br>melalui website terbaru kami</h1>
                <a class="text-lg text-gray-600 small-hero-text" href="#">Access Our Product</a>
            </div>

            <hr class="gah">

            <div class="grey-thingy">
                <div class="white-box-container">
                    <div class="white-box-container-again">
                        <div class="white-box">
                            <div class="invisible-box">
                                <img src="images/discount.png" class="wbimg">
                            </div>
                            <div class="box-text">
                                <h1 class="guh">You can access more feature<br>just by being a member.<br>IT'S FREE!<h1>
                            </div>
                        </div>
                    </div>
                    <div class="white-box-container-again">
                        <div class="white-box">
                            <div class="invisible-box">
                                <img src="images/products.png" class="wbimg">
                            </div>
                            <div class="box-text">
                                <h1 class="guh">We provide product<br>for your health.<h1>
                            </div>
                        </div>
                    </div>
                    <div class="white-box-container-again">
                        <div class="white-box">
                            <div class="invisible-box">
                                <img src="images/cs.png" class="wbimg">
                            </div>
                            <div class="box-text">
                                <h1 class="guh">We have Customer Service.<br>Ask us to solve your issues.<h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="gah">

            <!-- Carousel Section -->
            <div class="container">
            <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="5000" data-wrap="true">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/lan-evo-5.png" class="d-block w-100" alt="Image 1">
                    </div>
                    <div class="carousel-item">
                        <img src="images/R33.png" class="d-block w-100" alt="Image 2">
                    </div>
                    <div class="carousel-item">
                        <img src="images/eunos-cosmo.png" class="d-block w-100" alt="Image 3">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev" onclick="prevSlide()">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only"></span>
                </a>
                <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next" onclick="nextSlide()">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only"></span>
                </a>
            </div>

            <hr class="gah">

            <!-- About Us Section -->
            <div id="ingfokan" class="text-center ingfo-kami">
                <h2 class="text-2xl font-semibold mb-4">Tentang Kami</h2>
                <div class="ingfo-box">
                    <p class="text-gray-700">Terima kasih telah mengunjungi website kami.<br>Apotek Sudi Bakti telah berdiri lebih dari 20 tahun.<br></p>
                    <p class="text-gray-700">Kami buka dari hari senin - minggu Jam 8.00 - 21.00.<br>Apotek Sudi Bakti berada di Kota Tangerang.</p>
                </div>
            </div>
        </div>

        <div class="footer-container">
            <div class="left-section">
                <h3>Apotek Sudi Bakti</h3>
                <div class="footer-images">
                    <img src="images/logo-footer.png" class="footer-logo" alt="Pharmacy Logo">
                    <img src="images/instagram-footer.png" class="footer-logo" alt="Pharmacy Logo">
                </div>
            </div>
            <div class="right-section">
                <h3>Alamat</h3>
                <p>Jl. Duta Mas Plaza Jl. Gatot Subroto No.21,<br>RT.007/RW.010, Sanglang Jaya, Kec, Perluk,<br>Kota Tangerang, Banten 15132</p>
            </div>
        </div>
        
    </div>

    <script>
    
    // JavaScript to activate the carousel
    document.addEventListener('DOMContentLoaded', function() {
        var myCarousel = document.querySelector('#carouselExample');
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 5000, // Set the interval between slides (in milliseconds)
            // Add other options as needed
        });
    });
    
    </script>

<script>
    // JavaScript to manually control the carousel
    var currentIndex = 0;
    var items = document.querySelectorAll('.carousel-item');

    function showSlide(index) {
        items.forEach(function (item) {
            item.classList.remove('active');
        });
        items[index].classList.add('active');
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % items.length;
        showSlide(currentIndex);
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + items.length) % items.length;
        showSlide(currentIndex);
    }
</script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</body>
</html>