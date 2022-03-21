<?php
/**
 * @var $email string
 * @var $errors array
 */
?>
<div id="login-modal" class="fixed inset-0 z-10 overflow-y-auto hidden">
    <div class="fixed inset-0 w-full h-full bg-black opacity-40"></div>
    <div class="flex items-center min-h-screen px-4 py-8">
        <div class="relative w-full max-w-lg mx-auto bg-surface rounded-2xl">
            <img class="absolute w-full h-full object-cover rounded-2xl shadow-lg shadow-primary/20 z-0"
                 src="<?php asset("img/background-wave.svg"); ?>" alt="bg">
            <form id="login-form" class="flex flex-col items-center relative p-8 pt-0">
                <div class="flex justify-center items-center self-start">
                    <div id="close-login-modal" class="hover:cursor-pointer">
                        <img class="-rotate-90 w-8 h-8 mr-4"
                             src="https://img.icons8.com/ios-filled/50/000000/long-arrow-up.png"
                             alt="back to home"
                        />
                    </div>
                    <h1 class="text-4xl font-mono font-poppins font-bold self-start py-8">Log in</h1>
                </div>
                <p class="font-medium pb-4 self-start text-xl font-poppins text-secondary/60">Welcome to
                    <span class="text-primary">Eagle Flight</span>
                </p>
                <div class="flex flex-col z-10">
                    <div class="my-2">
                        <input class="bg-surface caret-primary w-full text-lg font-medium font-poppins shadow rounded-full my-2 py-3 px-5 outline-none border-2 border-gray-50 focus:border-primary <?php echo $errors['email'] ? 'border-red-600' : ''; ?>"
                              id="email" type="email" name="email"
                               placeholder="Enter email address">
                        <p id="email-error" class="pl-5 first-letter:uppercase font-poppins text-red-600"></p>
                    </div>
                    <div class="my-2">
                        <input class="bg-surface caret-primary w-full text-lg font-medium font-poppins shadow rounded-full my-2 py-3 px-5 outline-none border-2 border-gray-50 focus:border-primary <?php echo $errors['password'] ? 'border-red-600' : ''; ?>"
                               id="password" type="password" name="password" placeholder="Enter password">
                        <p id="password-error" class="pl-5 first-letter:uppercase font-poppins text-red-600"></p>
                    </div>
                    <?php
                    csrf();
                    ?>
                    <button type="submit"
                            class="font-medium font-poppins text-gray-100 bg-primary my-4 py-3 px-5 rounded-full cursor-pointer hover:shadow hover:shadow-primary/70 transition">
                        Continue
                    </button>
                    <p class="font-medium text-lg font-poppins text-secondary/60 mt-4 text-center">Don't have an
                        account? <span class="text-primary hover:cursor-pointer signup-btn">Sign Up</span></p>
                </div>
            </form>
        </div>
    </div>
</div>