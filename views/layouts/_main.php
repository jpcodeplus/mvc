<?php
$company = [
    'name' => 'CPM Framework'
];

$menu = [
    'main' => [
        ['/', 'Home'],
        ['/contact', 'Contact'],
        ['/login', 'Anmelden'],
        ['/register', 'Regestrieren'],
    ]
];

$mainMenu = $menu["main"];
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>



    <div class="min-h-screen flex flex-col">
        <header>
            <nav class="bg-white border-gray-200 dark:bg-gray-900">

                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <span class="ml-4 text-xl font-bold tracking-tighter text-transparent  tracking-relaxed lg:text-2xl bg-clip-text bg-gradient-to-r from-white to-blue-200/20">
                                CPM<span class="font-light"> Framework</span>
                            </span>
                    </a>

                    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>

                    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                            <?php

                            $styleMD = "md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0";
                            $styleHOVER = "hover:bg-gray-100 md:dark:hover:bg-transparent";
                            $styleDARK = "dark:text-white md:dark:hover:text-orange-300 dark:hover:bg-gray-700 dark:hover:text-white";
                            $styleNormal = "block py-2 px-3 text-gray-900 rounded font-thin";

                            $style = $styleMD . ' ' . $styleHOVER . ' ' . $styleDARK . ' ' . $styleNormal;

                            foreach ($mainMenu as $key => $link) {
                                echo '<li><a href="' . $link[0] . '" class="' . $style . '">' . $link[1] . '</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>


        <div class="flex flex-wrap justify-between items-center p-5 bg-gray-800 text-white">
  <div class="flex justify-start lg:w-0 lg:flex-1">
    <a href="/" class="font-medium text-white">
      MeinName
    </a>
  </div>
  <div class="-mr-2 -my-2 lg:hidden">
    <button type="button" class="p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100" id="menuButton">
      <span class="sr-only">Menü öffnen</span>
      <!-- Hier fügen wir das Burger-Icon ein -->
      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
      </svg>
    </button>
  </div>
  <div class="hidden lg:flex space-x-10">
    <a href="/registrieren" class="text-base font-medium text-white hover:text-gray-300">
      Registrieren
    </a>
    <a href="/anmelden" class="text-base font-medium text-white hover:text-gray-300">
      Anmelden
    </a>
    <a href="/beispiel-url" class="text-base font-medium text-white hover:text-gray-300">
      Beispiel-URL
    </a>
  </div>
</div>
<!-- Hier kommt das Menü für kleinere Bildschirme -->
<div class="hidden" id="mobileMenu">
  <div class="px-2 pt-2 pb-3 space-y-1">
    <a href="/registrieren" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-gray-300 hover:bg-gray-700">Registrieren</a>
    <a href="/anmelden" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-gray-300 hover:bg-gray-700">Anmelden</a>
    <a href="/beispiel-url" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-gray-300 hover:bg-gray-700">Beispiel-URL</a>
  </div>
</div>




        <main class="flex-1">
            {{ content }}
        </main>


        <footer class="bg-white dark:bg-gray-900">
            <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
                <div class="md:flex md:justify-between">
                    <div class="mb-6 md:mb-0">
                        <a href="/" class="flex items-center">
                            <span class="ml-4 text-lg font-bold tracking-tighter text-transparent  tracking-relaxed lg:text-xl bg-clip-text bg-gradient-to-r from-white to-blue-200/20">
                                CPM<span class="font-light"> Framework</span>
                            </span>
                        </a>
                    </div>
                    <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Resources</h2>
                            <ul class="text-gray-500 dark:text-gray-400 font-medium">
                                <li>
                                    <a href="https://tailwindcss.com/" class="hover:underline">Tailwind CSS</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Follow us</h2>
                            <ul class="text-gray-500 dark:text-gray-400 font-medium">
                                <li class="mb-4">
                                    <a href="https://github.com/jpcodeplus" class="hover:underline ">Github</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                            <ul class="text-gray-500 dark:text-gray-400 font-medium">
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Privacy Policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                <div class="sm:flex sm:items-center sm:justify-between">
                    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© <?= date("Y"); ?> <a href="/" class="hover:underline"><?= $company["name"]; ?></a>. All Rights Reserved.
                    </span>
                    <div class="flex mt-4 sm:justify-center sm:mt-0">

                        <a href="/" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 16">
                                <path d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z" />
                            </svg>
                            <span class="sr-only">Discord community</span>
                        </a>

                        <a href="https://github.com/jpcodeplus" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">GitHub account</span>
                        </a>

                    </div>
                </div>
            </div>
        </footer>
    </div>

</body>

</html>