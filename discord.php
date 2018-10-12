<?php

include __DIR__.'/vendor/autoload.php';

$discord = new \Discord\Discord([
    'token' => 'NTAwMzA0OTk0MzQ4NTY0NTI3.DqJAxA.VSorQuPbhnfdJn5tz5eIrra6i_0',
]);

$discord->on('ready', function ($discord) {
    echo "Bot is ready.", PHP_EOL;

    // Listen for events here
    $discord->on('message', function ($message) {
        echo "Recieved a message from {$message->author->username}: {$message->content}", PHP_EOL;
    });
});

$discord->run();