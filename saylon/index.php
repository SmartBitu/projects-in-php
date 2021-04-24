<?php
if ($sessionStart = false) {
  session_start();
}
//$sessionStart = false;
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  //header("");
  //$sessionStart = true;
  //exit;
}
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://project/img/project.css">
  <title>Welcome -<?php if(isset($_SESSION['username'])){ echo $_SESSION['username'];} ?></title>
</head>

<body>
  

    <strong><?php
    if(isset($_SESSION['message'])){?>
      <div class="alert alert-warning alert-success" role="alert">
      <?php echo $_SESSION['message'];
      unset($_SESSION['message']);}?></strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
  <?php
  require 'loginSystem/partials/_nav.php';
  if(isset($_SESSION['username'])){
      require 'users/userPartials/_navUser.php';
  }

  ?>

  <section class="text-gray-700 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-wrap w-full mb-20">
        <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
          <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Over Services</h1>
          <div class="h-1 w-20 bg-indigo-500 rounded"></div>
        </div>
        <p class="lg:w-1/2 w-full leading-relaxed text-base">At <b><b>Abhi's salon,</b></b> while we believe in the truly transformational effect that gorgeous hair can have on the way we look and feel, we also believe that it's something everyone should be able to benefit from. At affordable prices, we're here to help make the well acclaimed Vikas Marwah experience available to all!<br><br>So pamper yourself with our world class services and rest assured, you will walk out feeling like a million bucks!</p>
      </div>
      <div class="flex flex-wrap -m-4">
        <div class="xl:w-1/4 md:w-1/2 p-4">
          <div class="bg-gray-100 p-6 rounded-lg">
            <img class="h-40 rounded w-full object-cover object-center mb-6" src="img/haircutting.jpg" alt="content">
            <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">SUBTITLE</h3>
            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Hair Cutting</h2>
            <p class="leading-relaxed text-base">We will work with you one-on-one to understand your personal style so we can create a haircut that complements your features and reflects you.</p>
          </div>
        </div>
        <div class="xl:w-1/4 md:w-1/2 p-4">
          <div class="bg-gray-100 p-6 rounded-lg">
            <img class="h-40 rounded w-full object-cover object-center mb-6" src="img/hairwash.jpg" alt="content">
            <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">SUBTITLE</h3>
            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Hair Wash and Blow Dry</h2>
            <p class="leading-relaxed text-base">From roots to tips, every hair strand is covered with a deep, rich, solid color filled with shine. To enhance your natural color, for grey coverage or to go darker, ourstylists can craft a personalized custom color to fit your needs.</p>
          </div>
        </div>
        <div class="xl:w-1/4 md:w-1/2 p-4">
          <div class="bg-gray-100 p-6 rounded-lg">
            <img class="h-40 rounded w-full object-cover object-center mb-6" src="img/haircolor.jpg" alt="content">
            <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">SUBTITLE</h3>
            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Hair Coloring</h2>
            <p class="leading-relaxed text-base">From roots to tips, every hair strand is covered with a deep, rich, solid color filled with shine. To enhance your natural color, for grey coverage or to go darker, ourstylists can craft a personalized custom color to fit your needs.</p>
          </div>
        </div>
        <div class="xl:w-1/4 md:w-1/2 p-4">
          <div class="bg-gray-100 p-6 rounded-lg">
            <img class="h-40 rounded w-full object-cover object-center mb-6" src="img/makeup.jpeg" alt="content">
            <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">SUBTITLE</h3>
            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Make up Artist</h2>
            <p class="leading-relaxed text-base">Bridal Makeup in Mumbai just got much better! Your wedding day is one of the most memorable days of your life. From the perfect hairstyle to picture perfect makeup, we will partner with you to ensure every detail is planned to perfection. If you've been looking for the perfect Bridal Makeup in Mumbai, your search stops here. Book the best wedding makeup artist in Mumbai and look stunning on your D Day.</p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="text-gray-700 body-font">
    <div class="container px-5 py-24 mx-auto flex flex-col">
      <div class="lg:w-4/6 mx-auto">
        <div class="rounded-lg h-64 overflow-hidden">
          <img alt="content" class="object-cover object-center h-full w-full" src="img/abhisylon1.jpg">
        </div>
        <div class="flex flex-col sm:flex-row mt-10">
          <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
            <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
              </svg>
            </div>
            <div class="flex flex-col items-center text-center justify-center">
              <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">Welcome To Abhi's Saloon</h2>
              <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
              <p class="text-base text-gray-600">Raclette knausgaard hella meggs normcore williamsburg enamel pin sartorial venmo tbh hot chicken gentrify portland.</p>
            </div>
          </div>
          <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-300 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
            <p class="leading-relaxed text-lg mb-4">ABHI SHARMA, a renowned name in Indian hairdressing is the hair stylist in Devgad who stands for fashion and trendsetting around hair. As Creative Director and Proprietor of Vikas Marwah's Hair Styling Academy & Salon, he already has three well-established hair salons in Devgad at the most classy locations in town. He trains his team at each of these spaces and also offers personalised packages for hair, skin,nail and makeup. Members get special privileges and new treatment packages for complete body-care keep things exciting. Get yourself pampered at the best hair salon in Devgad.</p>
            <a class="text-indigo-500 inline-flex items-center">Learn More
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    <?php
    require 'loginSystem/partials/_footer.php';
    ?>
</body>

</html>