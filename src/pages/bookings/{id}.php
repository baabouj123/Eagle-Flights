<?php
/**
 * @var $props array
 */
$booking = $props["booking"];
?>
    <html lang="">
    <?php
    component("head");
    ?>
    <body class="bg-surface text-secondary h-screen px-12 flex flex-col justify-between">
    <main class="flex flex-col h-full justify-between p-8">
        <nav class="flex justify-between items-center relative z-10">
            <div class="flex items-center text-2xl">
                <a href="/bookings">
                    <ion-icon class="text-secondary mr-2" name="arrow-back">
                    </ion-icon>
                </a>
                <a class="font-bold font-poppins text-primary" href="/">Eagle Flight</a></div>
            <?php if (\app\core\Application::$app->anonymous()): ?>
                <div>
                <span
                        class="font-medium font-poppins border border-primary text-primary py-3 px-5 mx-2 rounded-full hover:shadow hover:shadow-primary/70 hover:cursor-pointer transition login-btn">
                    Log in
                </span>
                    <span
                            class="font-medium font-poppins text-gray-100 bg-primary py-3 px-5 mx-2 rounded-full cursor-pointer hover:shadow hover:shadow-primary/70 hover:cursor-pointer transition signup-btn">
                    Sign up
                </span>
                </div>
            <?php else: ?>
                <a href="/logout" class="flex items-center">
                    <h3 class="font-medium text-lg font-poppins py-3 mx-2"><?php echo \app\core\Application::$app->user->name ?></h3>
                    <ion-icon class="text-3xl" name="log-out-outline"></ion-icon>
                </a>
            <?php endif; ?>

        </nav>
        <section class="flex justify-evenly">
            <div class="rounded-3xl w-1/3 shadow h-96 hover:scale-105 hover:shadow-lg transition duration-300">
                <img class="object-cover rounded-t-3xl h-4/6 w-full" src="<?php echo $booking->destination_img; ?>"
                     alt="beautiful <?php echo $booking->arrival_city; ?>">
                <div class="px-4 py-2">
                    <h1 class="text-xl font-semibold font-poppins first-letter:uppercase"><?php echo $booking->arrival_city; ?></h1>
                    <div class="flex">
                        <img width="24" height="24" class="object-contain"
                             src="https://countryflagsapi.com/svg/<?php echo $booking->arrival_country; ?>"
                             alt="<?php echo $booking->arrival_country; ?> flag">
                        <p class="p-2 text-base text-secondary/60 font-poppins"><?php echo $booking->arrival_country; ?></p>
                    </div>
                    <div class="flex justify-between items-center my-2">
                        <div class="flex items-center">
                            <ion-icon class="text-primary text-base" name="calendar-clear-outline"></ion-icon>
                            <p class="pl-1 text-secondary/60 font-poppins text-sm"><?php echo date('M j', strtotime($booking->depart_date)); ?></p>
                        </div>
                        <p class="font-poppins font-semibold text-base"><?php echo $booking->price; ?>$</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-center border border-secondary/10 self-center p-4 shadow rounded-3xl">
                <div class="flex flex-col self-center w-fit text-sm font-medium font-poppins py-2 px-3">
                    <div class="flex">
                        <div class="w-52">
                            <div class="flex items-center mt-2 px-5">
                                <ion-icon class="text-primary text-base" name="location-outline"></ion-icon>
                                <p class="pl-1">from</p>
                            </div>
                            <p class="bg-surface text-base capitalize w-40 font-poppins my-2 mx-6">
                                <?php echo $booking->depart_city . ", " . $booking->depart_country; ?>
                            </p>
                        </div>
                        <div class="w-52">
                            <div class="flex items-center mt-2 px-5">
                                <ion-icon class="text-primary text-base" name="location-outline"></ion-icon>
                                <p class="pl-1">to</p>
                            </div>
                            <p class="bg-surface text-base capitalize w-40 font-poppins my-2 mx-6">
                                <?php echo $booking->arrival_city . ", " . $booking->arrival_country; ?>
                            </p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="w-52">
                            <div class="flex items-center mt-2 px-5">
                                <ion-icon class="text-primary text-base" name="calendar-clear-outline"></ion-icon>
                                <p class="pl-1">Date</p>
                            </div>
                            <p class="bg-surface text-base capitalize w-40 font-poppins my-2 mx-6">
                                <?php echo date('M j', strtotime($booking->depart_date)) . " - " . date('M j', strtotime($booking->arrival_date)); ?>
                            </p>
                        </div>
                        <div class="w-52">
                            <div class="flex items-center mt-2 px-5">
                                <ion-icon class="text-primary text-base" name="people-outline"></ion-icon>
                                <p class="pl-1">Travellers</p>
                            </div>
                            <p class="bg-surface text-base capitalize w-40 font-poppins my-2 mx-6">
                                1 traveller
                                <!--                            <input class="w-9" name="travellers" type="number" value="1"> traveller-->
                            </p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="w-52">
                            <div class="flex items-center mt-2 px-5">
                                <ion-icon class="text-primary text-base" name="pricetag-outline"></ion-icon>
                                <p class="pl-1">Price</p>
                            </div>
                            <p class="bg-surface text-base capitalize w-40 font-poppins my-2 mx-6">
                                <?php echo $booking->price; ?>$<span class="text-sm lowercase opacity-60">/person</span>
                            </p>
                        </div>
                        <div class="w-52">
                            <div class="flex items-center mt-2 px-5">
                                <ion-icon class="text-primary text-base" name="people-outline"></ion-icon>
                                <p class="pl-1">Seats</p>
                            </div>
                            <p class="bg-surface text-base capitalize w-40 font-poppins my-2 mx-6">
                                <?php echo $booking->available_seats; ?><span
                                        class="text-sm lowercase opacity-60">/<?php echo $booking->seats; ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                <?php if (\app\core\Application::$app->anonymous()): ?>
                    <div class="flex justify-center">
                    <span
                            class="font-medium font-poppins text-gray-100 bg-primary py-3 px-8 rounded-full hover:shadow hover:shadow-primary/70 transition mx-4 login-btn">
                        Log in
                    </span>
                    </div>
                <?php elseif (empty($booking)): ?>

                <?php else: ?>
                    <form id="cancel-booking-form" class="flex justify-center" action="/bookings/<?php echo $booking->id; ?>" method="post">
                        <?php
                            csrf();
                        ?>
                        <button
                                type="submit"
                                name="booking_id"
                                value="<?php echo $booking->id; ?>"
                                class="self-center font-medium font-poppins border-primary text-primary py-3 px-8 border rounded-full hover:shadow hover:shadow-primary/70 transition mx-4">
                            Cancel
                        </button>
                    </form>
                <?php endif; ?>

            </div>
        </section>
    </main>
    <?php
    component("footer");
    component("login");
    component("signup");
    ?>
    <script src="<?php asset('js/auth.js'); ?>"></script>
    <script src="<?php asset('js/cancelBooking.js') ?>"></script>
    </body>
    </html>

<?php
return function ($req, $res) {
    $controller = new \app\controllers\Booking();
    return ['booking' => $controller->getSingleBooking($req, $res)];
}
?>