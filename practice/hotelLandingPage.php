<?php   session_start();
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet"  href = "/styles/hotelLandingPage.css">
    <script src="/scripts/hotelLandingPage.js"></script>
</head>
<body>
<?php require_once "navbar.php" ?>
 

    <!-- Landing page details -->

        <!-- Hero Image slider -->

        <div id="carouselExampleDark" class="carousel carousel-dark slide" style = "margin-top:20px;">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <!-- dont put careseoul in container -->
            <div class="carousel-inner  container col-12 col-sm-8 col-md-5  col-lg-4  col-xl-3 ">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="/images/firstHotelImage.jpg" class=" img-fluid w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="/images/SecondHotelImage.jpg" class=" img-fluid w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/images/ThirdHotelImage.jpg" class=" img-fluid w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span style = "background-color:#387262 !important;"id = "carouselBtn" class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span  style = "background-color:#387262 !important;"id = "carouselBtn" class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        </div>


        <div class = "container border mt-5">
            <h1 class = "text-center">ACTIVE BOOKINGS</h1>
            <div class = "row">
                <div class="col" style="width: 18rem;">
                        <div class = "card">
                            <div class="card-body">
                                <h5 class="card-title">Booking 1</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Deluxe</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="card-link">View booking</a>
                            </div>
                        </div>
                    </div>
                <div class="col" style="width: 18rem;">
                        <div class = "card">
                            <div class="card-body">
                                <h5 class="card-title">Booking 1</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Deluxe</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="card-link">View booking</a>
                            </div>
                        </div>
                    </div>
                <div class="col" style="width: 18rem;">
                        <div class = "card">
                            <div class="card-body">
                                <h5 class="card-title">Booking 1</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Deluxe</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="card-link">View booking</a>
                            </div>
                        </div>
                    </div>
                <div class="col" style="width: 18rem;">
                        <div class = "card">
                            <div class="card-body">
                                <h5 class="card-title">Booking 1</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Deluxe</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="card-link">View booking</a>
                            </div>
                        </div>
                    </div>
                <div class="col" style="width: 18rem;">
                        <div class = "card">
                            <div class="card-body">
                                <h5 class="card-title">Booking 1</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Deluxe</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="card-link">View booking</a>
                            </div>
                        </div>
                    </div>


            </div>
        </div>


        <div class = "container border mt-5">
            <h1 class = "text-center">Description</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores voluptas omnis aut corporis labore facere excepturi quasi ad temporibus quos assumenda accusamus culpa recusandae iure, est enim molestiae porro officia.</p>
        </div>

        <div class = "container text-center mt-4">
            <button  type="button" class="btn btn-success"><a style = "color:aliceblue;" href = "/practice/hotel.php">Book room</a></button>
        </div>
        







    <!-- Active bookings -->



    <!-- description and details of hotel -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>