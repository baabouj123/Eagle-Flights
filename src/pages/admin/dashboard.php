<?php

/**
 * @var $props array
 */

$title = "Eagle Flights - Dashboard";
?>
    <html lang="">
    <?php
    component("head");
    ?>
    <body class="flex h-screen bg-secondary/90 text-surface">
    <aside class="static top-0 left-0 h-screen p-4 flex flex-col justify-between
                  bg-secondary shadow-lg">
        <div class="flex flex-col">
            <div class="relative flex items-center justify-center
    h-12 w-12 mt-2 mb-2 mx-auto
  bg-secondary/20 hover:bg-primary
  text-primary hover:text-surface
    hover:rounded-xl rounded-3xl
    transition-all duration-300 ease-linear
    cursor-pointer shadow-lg group tab" id="dashboard-page">
                <ion-icon class="text-2xl" name="home-outline"></ion-icon>
                <p class="absolute w-auto p-2 m-2 min-w-max left-14 rounded-md shadow-md
    text-surface bg-secondary
    text-xs font-bold font-poppins
    transition-all duration-100 scale-0 origin-left group-hover:scale-100">Dashboard</p>
            </div>
            <div class="relative flex items-center justify-center
    h-12 w-12 mt-2 mb-2 mx-auto
  bg-secondary/20 hover:bg-primary
  text-primary hover:text-surface
    hover:rounded-xl rounded-3xl
    transition-all duration-300 ease-linear
    cursor-pointer shadow-lg group tab" id="flights-page">
                <ion-icon class="text-2xl" name="airplane-outline"></ion-icon>
                <p class="absolute w-auto p-2 m-2 min-w-max left-14 rounded-md shadow-md
    text-surface bg-secondary
    text-xs font-bold font-poppins
    transition-all duration-100 scale-0 origin-left group-hover:scale-100">Flights</p>
            </div>
            <div class="relative flex items-center justify-center
    h-12 w-12 mt-2 mb-2 mx-auto
  bg-secondary/20 hover:bg-primary
  text-primary hover:text-surface
    hover:rounded-xl rounded-3xl
    transition-all duration-300 ease-linear
    cursor-pointer shadow-lg group tab" id="add-flight-page">
                <ion-icon class="text-3xl" name="add-outline"></ion-icon>
                <p class="absolute w-auto p-2 m-2 min-w-max left-14 rounded-md shadow-md
    text-surface bg-secondary
    text-xs font-bold font-poppins
    transition-all duration-100 scale-0 origin-left group-hover:scale-100">Add Flight</p>
            </div>
            <div class="relative flex items-center justify-center
    h-12 w-12 mt-2 mb-2 mx-auto
  bg-secondary/20 hover:bg-primary
  text-primary hover:text-surface
    hover:rounded-xl rounded-3xl
    transition-all duration-300 ease-linear
    cursor-pointer shadow-lg group tab" id="bookings-page">
                <ion-icon class="text-2xl" name="bookmark-outline"></ion-icon>
                <p class="absolute w-auto p-2 m-2 min-w-max left-14 rounded-md shadow-md
    text-surface bg-secondary
    text-xs font-bold font-poppins
    transition-all duration-100 scale-0 origin-left group-hover:scale-100">Bookings</p>
            </div>
            <div class="relative flex items-center justify-center
    h-12 w-12 mt-2 mb-2 mx-auto
  bg-secondary/20 hover:bg-primary
  text-primary hover:text-surface
    hover:rounded-xl rounded-3xl
    transition-all duration-300 ease-linear
    cursor-pointer shadow-lg group tab" id="messages-page">
                <ion-icon class="text-2xl" name="chatbox-outline"></ion-icon>
                <p class="absolute w-auto p-2 m-2 min-w-max left-14 rounded-md shadow-md
    text-surface bg-secondary
    text-xs font-bold font-poppins
    transition-all duration-100 scale-0 origin-left group-hover:scale-100">Messages</p>
            </div>
        </div>
        <form id="logout-form" method="post" class="relative flex items-center justify-center
    h-12 w-12 mt-2 mb-2 mx-auto
  bg-secondary/20 hover:bg-primary
  text-primary hover:text-surface
    hover:rounded-xl rounded-3xl
    transition-all duration-300 ease-linear
    cursor-pointer shadow-lg group">
            <?php
            csrf();
            ?>
            <button type="submit" class="flex items-center">
                <ion-icon class="text-2xl" name="log-out-outline"></ion-icon>
                <p class="absolute w-auto p-2 m-2 min-w-max left-14 rounded-md shadow-md
    text-surface bg-secondary
    text-xs font-bold font-poppins
    transition-all duration-100 scale-0 origin-left group-hover:scale-100">Log out</p>
            </button>
        </form>
    </aside>
    <main class="flex flex-col justify-between h-screen w-full px-8">
        <header class="py-4">
            <h1 class="text-2xl font-mono font-poppins font-bold text-primary"><a href="/">Eagle Flight</a></h1>
        </header>
        <section class="flex w-full h-full dashboard-page hidden">
            <div class="flex flex-col justify-evenly h-full">
                <div class="flex items-center flex-col w-48 bg-primary px-4 py-2 font-poppins text-surface rounded-lg">
                    <h3 class="text-lg font-medium px-2">Total Users</h3>
                    <div class="flex items-center self-center">
                        <ion-icon class="text-2xl" name="people"></ion-icon>
                        <p class="text-2xl font-semibold p-2"><?php echo $props["total_users"]; ?></p>
                    </div>
                </div>
                <div class="flex items-center flex-col w-48 bg-primary px-4 py-2 font-poppins text-surface rounded-lg">
                    <h3 class="text-lg font-medium px-2">Total Flights</h3>
                    <div class="flex items-center self-center">
                        <ion-icon class="text-2xl" name="airplane"></ion-icon>
                        <p class="text-2xl font-semibold p-2"><?php echo $props["total_flights"]; ?></p></div>
                </div>
                <div class="flex items-center flex-col w-48 bg-primary px-4 py-2 font-poppins text-surface rounded-lg">
                    <h3 class="text-lg font-medium px-2">Total Bookings</h3>
                    <div class="flex items-center self-center">
                        <ion-icon class="text-2xl" name="bookmark"></ion-icon>
                        <p class="text-2xl font-semibold p-2"><?php echo $props["total_bookings"]; ?></p></div>
                </div>
            </div>
            <div class="w-full">
                <div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </section>
        <section class="flex py-8 flex-col w-full h-full flights-page overflow-auto">
            <?php foreach ($props["flights"] as $flight) : ?>
                <div class="flex justify-between items-center p-4 w-full bg-secondary/60 my-4 rounded-lg">
                    <p class="w-1/4 p-2 text-base font-poppins font-medium capitalize"><?php echo $flight->depart_city . " , " . $flight->depart_country; ?></p>
                    <p class="w-1/4 p-2 text-base font-poppins font-medium capitalize"><?php echo $flight->arrival_city . " , " . $flight->arrival_country; ?></p>
                    <p class="w-fit p-2 text-base font-poppins font-medium capitalize"><?php echo date('M j', strtotime($flight->depart_date)) . ' - ' . date('M j', strtotime($flight->arrival_date)); ?></p>
                    <p class="w-fit p-2 text-base font-poppins font-medium capitalize"><?php echo $flight->price; ?>
                        $</p>
                    <p class="w-fit p-2 text-base font-poppins font-medium capitalize"><?php echo $flight->seats; ?></p>
                    <div class="flex justify-between items-center w-fit text-base font-poppins font-medium">
<!--                        <form id="edit-flight-form" class="m-2">-->
<!--                            --><?php //csrf(); ?>
                            <button id="edit-flight-btn" value="<?php echo $flight->id; ?>"
                                    class="m-2 rounded-xl p-2 bg-blue-500 text-lg">
                                <ion-icon name="pencil-outline"></ion-icon>
                            </button>
<!--                        </form>-->
                        <form id="delete-flight-form" class="m-2">
                            <?php csrf(); ?>
                            <button type="submit" value="<?php echo $flight->id; ?>"
                                    class="p-2 rounded-xl bg-red-600 text-xl">
                                <ion-icon name="trash-outline"></ion-icon>
                            </button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php component("editFlight");?>
        </section>
        <section class="flex py-8 flex-col w-full h-full add-flight-page hidden overflow-auto">
            <h1 class="text-3xl font-poppins font-semibold text-center pb-4">Add Flight</h1>
            <form id="add-flight-form" class="grid grid-cols-2 items-center justify-center h-full px-8">
                <div class="my-2 mx-4">
                    <input class="bg-secondary/50 caret-primary w-full text-lg font-medium font-poppins shadow rounded-full my-2 py-3 px-5 outline-none border-2 border-secondary/80 focus:border-primary"
                           id="depart_city" type="text" name="depart_city"
                           placeholder="Depart City">
                    <p id="depart_city-error" class="pl-5 first-letter:uppercase font-poppins text-red-600"></p>
                </div>
                <div class="my-2 mx-4">
                    <input class="bg-secondary/50 caret-primary w-full text-lg font-medium font-poppins shadow rounded-full my-2 py-3 px-5 outline-none border-2 border-secondary/80 focus:border-primary"
                           id="depart_date" type="datetime-local" name="depart_date"
                           placeholder="Depart date">
                    <p id="depart_date-error" class="pl-5 first-letter:uppercase font-poppins text-red-600"></p>
                </div>
                <div class="my-2 mx-4">
                    <input class="bg-secondary/50 caret-primary w-full text-lg font-medium font-poppins shadow rounded-full my-2 py-3 px-5 outline-none border-2 border-secondary/80 focus:border-primary"
                           id="arrival_country" type="text" name="arrival_country"
                           placeholder="Arrival country">
                    <p id="arrival_country-error" class="pl-5 first-letter:uppercase font-poppins text-red-600"></p>
                </div>
                <div class="my-2 mx-4">
                    <input class="bg-secondary/50 caret-primary w-full text-lg font-medium font-poppins shadow rounded-full my-2 py-3 px-5 outline-none border-2 border-secondary/80 focus:border-primary"
                           id="arrival_date" type="datetime-local" name="arrival_date"
                           placeholder="Arrival date">
                    <p id="arrival_date-error" class="pl-5 first-letter:uppercase font-poppins text-red-600"></p>
                </div>
                <div class="my-2 mx-4">
                    <input class="bg-secondary/50 caret-primary w-full text-lg font-medium font-poppins shadow rounded-full my-2 py-3 px-5 outline-none border-2 border-secondary/80 focus:border-primary"
                           id="arrival_city" type="text" name="arrival_city"
                           placeholder="Arrival city">
                    <p id="arrival_city-error" class="pl-5 first-letter:uppercase font-poppins text-red-600"></p>
                </div>
                <div class="my-2 mx-4">
                    <input class="bg-secondary/50 caret-primary w-full text-lg font-medium font-poppins shadow rounded-full my-2 py-3 px-5 outline-none border-2 border-secondary/80 focus:border-primary"
                           id="price" type="text" name="price"
                           placeholder="Price">
                    <p id="price-error" class="pl-5 first-letter:uppercase font-poppins text-red-600"></p>
                </div>
                <div class="my-2 mx-4">
                    <input class="bg-secondary/50 caret-primary w-full text-lg font-medium font-poppins shadow rounded-full my-2 py-3 px-5 outline-none border-2 border-secondary/80 focus:border-primary"
                           id="destination_img" type="text" name="destination_img"
                           placeholder="Image URL">
                    <p id="destination_img-error" class="pl-5 first-letter:uppercase font-poppins text-red-600"></p>
                </div>
                <div class="my-2 mx-4">
                    <input class="bg-secondary/50 caret-primary w-full text-lg font-medium font-poppins shadow rounded-full my-2 py-3 px-5 outline-none border-2 border-secondary/80 focus:border-primary"
                           id="seats" type="text" name="seats"
                           placeholder="Seats">
                    <p id="seats-error" class="pl-5 first-letter:uppercase font-poppins text-red-600"></p>
                </div>
                <?php
                csrf();
                ?>
                <button type="submit"
                        class="w-fit mx-4 font-medium font-poppins text-gray-100 bg-primary my-4 py-3 px-12 rounded-full cursor-pointer hover:shadow hover:shadow-primary/70 transition">
                    Continue
                </button>
            </form>
            <script type="module" src="<?php asset("js/addFlight.js"); ?>
"></script>
        </section>
        <section class="bookings-page hidden">
            <h1>Bookings</h1>
        </section>
        <section class="messages-page hidden">
            <h1>Messages</h1>
        </section>
    </main>

    <script src="<?php asset("js/navigation.js"); ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];

        const data = {
            labels: labels,
            datasets: [{
                label: 'Total Flights',
                backgroundColor: '#02C39A',
                borderColor: 'rgb(255, 99, 132)',
                data: [35, 10, 5, 2, 20, 30, 45, 12, 32, 22, 9, 32],
            }, {
                label: 'Total Bookings',
                backgroundColor: '#ff4',
                borderColor: '#02C39A',
                data: [35, 10, 15, 22, 23, 30, 45, 12, 32, 22, 9, 32],
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {}
        };
    </script>
    <script>
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

    <script type="module" src="<?php asset("js/flight.js"); ?>
    "></script>
    <script src="<?php asset("js/auth.js"); ?>
"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
    </html>

<?php
return function (\app\core\Request $req, \app\core\Response $res) {
    if (app\core\Application::$app->anonymous() || !\app\core\Application::$app->user->isAdmin()) {
        $res->redirect("/admin");
        $res->end();
    }
    $usersModel = new \app\models\User();
    $flightsModel = new \app\models\Flight();
    $bookingsModel = new \app\models\Booking();
    return [
        "total_users" => $usersModel->count(),
        "total_flights" => $flightsModel->count(),
        "total_bookings" => $bookingsModel->count(),
        "flights" => $flightsModel->findMany()
    ];
}
?>