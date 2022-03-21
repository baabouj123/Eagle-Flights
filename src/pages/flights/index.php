<?php
/**
 * @var $props array
 */

$flights = $props['flights'];
?>
<html lang="">
<?php
component("head");
?>
<body class="bg-surface text-secondary px-12">
<main class="flex flex-col min-h-screen p-8">
    <?php
    component("navbar");
    ?>
    <div class="flex flex-col mt-8">
        <div class="flex self-center divide-x bg-surface w-fit text-sm font-medium font-poppins shadow rounded-full py-2 px-3">
            <div class="w-52">
                <div class="flex items-center mt-2 px-5">
                    <ion-icon class="text-primary text-base" name="location-outline"></ion-icon>
                    <p class="pl-1">from</p>
                </div>
                <input class="bg-surface caret-primary w-40 font-poppins my-2 mx-6 outline-none"
                       type="text" name="from" placeholder="Where from">
            </div>
            <div class="w-52">
                <div class="flex items-center mt-2 px-5">
                    <ion-icon class="text-primary text-base" name="location-outline"></ion-icon>
                    <p class="pl-1">to</p>
                </div>
                <input class="bg-surface caret-primary w-40 font-poppins my-2 mx-6 outline-none"
                       type="text" name="to" placeholder="Where to">
            </div>
            <div class="w-52">
                <div class="flex items-center mt-2 px-5">
                    <ion-icon class="text-primary text-base" name="calendar-clear-outline"></ion-icon>
                    <p class="pl-1">Date</p>
                </div>
                <input class="bg-surface w-40 font-poppins my-2 mx-6 outline-none"
                       type="date" name="date" placeholder="When">
            </div>
            <div class="flex">
                <div class="w-52">
                    <div class="flex items-center mt-2 px-5">
                        <ion-icon class="text-primary text-base" name="people-outline"></ion-icon>
                        <p class="pl-1">Travellers</p>
                    </div>
                    <input class="bg-surface caret-primary w-40 font-poppins my-2 mx-6 outline-none"
                           type="text" name="travellers" placeholder="1 traveller">
                </div>
                <button class="flex items-center p-2">
                    <ion-icon
                            class="text-surface p-3 rounded-full bg-primary text-2xl hover:shadow-primary hover:shadow-sm transition"
                            name="search-outline"></ion-icon>
                </button>
            </div>
        </div>
    </div>
    <section class="grid grid-cols-3 gap-8 my-8">
        <?php foreach ($flights as $flight) : ?>
            <a href="/flights/<?php echo $flight->id; ?>"
               class="rounded-3xl shadow h-96 hover:scale-105 hover:shadow-lg transition duration-300">
                <img class="object-cover rounded-t-3xl h-4/6 w-full" src="<?php echo $flight->destination_img; ?>"
                     alt="beautiful <?php echo $flight->arrival_city; ?>">
                <div class="px-4 py-2">
                    <h1 class="text-xl font-semibold font-poppins capitalize"><?php echo $flight->arrival_city; ?></h1>
                    <div class="flex">
                        <img width="24" height="24" class="object-contain"
                             src="https://countryflagsapi.com/svg/<?php echo $flight->arrival_country; ?>"
                             alt="<?php echo $flight->arrival_country; ?> flag">
                        <p class="p-2 text-base text-secondary/60 font-poppins font-medium capitalize"><?php echo $flight->arrival_country; ?></p>
                    </div>
                    <div class="flex justify-between items-center my-2">
                        <div class="flex items-center">
                            <ion-icon class="text-primary text-base" name="calendar-clear-outline"></ion-icon>
                            <p class="pl-1 text-secondary/60 font-poppins text-sm"><?php echo date('M j', strtotime($flight->depart_date)); ?></p>
                        </div>
                        <p class="font-poppins font-semibold text-base"><?php echo $flight->price; ?>$</p>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </section>
</main>
<?php
component("footer");
?>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

<?php
return function ($req) {
    $controller = new \app\controllers\Flight();
    return [
        "flights" => $controller->model->findMany()
    ];
}
?>
