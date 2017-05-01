<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CharacterGeneratorController extends Controller
{
    public function generate()
    {
        /*
            * Determine Base Ability Scores
        */

        // Create a d6 die.
        $d6 = config('dice.d6');

        // Determine base Strength score.
        $rolledStr = [
            $d6[array_rand($d6)],
            $d6[array_rand($d6)],
            $d6[array_rand($d6)],
            $d6[array_rand($d6)],
        ];

        $strScore = array_sum($rolledStr) - min($rolledStr);

        // Determine base Dexterity score.
        $rolledDex = [
            $d6[array_rand($d6)],
            $d6[array_rand($d6)],
            $d6[array_rand($d6)],
            $d6[array_rand($d6)],
        ];

        $dexScore = array_sum($rolledDex) - min($rolledDex);

        // Determine base Constitution score.
        $rolledCon = [
            $d6[array_rand($d6)],
            $d6[array_rand($d6)],
            $d6[array_rand($d6)],
            $d6[array_rand($d6)],
        ];

        $conScore = array_sum($rolledCon) - min($rolledCon);

        // Determine base Inteligence score.
        $rolledInt = [
            $d6[array_rand($d6)],
            $d6[array_rand($d6)],
            $d6[array_rand($d6)],
            $d6[array_rand($d6)],
        ];

        $intScore = array_sum($rolledInt) - min($rolledInt);

        // Determine base Wisdom score.
        $rolledWis = [
            $d6[array_rand($d6)],
            $d6[array_rand($d6)],
            $d6[array_rand($d6)],
            $d6[array_rand($d6)],
        ];

        $wisScore = array_sum($rolledWis) - min($rolledWis);

        // Determine base Charisma score:
        $rolledCha = [
            $d6[array_rand($d6)],
            $d6[array_rand($d6)],
            $d6[array_rand($d6)],
            $d6[array_rand($d6)],
        ];

        $chaScore = array_sum($rolledCha) - min($rolledCha);

        // Create Ability Scores array:
        $abilityScores = [
            'Strength' => $strScore,
            'Dexterity' => $dexScore,
            'Constitution' => $conScore,
            'Inteligence' => $intScore,
            'Wisdom' => $wisScore,
            'Charisma' => $chaScore,
        ];

        /*
            * Determine Racial Features & Traits
        */

        // Determine Gender:
        $rolledGender = rand(1, 2);

        switch ($rolledGender) {
            case 1:
                $rolledGender = 'Male';
                break;
            case 2:
                $rolledGender = 'Female';
                break;
        }

        // Create Races array:
        $races = [
            'Dwarf',
            'Elf',
            'Halfling',
            'Human',
            'Dragonborn',
            'Gnome',
            'Half-Elf',
            'Half-Orc',
            'Tiefling',
        ];

        // Determine Race:
        $rolledRace = $races[array_rand($races)];

        // Create Subraces array:
        $subraces = [
            'Dwarf' => [
                'Hill Dwarf',
                'Mountain Dwarf',
            ],
            'Elf' => [
                'High Elf',
                'Wood Elf',
                'Dark Elf',
            ],
            'Halfling' => [
                'Lightfoot Halfling',
                'Stout Halfling',
            ],
            'Human' => [
                'Calishite',
                'Chondathan',
                'Damaran',
                'Illuskan',
                'Mulan',
                'Rashemi',
                'Shou',
                'Tethyrian',
                'Turami',
            ],
            'Dragonborn' => [
                'Black',
                'Blue',
                'Brass',
                'Bronze',
                'Copper',
                'Gold',
                'Green',
                'Red',
                'Silver',
                'White',
            ],
            'Gnome' => [
                'Forest Gnome',
                'Rock Gnome',
            ],
            'Half-Elf' => [
                'N/A'
            ],
            'Half-Orc' => [
                'N/A'
            ],
            'Tiefling' => [
                'N/A'
            ],
        ];

        // Determine Subrace:
        $rolledSubrace = $subraces[$rolledRace][array_rand($subraces[$rolledRace])];

        // Determine Racial Ability Score bonuses:
        switch ($rolledRace) {
            case 'Dwarf':
                $conScore = $conScore + 2;
                break;

            case 'Elf':
                $dexScore = $dexScore + 2;
                break;

            case 'Halfling':
                $dexScore = $dexScore + 2;
                break;

            case 'Human':
                $strScore = $strScore + 1;
                $dexScore = $dexScore + 1;
                $conScore = $conScore + 1;
                $intScore = $intScore + 1;
                $wisScore = $wisScore + 1;
                $chaScore = $chaScore + 1;
                break;

            case 'Dragonborn':
                $strScore = $strScore + 2;
                $wisScore = $wisScore + 2;
                break;

            case 'Gnome':
                $intScore = $intScore + 2;
                break;

            case 'Half-Elf':
                $chaScore = $chaScore + 2;
                $abilityScores[array_rand($abilityScores)]++;
                break;

            case 'Half-Orc':
                $strScore = $strScore + 2;
                $conScore = $conScore + 1;
                break;

            case 'Tiefling':
                $intScore = $intScore + 1;
                $chaScore = $chaScore + 2;
                break;
        }

        // Determine Subracial Ability Score bonuses:
        switch ($rolledSubrace) {
            case 'Hill Dwarf':
                $wisScore = $wisScore + 1;
                break;

            case 'Mountain Dwarf':
                $strScore = $strScore + 2;
                break;

            case 'High Elf':
                $intScore = $intScore + 1;
                break;

            case 'Wood Elf':
                $wisScore = $wisScore + 1;
                break;

            case 'Dark Elf':
                $chaScore = $chaScore + 1;
                break;

            case 'Lightfoot Halfling':
                $chaScore = $chaScore +1;
                break;

            case 'Stout Halfling':
                $conScore = $conScore +1;
                break;

            case 'Forest Gnome':
                $dexScore = $dexScore + 1;
                break;

            case 'Rock Gnome':
                $conScore = $conScore + 1;
                break;
        }

        // Determine Age:
        switch ($rolledRace) {
            case 'Dwarf':
                $rolledAge = rand(50, 350);
                break;

            case 'Elf':
                $rolledAge = rand(100, 750);
                break;

            case 'Halfling':
                $rolledAge = rand(20, 150);
                break;

            case 'Human':
                $rolledAge = rand(18, 100);
                break;

            case 'Dragonborn':
                $rolledAge = rand(15, 80);
                break;

            case 'Gnome':
                $rolledAge = rand(18, 500);
                break;

            case 'Half-Elf':
                $rolledAge = rand(20, 180);
                break;

            case 'Half-Orc':
                $rolledAge = rand(14, 75);
                break;

            case 'Tiefling':
                $rolledAge = rand(18, 125);
                break;
        }

        // Create Alignments array:
        $alignments = [
            'Lawful Good',
            'Neutral Good',
            'Chaotic Good',
            'Lawful Neutral',
            'Neutral',
            'Chaotic Neutral',
            'Lawful Evil',
            'Neutral Evil',
            'Chaotic Evil',
        ];

        // Determine Alignment:
        $rolledAlignment = $alignments[array_rand($alignments)];

        // Determine Size:
        switch ($rolledRace) {
            case 'Dwarf':
            case 'Elf':
            case 'Human':
            case 'Dragonborn':
            case 'Half-Elf':
            case 'Half-Orc':
            case 'Tiefling':
                $rolledSize = 'Medium';
                break;
            case 'Halfling':
            case 'Gnome':
                $rolledSize = 'Small';
                break;
        }

        // Determine Height:
        switch ($rolledRace) {
            case 'Dwarf':
                $rolledHeight = rand(42, 66);
                $feet = floor($rolledHeight/12);
                $inches = ($rolledHeight%12);
                break;
            case 'Elf':
                $rolledHeight = rand(54, 78);
                $feet = floor($rolledHeight/12);
                $inches = ($rolledHeight%12);
                break;
            case 'Halfling':
            case 'Gnome':
                $rolledHeight = rand(36, 48);
                $feet = floor($rolledHeight/12);
                $inches = ($rolledHeight%12);
                break;
            case 'Dragonborn':
                $rolledHeight = rand(72, 96);
                $feet = floor($rolledHeight/12);
                $inches = ($rolledHeight%12);
                break;
            case 'Half-Elf':
            case 'Human':
            case 'Tiefling':
                $rolledHeight = rand(60, 78);
                $feet = floor($rolledHeight/12);
                $inches = ($rolledHeight%12);
                break;
            case 'Half-Orc':
                $rolledHeight = rand(60, 90);
                $feet = floor($rolledHeight/12);
                $inches = ($rolledHeight%12);
                break;
        }

        // Roll Weight:
        switch ($rolledRace) {
            case 'Dwarf':
                $rolledWeight = rand(100, 200);
                break;
            case 'Elf':
                $rolledWeight = rand(125, 175);
                break;
            case 'Human':
            case 'Half-Elf':
            case 'Tiefling':
                $rolledWeight = rand(150, 250);
                break;
            case 'Dragonborn':
                $rolledWeight = rand(200, 325);
                break;
            case 'Halfling':
            case 'Gnome':
                $rolledWeight = rand(30, 50);
                break;
            case 'Half-Orc':
                $rolledWeight = rand(100, 200);
                break;
        }

        // Determine Speed
        switch ($rolledRace) {
            case 'Dwarf':
            case 'Halfling':
            case 'Gnome':
                $rolledSpeed = 25;
                break;
            case 'Elf':
            case 'Human':
            case 'Dragonborn':
            case 'Half-Elf':
            case 'Half-Orc':
            case 'Tiefling':
                $rolledSpeed = 30;
                break;
        }

        // Adjust Subracial Speeds:
        switch ($rolledSubrace) {
            case 'Wood Elf':
                $rolledSpeed = 35;
                break;
        }

        // Create Languages Array:
        $languages = [
        'Common',
        'Dwarvish',
        'Elvish',
        'Giant',
        'Gnomish',
        'Goblin',
        'Halfling',
        'Orc',
        'Abyssal',
        'Celestial',
        'Draconic',
        'Deep Speech',
        'Infernal',
        'Primordial',
        'Sylvan',
        'Undercommon',
        ];

        // Determine Known Languages:

        // Determine Racial Traits:
        switch ($rolledRace) {
            case 'Dwarf':
                $racialTraits[] = 'Darkvision [PHB pg.20]';
                $racialTraits[] = 'Dwarven Resilience [PHB pg.20]';
                $racialTraits[] = 'Dwarven Combat Training [PHB pg.20]';
                $racialTraits[] = 'Tool Proficiency [PHB pg.20]';
                $racialTraits[] = 'Stonecunning [PHB pg.20]';
                break;
            case 'Elf':
                $racialTraits[] = 'Darkvision [PHB pg.23]';
                $racialTraits[] = 'Keen Senses [PHB pg.23]';
                $racialTraits[] = 'Fey Ancestry [PHB pg.23]';
                $racialTraits[] = 'Trance [PHB pg.23]';
                break;
            case 'Halfling':
                $racialTraits[] = 'Lucky [PHB pg.28]';
                $racialTraits[] = 'Brave [PHB pg.28]';
                $racialTraits[] = 'Halfling Nimbleness [PHB pg.28]';
                break;
            case 'Dragonborn':
                $racialTraits[] = 'Draconic Ancestry [PHB pg.34]';
                $racialTraits[] = 'Damage Resistance [PHB pg.34]';
                break;
            case 'Gnome':
                $racialTraits[] = 'Darkvision [PHB pg.37]';
                $racialTraits[] = 'Gnome Cunning [PHB pg.37]';
                break;
            case 'Half-Elf':
                $racialTraits[] = 'Darkvision [PHB pg.39]';
                $racialTraits[] = 'Fey Ancestry [PHB pg.39]';
                $racialTraits[] = 'Skill Versatility [PHB pg.39]';
                break;
            case 'Half-Orc':
                $racialTraits[] = 'Darkvision [PHB pg.41]';
                $racialTraits[] = 'Menacing [PHB pg.41]';
                $racialTraits[] = 'Relentless Endurance [PHB pg.41]';
                $racialTraits[] = 'Savage Attacks [PHB pg.41]';
                break;
            case 'Tiefling':
                $racialTraits[] = 'Darkvision [PHB pg.43]';
                $racialTraits[] = 'Hellish Resistance [PHB pg.43]';
                $racialTraits[] = 'Infernal Legacy [PHB pg.43]';
                break;
            default:
                $racialTraits[] = null;
                break;
            // $racialTraits[] = '';
        }

        // Determine Subracial Traits:
        switch ($rolledSubrace) {
            case 'Hill Dwarf':
                $subracialTraits[] = 'Dwarven Toughness [PHB pg.20]';
                break;
            case 'Mountain Dwarf':
                $subracialTraits[] = 'Dwarven Armor Training [PHB pg.20]';
                break;
            case 'High Elf':
                $subracialTraits[] = 'Elf Weapon Training [PHB pg.23]';
                $subracialTraits[] = 'Cantrip [PHB pg.24]';
                $subracialTraits[] = 'Extra Language [PHB pg.24]';
                break;
            case 'Wood Elf':
                $subracialTraits[] = 'Elf Weapon Training [PHB pg.24]';
                $subracialTraits[] = 'Fleet of Foot [PHB pg.24]';
                $subracialTraits[] = 'Mask of the Wild [PHB pg.24]';
                break;
            case 'Dark Elf':
                $subracialTraits[] = 'Superior Darkvision [PHB pg.24]';
                $subracialTraits[] = 'Sinlight Sensitivity [PHB pg.24]';
                $subracialTraits[] = 'Drow Magic [PHB pg.24]';
                $subracialTraits[] = 'Drow Weapon Training [PHB pg.24]';
                break;
            case 'Lightfoot Halfling':
                $subracialTraits[] = 'Naturally Stealthy [PHB pg.28]';
                break;
            case 'Stout Halfling':
                $subracialTraits[] = 'Stout Resilience [PHB pg.28]';
                break;
            case 'Forest Gnome':
                $subracialTraits[] = 'Natural Illusionist [PHB pg.37]';
                $subracialTraits[] = 'Speak with Small Beasts [PHB pg.37]';
                break;
            case 'Rock Gnome':
                $subracialTraits[] = 'Artificer\'s Lore [PHB pg.37]';
                $subracialTraits[] = 'Tinker [PHB pg.37]';
                break;
            default:
                $subracialTraits[] = null;
                break;
            // $subracialTraits[] = '';
        }

        /*
            * Determine Class
        */

        // Create Classes array:
        $classes = [
            'Barbarian',
            'Bard',
            'Cleric',
            'Druid',
            'Fighter',
            'Monk',
            'Paladin',
            'Ranger',
            'Rogue',
            'Sorcerer',
            'Warlock',
            'Wizard',
        ];

        // Determine Class:
        $rolledClass = $classes[array_rand($classes)];

        // Determine Class HP:
        switch ($rolledClass) {
            case 'Barbarian':
                $classHitPoints = '12';
                break;
            case 'Bard':
                $classHitPoints = '8';
                break;
            case 'Cleric':
                $classHitPoints = '8';
                break;
            case 'Druid':
                $classHitPoints = '8';
                break;
            case 'Fighter':
                $classHitPoints = '10';
                break;
            case 'Monk':
                $classHitPoints = '8';
                break;
            case 'Paladin':
                $classHitPoints = '10';
                break;
            case 'Ranger':
                $classHitPoints = '10';
                break;
            case 'Rogue':
                $classHitPoints = '8';
                break;
            case 'Sorcerer':
                $classHitPoints = '6';
                break;
            case 'Warlock':
                $classHitPoints = '8';
                break;
            case 'Wizard':
                $classHitPoints = '6';
                break;
            default:
                $classHitPoints = null;
                break;
        };

        // Determine Starting Hit Points:
        switch ($rolledClass) {
            case 'Barbarian':
                $startingHitPoints = $classHitPoints + 100;
                break;
            default:
                $startingHitPoints = $classHitPoints;
                break;
        };

        // Determine Class Proficiencies:
        switch ($rolledClass) {
            case 'Barbarian':
                $classProficiences[] = '';
                break;
            default:
                $classProficiencies[] = null;
            };

        // Determine Class Ability Score Bonuses:


        // Determine Class Traits:


        // Determine Class Abilities:
        switch ($rolledClass) {
            case 'Barbarian':
                $classAbilities[] = 'Rage [PHB pg.48]';
                break;
            default:
                $classAbilities[] = null;
                break;
        };

        /*
            * Determine Background & Personality
        */

        // Create Backgrounds Array:
        $backgrounds = [
            'Acolyte',
            'Charlatan',
            'Criminal',
            'Entertainer',
            'Folk Hero',
            'Guild Artisan',
            'Hermit',
            'Noble',
            'Outlander',
            'Sage',
            'Soldier',
            'Urchin',
        ];

        // Determine Background:
        $rolledBackground = $backgrounds[array_rand($backgrounds)];

        /*
            * Random Arrays
        */

        // Artisans Tools Array:
        $artisansTools = config('tools.artisans');
        $dwarvenToolProficiency = config('tools.dwarven-tool-proficiency');

        /*
            * Import Variables Into View
        */

        return view('5e-character-generator', [
                'rolledRace' => $rolledRace,
                'rolledSubrace' => $rolledSubrace,
                'rolledGender' => $rolledGender,
                'rolledAge' => $rolledAge,
                'feet' => $feet,
                'inches' => $inches,
                'rolledWeight' => $rolledWeight,
                'rolledAlignment' => $rolledAlignment,
                'rolledSize' => $rolledSize,
                'rolledSpeed' => $rolledSpeed,
                'racialTraits' => $racialTraits,
                'subracialTraits' => $subracialTraits,
                'rolledClass' => $rolledClass,
                'abilityScores' => $abilityScores,
                'startingHitPoints' => $startingHitPoints,
                'classAbilities' => $classAbilities,
                'rolledBackground' => $rolledBackground,
            ]);
    }
}
