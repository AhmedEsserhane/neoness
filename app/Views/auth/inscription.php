<?= $this->extend("layouts/app") ?>
<?= $this->section("body") ?>



<div class="w-full bg-grey-lightest">
    <div class="container mx-auto py-8">
        <div class="w-5/6 lg:w-1/2 mx-auto bg-white rounded shadow">
            <div class="py-4 px-8 text-black text-xl border-b border-grey-lighter">Inscrivez-vous</div>

            <div class="py-4 px-8">
                <form class="mb-4" action="/inscription" method="post">
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
                    <div class="flex mb-4">
                        <!-- Prénom -->
                        <div class="w-1/2 mr-1">
                            <label class="block text-grey-darker text-sm font-bold mb-2" for="prenom">Prénom</label>
                            <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="prenom"
                                name="prenom" type="text" placeholder="Votre Prénom">
                        </div>
                        <!-- Nom -->
                        <div class="w-1/2 ml-1">
                            <label class="block text-grey-darker text-sm font-bold mb-2" for="nom">Nom</label>
                            <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="nom"
                                name="nom" type="text" placeholder="Votre Nom">
                        </div>
                    </div>

                    <div class="flex mb-4">
                        <!-- Pseudo -->
                        <div class="w-1/2 mr-1">
                            <label class="block text-grey-darker text-sm font-bold mb-2" for="pseudo">Pseudo</label>
                            <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="pseudo"
                                name="pseudo" type="text" placeholder="Votre Prénom" required>
                                <p class="text-grey text-xs mt-1">Au moins 4 caractères</p>
                        </div>
                        <!-- date de naissance -->
                        <div class="w-1/2 mr-1">
                            <label class="block text-grey-darker text-sm font-bold mb-2" for="birthday">Date de
                                naissance</label>
                            <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker"
                                id="birthday" name="birthday" type="date">
                        </div>
                    </div>

                    <div class="flex mb-4">
                        <!-- Téléphone -->
                        <div class="w-1/2 ml-1">
                            <label class="block text-grey-darker text-sm font-bold mb-2" for="phone">Téléphone</label>
                            <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="phone"
                                name="phone" type="phone" placeholder="01 23 45 67 89"
                                pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}">
                        </div>
                        <!-- Taille -->
                        <div class="w-1/2 ml-1">
                            <label class="block text-grey-darker text-sm font-bold mb-2" for="taille">Taille</label>
                            <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="taille"
                                name="taille" type="number">
                            <p class="text-grey text-xs mt-1">Votre taille (cm)</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="email">Adresse e-mail</label>
                        <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="email"
                            name="email" type="email" placeholder="Adresse e-mail" required>
                    </div>
                    <!-- mot de pass -->
                    <div class="mb-4">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">Mot de passe</label>
                        <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="password"
                            required name="password" type="password" placeholder="Votre mot de passe sécurisé">
                        <p class="text-grey text-xs mt-1">Au moins 6 caractères</p>
                    </div>
                    <!-- confirmation password -->
                    <div class="mb-4">
                        <label class="block text-grey-darker text-sm font-bold mb-1" for="cpassword">Confirmez votre mot
                            de passe</label>
                        <input class="appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="cpassword"
                            required name="cpassword" type="password"
                            placeholder="Confirmez votre mot de passe sécurisé">
                    </div>

                    <div class="flex items-center justify-between mt-2">
                        <button type="button"
                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            Inscription
                        </button>
                    </div>
                </form>
            </div>


            <p class="text-left py-2 px-8">
                <a href="#" class="text-grey-dark text-sm no-underline hover:text-grey-darker">
                    J'ai déjà un compte
                </a>
            </p>
        </div>

    </div>
</div>

<?= $this->endSection() ?>





`taille`