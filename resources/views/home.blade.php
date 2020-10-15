<!DOCTYPE html>
<html lang="en">
<head>
    <title>RateRing</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="icon" type="image/png" href="assets/img/rateringico.png"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/css/home/util.css">
    <link rel="stylesheet" type="text/css" href="assets/css/home/main.css">
    <!--===============================================================================================-->
</head>
<body>

<!--  -->
<div class="simpleslide100">
    <div class="simpleslide100-item bg-img1" style="background-image: url({{URL::asset('assets/images/bg01.jpg')}});"></div>
    <div class="simpleslide100-item bg-img1" style="background-image: url({{URL::asset('assets/images/bg02.jpg')}});"></div>
    <div class="simpleslide100-item bg-img1" style="background-image: url({{URL::asset('assets/images/bg03.jpg')}});"></div>
</div>

<div class="size1 overlay1">
    <!--  -->
    <div class="size1 flex-col-c-m p-l-15 p-r-15 p-t-50 p-b-50">
        <h3 class="l1-txt1 txt-center p-b-25">
            Coming Soon
        </h3>

        <p class="m2-txt1 txt-center p-b-48">
            Stay tuned!
            There is a project that will change the world
        </p>

        <div class="flex-w flex-c-m cd100 p-b-33">
            <div class="flex-col-c-m size2 bor1 m-l-15 m-r-15 m-b-20">
                <span class="l2-txt1 p-b-9 days">60</span>
                <span class="s2-txt1">Days</span>
            </div>

            <div class="flex-col-c-m size2 bor1 m-l-15 m-r-15 m-b-20">
                <span class="l2-txt1 p-b-9 hours">0</span>
                <span class="s2-txt1">Hours</span>
            </div>

            <div class="flex-col-c-m size2 bor1 m-l-15 m-r-15 m-b-20">
                <span class="l2-txt1 p-b-9 minutes">0</span>
                <span class="s2-txt1">Minutes</span>
            </div>

            <div class="flex-col-c-m size2 bor1 m-l-15 m-r-15 m-b-20">
                <span class="l2-txt1 p-b-9 seconds">0</span>
                <span class="s2-txt1">Seconds</span>
            </div>
        </div>

        <form class="w-full flex-w flex-c-m validate-form">

            <div class="wrap-input100 validate-input where1" data-validate = "Valid email is required: ex@abc.xyz">
                <input class="input100 placeholder0 s2-txt2" type="text" name="email" placeholder="Enter Email Address">
                <span class="focus-input100"></span>
            </div>


            <button class="flex-c-m size3 s2-txt3 how-btn1 trans-04 where1">
                Subscribe
            </button>
        </form>
    </div>
</div>





<!--===============================================================================================-->
<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="assets/vendor/bootstrap/js/popper.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="assets/vendor/countdowntime/moment.min.js"></script>
<script src="assets/vendor/countdowntime/moment-timezone.min.js"></script>
<script src="assets/vendor/countdowntime/moment-timezone-with-data.min.js"></script>
<script src="assets/vendor/countdowntime/countdowntime.js"></script>
<script>
    $('.cd100').countdown100({
        endtimeYear: 0,
        endtimeMonth: 0,
        endtimeDate: 35,
        endtimeHours: 18,
        endtimeMinutes: 0,
        endtimeSeconds: 0,
        timeZone: ""

    });
</script>
<!--===============================================================================================-->
<script src="assets/vendor/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="assets/js/home/main.js"></script>

</body>
</html>
