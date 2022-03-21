<?php
?>
<div id="edit-flight-modal" class="fixed inset-0 z-10 overflow-y-auto hidden">
    <div id="close-modal" class="fixed inset-0 w-full h-full bg-black/70"></div>
    <div class="flex items-center min-h-screen px-4 py-8">
        <div class="relative w-full max-w-3xl mx-auto bg-secondary rounded-2xl">
            <h1 class="text-3xl font-poppins font-semibold text-center py-4">Edit Flight</h1>
            <form id="edit-flight-form" class="grid grid-cols-2 items-center justify-center h-full px-8">
                <div class="my-2 mx-4">
                    <input class="bg-secondary/50 caret-primary w-full text-lg font-medium font-poppins shadow rounded-full my-2 py-3 px-5 outline-none border-2 border-gray-600 focus:border-primary <?php echo $errors['email'] ? 'border-red-600' : ''; ?>"
                           id="depart_city" type="text" name="depart_city"
                           placeholder="Depart City">
                    <p id="depart_city-error" class="pl-5 first-letter:uppercase font-poppins text-red-600"></p>
                </div>
                <div class="my-2 mx-4">
                    <input class="bg-secondary/50 caret-primary w-full text-lg font-medium font-poppins shadow rounded-full my-2 py-3 px-5 outline-none border-2 border-gray-600 focus:border-primary <?php echo $errors['email'] ? 'border-red-600' : ''; ?>"
                           id="depart_date" type="datetime-local" name="depart_date"
                           placeholder="Depart date">
                    <p id="depart_date-error" class="pl-5 first-letter:uppercase font-poppins text-red-600"></p>
                </div>
                <div class="my-2 mx-4">
                    <input class="bg-secondary/50 caret-primary w-full text-lg font-medium font-poppins shadow rounded-full my-2 py-3 px-5 outline-none border-2 border-gray-600 focus:border-primary <?php echo $errors['email'] ? 'border-red-600' : ''; ?>"
                           id="arrival_country" type="text" name="arrival_country"
                           placeholder="Arrival country">
                    <p id="arrival_country-error" class="pl-5 first-letter:uppercase font-poppins text-red-600"></p>
                </div>
                <div class="my-2 mx-4">
                    <input class="bg-secondary/50 caret-primary w-full text-lg font-medium font-poppins shadow rounded-full my-2 py-3 px-5 outline-none border-2 border-gray-600 focus:border-primary <?php echo $errors['email'] ? 'border-red-600' : ''; ?>"
                           id="arrival_date" type="datetime-local" name="arrival_date"
                           placeholder="Arrival date">
                    <p id="arrival_date-error" class="pl-5 first-letter:uppercase font-poppins text-red-600"></p>
                </div>
                <div class="my-2 mx-4">
                    <input class="bg-secondary/50 caret-primary w-full text-lg font-medium font-poppins shadow rounded-full my-2 py-3 px-5 outline-none border-2 border-gray-600 focus:border-primary <?php echo $errors['email'] ? 'border-red-600' : ''; ?>"
                           id="arrival_city" type="text" name="arrival_city"
                           placeholder="Arrival city">
                    <p id="arrival_city-error" class="pl-5 first-letter:uppercase font-poppins text-red-600"></p>
                </div>
                <div class="my-2 mx-4">
                    <input class="bg-secondary/50 caret-primary w-full text-lg font-medium font-poppins shadow rounded-full my-2 py-3 px-5 outline-none border-2 border-gray-600 focus:border-primary <?php echo $errors['email'] ? 'border-red-600' : ''; ?>"
                           id="price" type="text" name="price"
                           placeholder="Price">
                    <p id="price-error" class="pl-5 first-letter:uppercase font-poppins text-red-600"></p>
                </div>
                <div class="my-2 mx-4">
                    <input class="bg-secondary/50 caret-primary w-full text-lg font-medium font-poppins shadow rounded-full my-2 py-3 px-5 outline-none border-2 border-gray-600 focus:border-primary <?php echo $errors['email'] ? 'border-red-600' : ''; ?>"
                           id="destination_img" type="text" name="destination_img"
                           placeholder="Image URL">
                    <p id="destination_img-error" class="pl-5 first-letter:uppercase font-poppins text-red-600"></p>
                </div>
                <div class="my-2 mx-4">
                    <input class="bg-secondary/50 caret-primary w-full text-lg font-medium font-poppins shadow rounded-full my-2 py-3 px-5 outline-none border-2 border-gray-600 focus:border-primary <?php echo $errors['email'] ? 'border-red-600' : ''; ?>"
                           id="seats" type="text" name="seats"
                           placeholder="Seats">
                    <p id="seats-error" class="pl-5 first-letter:uppercase font-poppins text-red-600"></p>
                </div>
                <?php
                csrf();
                ?>
                <button type="submit"
                        class="w-fit mx-4 font-medium font-poppins text-gray-100 bg-primary my-4 py-3 px-12 rounded-full cursor-pointer hover:shadow hover:shadow-primary/70 transition">
                    Edit
                </button>
            </form>
        </div>
    </div>
</div>