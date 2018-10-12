<?php
include __DIR__.'/vendor/autoload.php';
use Discord\Discord;
use Discord\Voice\VoiceClient;
use Discord\Parts\Channel\Channel;
use Discord\Parts\User\Game;
use Discord\Parts\Embed;
use Discord\Factory\Factory;
$token='NTAwMzA0OTk0MzQ4NTY0NTI3.DqI5fw.jQCna6MqB7qfkfvA5ESqKJXxnhk';
$bot_id='500304994348564527';

$discord = new Discord([
    'token' => $token,
]);

$discord->on('ready', function ($discord) {
    $game = $discord->factory(Game::class, ['name' => 'faire le tuto !',]);
    $discord->updatePresence($game);
    $discord->on('message', function ($message, $discord) {
        echo "message received from: ".$message->author->username.$message->author->id.' msg id:'.$message->id.' msg:'.$message->content . ' channel id:' . $message->channel_id, PHP_EOL;

        $tab_bonjour = array("Bonjour", "Hello", "Salut");
        $randombonjour=rand(0,count($tab_bonjour)-1);
        if($message->author->id != $bot_id && strstr($message->content, 'onjour')) // message pas du bot + contient le mot "bonjour"
        {
            $reponse=$tab_bonjour[$randombonjour]; // on crée la réponse
            $message->channel->sendMessage($reponse); //on l'envoie dans le même channel
        }
    });
});
$discord->run();