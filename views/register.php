<?php

function textInput($label = 'Dein Name', $id = 'input1', $placeholder = 'Max Muster')
{

  $classLabel = 'block mb-2 text-sm font-medium text-gray-900 dark:text-white';
  $classInput = 'bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';
  return '
  <div>
    <label for="' . $id . '" class="' . $classLabel . '">' . $label . '</label>
    <input type="text" name="' . $id . '" id="' . $id . '" class="' . $classInput . '" placeholder="' . $placeholder . '">
  </div>';
}
?>


<section class="flex flex-col items-center pt-6">
  <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
      <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">Account erstellen
      </h1>
      <form class="space-y-4 md:space-y-6" method="POST">
        <?php
        
        echo textInput('Vorname','firstname', 'Max');
        echo textInput('Nachname','lastname', 'Musterman');
        echo textInput('E-Mail','email', 'max@mustermann');
        echo textInput('Passwort','password' , '••••••••');
        echo textInput('Passwort wiederholen','passwordConfirm', '••••••••');

        ?>
        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Account erstellen</button>
        <p class="text-sm font-light text-gray-500 dark:text-gray-400">Schon regestriert? <a class="font-medium text-blue-600 hover:underline dark:text-blue-500" href="/signin">Hier Anmelden</a>
        </p>
      </form>
    </div>
  </div>
</section>