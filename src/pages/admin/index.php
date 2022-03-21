<?php
?>
    <!doctype html>
    <html lang="">
    <?php
    component("head");
    ?>
    <body class="flex flex-col justify-between bg-surface text-secondary h-screen w-screen px-20 pt-8">
    <?php
    component("navbar");
    ?>
    <section class="flex flex-col justify-center items-center h-full">
        <div class="flex divide-x-2 divide-primary justify-center items-center"><h1
                    class="font-semibold font-poppins text-8xl text-primary p-4">401</h1>
            <p class="py-2 font-poppins text-secondary text-lg p-4">Unauthorized</p>
        </div>
        <a href="/"
           class="flex justify-center items-center font-medium font-poppins text-primary p-2 border-primary border-2 rounded-full cursor-pointer hover:shadow hover:shadow-primary/70 transition">
            <ion-icon class="text-2xl" name="arrow-back">
            </ion-icon>
        </a>
    </section>
    <?php
    component("footer");
    ?>
    <script>
        document.querySelector("#login-modal")?.classList.remove("hidden");
    </script>
    </body>
    </html>
<?php
return function (\app\core\Request $req, \app\core\Response $res) {
    if (!app\core\Application::$app->anonymous() && \app\core\Application::$app->user->isAdmin()) {
        $res->redirect("/admin/dashboard");
        $res->end();
    }
}
?>