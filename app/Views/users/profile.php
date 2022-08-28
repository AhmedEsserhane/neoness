<div class="items-center h-screen w-full">
    <div class="w-full bg-white rounded shadow-lg p-8 m-4 md:max-w-lg md:mx-auto">
        <span class="block w-full text-xl  font-bold mb-4"><?= $user['prenom'].' '.$user['nom'] ?></span>
        <hr>
        <!-- voire alert  -->
        <?php if (session()->get('success')): ?>
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
            role="alert">
            <span class="font-medium"> <?= session()->get('success') ?>
        </div>
        <?php endif; ?>

        <!-- voire alert  -->


        <form class="mb-4" action="/profile" method="post">
            <!-- Pseudo -->
            <div class="mb-4 md:w-full">
                <label for="pseudo" class="font-bold block text-xs mb-1">Pseudo</label>
                <input class="w-full border rounded p-2 outline-none focus:shadow-outline" type="text" name="pseudo"
                    id="pseudo" value="<?= set_value('pseudo', $user['pseudo']) ?>">
            </div>


            <!-- Nom -->
            <div class="mb-4 md:w-full">
                <label for="nom" class="font-bold block text-xs mb-1">Nom</label>
                <input class="w-full border rounded p-2 outline-none focus:shadow-outline" type="text" name="nom"
                    id="nom" value="<?= set_value('nom', $user['nom']) ?>">
            </div>
            <!-- Prenom -->
            <div class="mb-4 md:w-full">
                <label for="prenom" class="font-bold block text-xs mb-1">Prénom</label>
                <input class="w-full border rounded p-2 outline-none focus:shadow-outline" type="text" name="prenom"
                    id="prenom" value="<?= set_value('prenom', $user['prenom']) ?>">
            </div>

            <!-- Email -->
            <div class="mb-4 md:w-full">
                <label for="email" class="font-bold block text-xs mb-1">Email</label>   
                <input type="text" id="disabled-input-2" aria-label="disabled input 2" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= set_value('email',$user['email']) ?>" disabled readonly>
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