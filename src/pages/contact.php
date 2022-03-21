<!doctype html>
<html lang="">
<?php
component("head");
?>
<body class="flex flex-col justify-between bg-surface text-secondary h-screen w-screen px-20 pt-8">
<?php
component("navbar");
?>
<section class="flex flex-col h-full">
    <div class="pb-2 pt-8">
        <h1 class="font-semibold font-poppins text-3xl">Contact <span class="text-primary">Us</span></h1>
        <p class="py-2 font-poppins text-secondary/60 text-lg">Have you any question? Send us a message </p>
    </div>
    <form class="flex flex-col m-auto w-fit">
        <div class="flex">
            <div class="my-2 mx-4">
                <input class="bg-surface caret-primary text-lg font-medium font-poppins shadow rounded-full my-2 py-3 px-5 outline-none border-2 border-gray-50 focus:border-primary"
                       type="text" name="name" placeholder="Name">
                <!--            <p class="pl-5 first-letter:uppercase font-poppins text-red-600">--><?php //echo $errors['email'] ?><!--</p>-->
            </div>
            <div class="my-2 mx-4">
                <input class="bg-surface caret-primary text-lg font-medium font-poppins shadow rounded-full my-2 py-3 px-5 outline-none border-2 border-gray-50 focus:border-primary"
                       type="email" name="email" placeholder="Email">
                <!--            <p class="pl-5 first-letter:uppercase font-poppins text-red-600">--><?php //echo $errors['email'] ?><!--</p>-->
            </div>
        </div>
        <div class="my-2 mx-4">
            <input class="bg-surface w-full caret-primary text-lg font-medium font-poppins shadow rounded-full my-2 py-3 px-5 outline-none border-2 border-gray-50 focus:border-primary"
                   type="text" name="subject" placeholder="Subject">
            <!--            <p class="pl-5 first-letter:uppercase font-poppins text-red-600">--><?php //echo $errors['email'] ?><!--</p>-->
        </div>
        <div class="my-2 mx-4">
            <textarea class="bg-surface w-full caret-primary text-lg font-medium font-poppins shadow rounded-3xl my-2 py-3 px-5 resize-none outline-none border-2 border-gray-50 focus:border-primary"
                      name="message" placeholder="Your Message"></textarea>
<!--            <p class="pl-5 first-letter:uppercase font-poppins text-red-600">--><?php //echo $errors['password'] ?><!--</p>-->
        </div>
    </form>
</section>
<?php
component("footer");
?>
</body>
</html>
