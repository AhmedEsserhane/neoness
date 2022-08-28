<div class="items-center h-screen w-full">
    <div class="w-full bg-white rounded shadow-lg p-8 m-4 md:max-w-lg md:mx-auto">
    <span class="block w-full text-xl  font-bold mb-4">Chengez votre mot de passe</span>
        <hr>
        <!-- voire alert  -->
        <?php if (session()->get('success')): ?>
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
            role="alert">
            <span class="font-medium"> <?= session()->get('success') ?>
        </div>
        <?php endif; ?>

        <!-- voire alert  -->


        <form class="mb-4" action="/password" method="post">
            


             <!-- password -->
             <div class="mb-6 md:w-full">
                <label for="password" class="font-bold  block text-xs mb-1">Mot de passe</label>
                <input class="w-full border rounded p-2 outline-none focus:shadow-outline" type="password" name="password"
                    id="password" placeholder="Votre mot de passe" value="">
            </div>
            <!-- confirmation password -->
            <div class="mb-6 md:w-full">
                <label for="cpassword" class=" font-bold  block text-xs mb-1">Confirmez le mot de passe</label>
                <input class="w-full border rounded p-2 outline-none focus:shadow-outline" type="password" name="cpassword"
                    id="cpassword" placeholder="Confirmez votre mot de passe" value="">
            </div>





            <!-- Alerts -->
            <?php if (isset($validation)) : ?>
            <div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                role="alert">

                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Danger</span>
                <div>
                    <span class="font-medium">Assurez vous que les champs obligatoires sont remplis:</span>
                    <ul class="mt-1.5 ml-4 text-red-700 list-disc list-inside">
                        <?= $validation->listErrors() ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>

            <!-- Fin Alerts -->





            <button type="submit"
                class="bg-green-500 hover:bg-green-700 text-white text-sm font-semibold px-4 py-2 rounded">Mise à
                jour</button>
        </form>


    </div>
</div>