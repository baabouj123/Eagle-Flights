<?php
/**
 * @var $props array
 */

$bookings = $props["bookings"];
?>
<!doctype html>
<html lang="">
<?php
    component("head");
?>
<body class="bg-surface text-secondary min-h-screen overflow-x-hidden relative w-screen px-12">
<section id="container" class="flex flex-col min-h-screen p-8">
    <?php
        component("navbar");
    ?>
    <div class="pb-2 pt-8">
        <h1 class="font-semibold font-poppins text-3xl">My Bookings</h1>
        <p class="py-2 font-poppins text-secondary/60 text-lg">Keep track of your booked flights</p>
    </div>
    <?php if (\app\core\Application::$app->anonymous()): ?>
        <div class="m-auto">
            <p class="font-poppins font-medium text-xl">Log in to see your bookings!</p>
            <div class="flex justify-center m-4">
            <span
                    class="font-medium font-poppins text-gray-100 bg-primary py-3 px-8 rounded-full hover:cursor-pointer hover:shadow hover:shadow-primary/70 transition mx-4 login-btn">
                Log in
            </span>
            </div>
        </div>
    <?php elseif (empty($bookings)): ?>
        <div class="m-auto">
            <p class="font-poppins font-medium text-xl">You don't have any bookings !</p>
            <div class="flex justify-center m-4">
                <a href="/flights"
                   class="font-medium font-poppins text-gray-100 bg-primary py-3 px-8 rounded-full hover:shadow hover:shadow-primary/70 transition mx-4">
                    Explore Flights
                </a>
            </div>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-3 gap-8 my-4">
            <?php foreach ($bookings as $booking) : ?>
                <a href="/bookings/<?php echo $booking->id; ?>"
                   class="rounded-3xl shadow h-96 hover:scale-105 hover:shadow-lg transition duration-300">
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
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
<?php
    component("footer");
?>
</body>
</html>
<?php

return function ($req, $res) {
    $controller = new \app\controllers\Booking();
    return [
        "bookings" => $controller->getUserBookings($req, $res)
    ];
}

?>

