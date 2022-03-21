<?php
?>
<nav class="flex justify-between items-center relative z-10">
    <h1 class="text-2xl font-mono font-poppins font-bold text-primary"><a href="/">Eagle Flight</a></h1>
    <ul class="flex justify-evenly items-center">
        <li class="font-medium font-poppins mx-2 px-4 pb-2 border-b-2 border-transparent transition hover:border-primary hover:cursor-pointer">
            <a href="/flights">Flights</a>
        </li>
        <li class="font-medium font-poppins mx-2 px-4 pb-2 border-b-2 border-transparent transition hover:border-primary hover:cursor-pointer">
            <a href="/bookings">Bookings</a>
        </li>
        <li class="font-medium font-poppins mx-2 px-4 pb-2 border-b-2 border-transparent transition hover:border-primary hover:cursor-pointer">
            <a href="/contact">Contact</a>
        </li>
    </ul>
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
        <?php
            component("login");
        ?>
        <?php
            component("signup");
        ?>
    <?php else: ?>
        <form id="logout-form" method="post" class="flex items-center">
            <?php
                csrf();
            ?>
            <button type="submit" class="flex items-center">
                <h3 class="font-medium text-lg font-poppins py-3 mx-2"><?php echo \app\core\Application::$app->user->name ?></h3>
                <ion-icon class="text-3xl" name="log-out-outline"></ion-icon>
            </button>
        </form>
    <?php endif; ?>
</nav>

<script src="<?php asset("js/auth.js"); ?>
"></script>
