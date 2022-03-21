<?php

/**
 * @var $props array
 */

$flights = $props["flights"];

?>
    <!doctype html>
    <html lang="">
    <?php
    component("head");
    ?>
    <body class="bg-surface text-secondary min-h-screen overflow-x-hidden relative w-screen px-12">
    <section class="flex flex-col h-screen p-8">
        <?php
        component("navbar");
        ?>
        <div class="flex flex-col h-full justify-center mb-12">
            <div class="py-2">
                <h1 class="font-bold font-poppins text-5xl py-2">Discover a trip for</h1>
                <h1 class="font-bold font-poppins text-5xl text-primary py-2">your travel style</h1>
            </div>
            <p class="py-4 font-medium font-poppins text-secondary/60 text-xl">Book now, and travel spontaneously</p>
            <a href="/flights"
               class="font-medium font-poppins w-fit text-gray-100 bg-primary my-4 py-3 px-5 rounded-full hover:shadow hover:shadow-primary/70 transition">Explore</a>
        </div>
        <img class="absolute z-0 top-0 -right-64 w-[1000px] object-cover"
             src="<?php asset("img/hero-desktop.png"); ?>"
             alt="">
    </section>
    <section class="flex flex-col h-screen p-8">
        <div class="py-2">
            <h1 class="font-semibold font-poppins text-3xl">Explore</h1>
            <p class="py-2 font-poppins text-secondary/60 text-lg">Top destinations around the world</p>
        </div>

        <div class="grid grid-cols-3 gap-8 my-4">
            <?php foreach ($flights as $flight) : ?>
                <a href="/flights/<?php echo $flight->id; ?>"
                   class="rounded-3xl shadow h-96 hover:scale-105 hover:shadow-lg transition duration-300">
                    <img class="object-cover rounded-t-3xl h-4/6 w-full" src="
            <?php echo $flight->destination_img; ?>"
                         alt="beautiful <?php echo $flight->arrival_city; ?>">
                    <div class="px-4 py-2">
                        <h1 class="text-xl font-semibold font-poppins first-letter:uppercase">
                            <?php echo $flight->arrival_city; ?></h1>
                        <div class="flex">
                            <img width="24" height="24" class="object-contain"
                                 src="https://countryflagsapi.com/svg/<?php echo $flight->arrival_country; ?>"
                                 alt="<?php echo $flight->arrival_country; ?> flag">
                            <p class="p-2 text-base text-secondary/60 font-poppins">
                                <?php echo $flight->arrival_country; ?></p>
                        </div>
                        <div class="flex justify-between items-center my-2">
                            <div class="flex items-center">
                                <ion-icon class="text-primary text-base" name="calendar-clear-outline"></ion-icon>
                                <p class="pl-1 text-secondary/60 font-poppins text-sm">
                                    <?php echo date('M j', strtotime($flight->depart_date)); ?></p>
                            </div>
                            <p class="font-poppins font-semibold text-base">
                                <?php echo $flight->price; ?>$</p>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

        <a href="/flights"
           class="self-center font-medium font-poppins w-fit text-primary border rounded-full border-primary my-4 py-3 px-5 rounded-full hover:shadow hover:shadow-primary/70 hover:bg-secondary/5 transition">View
            all</a>
    </section>
    <?php
    component("footer");
    ?>
    </body>
    </html>

<?php
return function () {
    $controller = new \app\controllers\Flight();
    return [
        "flights" => $controller->model->findMany([
            "take" => 3
        ])
    ];
}
?>