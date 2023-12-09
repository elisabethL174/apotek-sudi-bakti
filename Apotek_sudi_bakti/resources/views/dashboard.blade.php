<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pharmacy Dashboard</title>
    <!-- Your styles and dependencies -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        
        .navbar-brand-clickable {
            display: flex;
        }

        .navbar-logo {
            width: 45px;
            height: 45px;
            margin-left: 25px;
            margin-right: 10px;
            margin-top: 0vh;
        }

        .navbar-brand-text {
            font-size: 16px;
            margin-top: 12px;
            color: black;
        }

        .navbar-link {
            font-size: 16px;
            text-decoration: none;
            font-weight: bold;
            color: black !important;
            white-space: nowrap; /* Prevents text wrapping */
            margin-left: 10px;
            margin-right: 10px;
        }

        .collapse {
            margin-right: 4.5%;
            justify-content: flex-end;
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
            background-color: #00988F;
            background-position: center;
            color: white;
            padding: 50px;
            display: flex;
            justify-content: space-between; /* Ensures equal space between sections */
            align-items: flex-start;
            padding-top: 0;
            margin-top: 50px;
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
        }

        .left-section h3 {
            font-size: 1.2em;
            margin-top: 50px;
            margin-bottom: 10px;
            justify-content: flex-start;
        }

        .right-section h3 {
            font-size: 1.2em;
            margin-top: 130px;
            margin-bottom: 10px;
        }

        .footer-logo {
            width: 50px;
            height: 50px;
            margin-left: 5px;
            margin-right: 5px;
            margin-top: 0vh;
        }

        span.navbar-toggler-icon {
            border-radius: 3px;
            filter: invert(100%); /* Invert the color to turn it white (or your desired color) */
        }

        @media screen and (max-width: 850px) {
            .hero-text {
                font-size: 4vw; /* Adjust hero text font size for smaller screens */
                margin-bottom: 30px; /* Increase margin */
            }

            /* Modify white-box-container and white-box styles */
            .white-box-container {
                flex-direction: column; /* Stack white boxes vertically */
                align-items: center; /* Center boxes horizontally */
                margin-top: 3rem; /* Increase top margin */
            }

            .white-box {
                width: 80%; /* Adjust the width of white boxes */
                height: auto; /* Allow height to adjust */
                margin: 1rem 0; /* Adjust margin */
            }

            .guh {
                font-size: 90%; /* Decrease text size */
                margin-top: 5px; /* Adjust top margin */
                margin-bottom: 5px; /* Adjust bottom margin */
            }

            /* Adjust the address font size in the About Us section */
            .ingfo-box {
                width: 90%; /* Adjust the width of the box */
            }

            .footer-container {
                flex-direction: column; /* Stack sections vertically */
                align-items: center; /* Center items horizontally */
                padding: 30px 20px; /* Adjust padding */
            }

            .left-section {
                margin-bottom: 20px; /* Add space between sections */
                align-items: center; /* Center items horizontally */
                text-align: center; /* Center text */
            }

            .left-section-hero {
                margin-top: 160px !important; /* Add space between sections */
            }

            .right-section {
                margin-left: 0; /* Remove left margin */
                margin-top: 20px; /* Add top margin */
                align-items: center; /* Center items horizontally */
                text-align: center; /* Center text */
            }

            .right-section-hero {
                margin-top: 0 !important; /* Reset margin top */
            }

            .footer-logo {
                width: 50px; /* Adjust image size */
                height: 50px; /* Adjust image size */
                margin: 5px; /* Adjust margin */
            }

            h3 {
                font-size: 1.2em; /* Adjust heading font size */
                margin-bottom: 5px; /* Adjust margin */
            }

            .footer-details-bold {
                margin-top: 0px;
            }

            h3.footer-details-bold {
                margin-top: 0px;
            }
        }

        .map-container {
            margin-top: 50px;
        }

        .footer-logo-hero {
            width: 90px;
            height: 90px;
            margin-left: 25px;
            margin-right: 10px;
            margin-top: 20px;
        }

        .footer-brand {
            display: flex;
            color: white;
        }

        .footer-brand-text {
            color: white;
            white-space: nowrap; /* Prevents text wrapping */
            margin-top: 50px;
            font-size: 2vw;
        }

        .footer-details {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
            margin-left: 20px;
        }

        .footer-details-bold {
            font-weight: bold;
            color: #FFB000;
            white-space: nowrap; /* Prevents text wrapping */
            font-size: 1.2em;
            margin: 0px;
        }

        .footer-details-text {
            color: white;
            white-space: nowrap; /* Prevents text wrapping */
            font-size: 1.2em;
            margin-right: 15px;
        }

    </style>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-white">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <div class="navbar-brand-clickable">
                <img src="images/logo.png" class ="navbar-logo" alt="Product 1">
                <h1 class="navbar-brand-text">APOTEK SUDI BAKTI</h1>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="navbar-link" href="#ingfokan">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="navbar-link" href="{{ route('marketplace.index') }}">Market Place</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            Logout
                        </x-dropdown-link>
                    </form>
                </li>
                <li class="nav-item">
                    <a class="navbar-link" href="/register">Profile</a>
                </li>
            </ul>
        </div>
    </nav>

        <div class="huh">
            <div class="hoh">
                <!-- Hero Section -->
                <div id="home" class="text-center mb-6 hero-section">
                    <h1 class="hero-text">Kini apotek Sudi Bakti telah<br>menyediakan platform pembelanjaan produk-produk kesehatan<br>melalui website terbaru kami</h1>
                    <a class="text-lg text-gray-600 small-hero-text" href="{{ route('marketplace.index') }}">Access Our Product</a>
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

                <div class="container-product">
                    <div class="container mt-5">
                        <div class="row">
                            @if(isset($products))
                                @foreach($products as $product)
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $product->name }}</h5>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal{{ $product->id }}">
                                                    Show More
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="productModalLabel">{{ $product->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Description: {{ $product->description }}</p>
                                                    <p>Price: {{ $product->price }}</p>
                                                    <p>Stock: {{ $product->stock }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Modal -->
                                @endforeach
                            @endif
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
                    <div class="footer-brand">
                        <img src="images/logo.png" class ="footer-logo-hero" alt="Product 1">
                        <h1 class="footer-brand-text">APOTEK SUDI BAKTI</h1>
                    </div>
                    <div class="footer-details">
                        <p><span class="footer-details-bold">Apoteker :</span> <span class="footer-details-text">apt. Indah Pertiwi S.Farm</span></p>
                        <p><span class="footer-details-bold">SIPA :</span> <span class="footer-details-text">446/APT.327/SIP.I/DPMPTSP/2023</span></p>
                        <p><span class="footer-details-bold">STRA :</span> <span class="footer-details-text">12 28 7 2 2 23-94010807</span></p>
                    </div>
                </div>
                <div class="right-section">
                    <h3 class="footer-details-bold">Alamat</h3>
                    <p class="footer-details-text">Jl. Gatot Subroto No.21<br>Kel. Sangiang Jaya, Kec. Periuk, Kota Tangerang<br>Telp. 021 5527408 / WA 0858 46335059</p>
                </div>
                <div class="map-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.576189257559!2d106.59772879445367!3d-6.187427107330337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fee23348dfc5%3A0x772f10000210b74a!2sApotik%20Sudi%20Bakti!5e0!3m2!1sen!2sus!4v1701955095899!5m2!1sen!2sus"
                    allowfullscreen=""
                    aria-hidden="false"
                    tabindex="0"
                    width="350" height="200" style="border-radius:15px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                ></iframe>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
