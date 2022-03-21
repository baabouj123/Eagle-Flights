<?php
/**
 * @var $email string
 * @var $errors array
 */
?>
<div class="fixed inset-0 z-10 overflow-y-auto">
    <div class="fixed inset-0 w-full h-full bg-black opacity-40"></div>
    <div class="flex items-center min-h-screen px-4 py-8">
        <div class="relative w-full max-w-lg mx-auto bg-surface rounded-2xl">
            <img class="absolute w-full h-full object-cover rounded-2xl shadow-lg shadow-primary/20 z-0"
                 src="<?php asset("img/background-wave.svg"); ?>" alt="">
            <form class="flex flex-col items-center relative p-8 pt-0" method="post">
                <div class="flex justify-center items-center self-start">
                    <a href="/" class="hover:cursor-pointer"><img class="-rotate-90 w-8 h-8 mr-4"
                                                                  src="https://img.icons8.com/ios-filled/50/000000/long-arrow-up.png"
                                                                  alt="back to home"/></a>
                    <h1 class="text-4xl font-mono font-poppins font-bold self-start py-8">Sign up</h1>
                </div>
                <p class="font-medium pb-4 self-start text-xl font-poppins text-secondary/60">Welcome to <span class="text-primary">Eagle Flight</span>
                </p>
                <div class="flex flex-col z-10">
                    <!--        <input class="bg-surface text-lg font-medium font-poppins shadow rounded-full my-4 py-3 px-5 outline-none border-2 border-gray-50 focus:border-primary" type="text" name="name" placeholder="Enter full name">-->
                    <div class="my-2">
                        <input class="bg-surface caret-primary w-full text-lg font-medium font-poppins shadow rounded-full my-2 py-3 px-5 outline-none border-2 border-gray-50 focus:border-primary <?php echo $errors['name'] ? 'border-red-600' : ''; ?>"
                               type="text" name="name" value="<?php echo $name; ?>" placeholder="Enter full name">
                        <p class="pl-5 first-letter:uppercase font-poppins text-red-600"><?php echo $errors['name'] ?></p>
                    </div>
                    <div class="my-2">
                        <input class="bg-surface caret-primary w-full text-lg font-medium font-poppins shadow rounded-full my-2 py-3 px-5 outline-none border-2 border-gray-50 focus:border-primary <?php echo $errors['email'] ? 'border-red-600' : ''; ?>"
                               type="email" name="email" value="<?php echo $email; ?>" placeholder="Enter email address">
                        <p class="pl-5 first-letter:uppercase font-poppins text-red-600"><?php echo $errors['email'] ?></p>
                    </div>
                    <div class="my-2">
                        <input class="bg-surface caret-primary w-full text-lg font-medium font-poppins shadow rounded-full my-2 py-3 px-5 outline-none border-2 border-gray-50 focus:border-primary <?php echo $errors['password'] ? 'border-red-600' : ''; ?>"
                               type="password" name="password" placeholder="Enter password">
                        <p class="pl-5 first-letter:uppercase font-poppins text-red-600"><?php echo $errors['password'] ?></p>
                    </div>
                    <?php
                    require_once \app\core\Application::$ROOT_DIR . "\helpers\csrf.php";
                    ?>
                    <button type="submit"
                            class="font-medium font-poppins text-gray-100 bg-primary my-4 py-3 px-5 rounded-full cursor-pointer hover:shadow hover:shadow-primary/70 transition">
                        Continue
                    </button>
                    <p class="font-medium text-lg font-poppins text-secondary/60 mt-4 text-center">Already have an account? <a
                                href="/login" class="text-primary hover:cursor-pointer">Log in</a></p>
                </div>
            </form>
        </div>
    </div>
</div>