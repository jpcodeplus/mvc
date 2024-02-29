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
        <?php
        include __DIR__ . '/partials/header.php';
        echo '<main class="flex-1">{{ content }}</main>';
        include __DIR__ . '/partials/footer.php';
        ?>
    </div>
</body>

</html>