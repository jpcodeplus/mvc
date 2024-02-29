<?php
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

<header class="sticky top-0 z-50 bg-white dark:bg-gray-900 shadow">
    <div class="mx-auto w-full max-w-screen-xl p-4">
        <nav class="bg-gray-900 text-white">
            <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="/">
                                <span class="text-lg font-bold tracking-tighter text-transparent tracking-relaxed lg:text-xl bg-clip-text bg-gradient-to-r from-white to-blue-200/20">
                                    CPM<span class="font-light"> Framework</span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="-mr-2 flex lg:hidden">
                        <!-- Mobile menu button -->
                        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700" id="menuButton">
                            <span class="sr-only">Menü öffnen</span>
                            <!-- Burger-Icon -->
                            <svg class="block h-6 w-6" id="menuOpenIcon" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                            </svg>
                            <!-- Kreuz-Icon -->
                            <svg class="hidden h-6 w-6" id="menuCloseIcon" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>

                    </div>
                    <!-- Flex Container for Links -->
                    <div class="hidden lg:flex flex-grow items-center justify-end lg:space-x-4">
                        <?php
                        foreach ($mainMenu as $key => $link) {
                            echo '
                            <a href="' . $link[0] . '" class="text-sm font-normal text-white hover:underline">' . $link[1] . '</a>';
                        }
                        ?>

                    </div>
                </div>
            </div>

            <!-- Mobile menu, ensure JavaScript to toggle is applied -->
            <div class="hidden" id="mobileMenu">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <!-- Repeating Links for Mobile -->
                    <?php
                    foreach ($mainMenu as $key => $link) {
                        echo '
                            <a href="' . $link[0] . '" class="block px-3 py-2 rounded-md text-base text-white hover:bg-gray-700">' . $link[1] . '</a>';
                    }
                    ?>
                </div>
            </div>
        </nav>
    </div>
</header>


<script defer>
    document.getElementById('menuButton').addEventListener('click', () => {
        const menu = document.getElementById('mobileMenu');
        const isMenuHidden = menu.classList.toggle('hidden');

        document.getElementById('menuOpenIcon').classList.toggle('hidden', !isMenuHidden);
        document.getElementById('menuCloseIcon').classList.toggle('hidden', isMenuHidden);
    });
</script>