<hr style="height:1px;border-width:0;color:black;background-color:black">


<section class="text-gray-600 body-font relative">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Contact Us</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base"></p>
        </div>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <center>
                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                    <div class="flex flex-wrap -m-2" style="border:0;">
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                <input type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                                <input type="email" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                                <textarea id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <button class="btn btn-primary" name="contact">Submit</button>
                        </div>
                        <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center">
                            <a class="text-indigo-500">tmart@email.com</a>
                            <p class="leading-normal my-5">At post Dahibav
                                <br>Devgad, sindhudurg
                            </p>

                        </div>

                    </div>
                </div>
            </center>
        </form>
    </div>
</section>





<footer class="text-gray-400 body-font">
    <div class="container-fluid bg-dark text-light col-md-11">
        <p>
            <img src="img/t-shirt-logo.jpg" height="100" width="100" />

            <span class="ml-3 text-xl">T-MART.COM </span> © 2021 Tailblocks —
            <a href="https://www.facebook.com/akshay.bavkar.779" rel="noopener noreferrer" target="_blank">@AkshayBavkar</a>
        </p>

    </div>
    <!--<div class="container-fluid bg-dark text-light col-md-12">
  <p class="text-center py-3 mb-1">Copyright 2021 | All rights Reserved</p>
  <p class="text-center py-3 mb-1">Founders : Shreyash Rajam </p>-->

    </div>
</footer>