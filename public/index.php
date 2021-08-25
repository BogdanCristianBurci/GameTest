<?php

require_once '../vendor/autoload.php';

use App\Models\Characters\CharacterFactory;
use App\Models\Skills\RapidStrike;
use App\Models\Skills\MagicShield;
use App\Models\Game\Game;

$hero = CharacterFactory::getCharacter('hero');
$beast = CharacterFactory::getCharacter('beast');

$hero->addSkill(new RapidStrike(10));
$hero->addSkill(new MagicShield(20));

$game = new Game($hero,$beast);

//$game->startGame();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game</title>

    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <section class="game"> 
        <h1 class="text__center">Start Game</h1>

        <div class="game__oponents">
            <div>
                <?= $hero ?>
            </div>
            <div>
                <h2>VS</h2>
            </div>
            <div>
                <?= $beast ?>
            </div>
        </div>

        <?php 

            $turn = 1;
            while($game->bothPlayersAreAlive()){
        ?>
                <div class="text__center">
                    <h2>Round <?= $turn ?></h2>
                </div>
                <div class="text__center">               
                    <?php
                            
                            $damage = $game->getAttacker()->attackPower($game->getDefender()); 
                            echo '<p>'.$game->getAttacker()->getName().' attack with '.$damage.' power</p>';

                            echo '<p>'.$game->getDefender()->takeDamage($damage).'</p>';

                            echo '<p>'.$game->getDefender()->getName().' has '.$game->getDefender()->getHealth(). ' health left';
                            $turn ++;
                            if($turn > $game->rounds){
                                break;
                            }

                            $game->switchPlayers();
                    ?>
                </div>
            <?php
                }
            ?>

            <h2 class="text__center">The winner is <?= $game->getWinner()->getName()?></h2>
    </section>
</body>
</html>





