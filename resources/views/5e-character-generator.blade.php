@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="roll-again-row col-xs-6 col-xs-offset-3">
            <button type="button" class="btn btn-primary" onClick="history.go(0)">Roll Again!</button>
        </div> <!-- .roll-again-row .col-xs-6 .col-xs-offset-3 -->
    </div> <!-- .row -->

    <style>
    .roll-again-row {
        text-align: center;
        padding: 20px;
    }
    </style>

    <div class="row">
        <div class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Race</h3>
                </div>
                <div class="panel-body">

                    <!-- Rolled Race -->
                    <p><strong>Race</strong>: <?php echo $rolledRace; ?></p>

                    <!-- Rolled Subrace -->
                    @if ($rolledSubrace != 'N/A')
                    <p><strong>{{ $rolledRace == 'Human' ? 'Ethnicity' : 'Subrace' }}</strong>: <?php echo $rolledSubrace; ?></p>
                    @endif

                    <!-- Rolled Gender -->
                    <p><strong>Gender</strong>: <?php echo $rolledGender; ?></p>

                    <!-- Rolled Age -->
                    <p><strong>Age</strong>: <?php echo $rolledAge; ?> Years Old</p>

                    <!-- Rolled Alignment -->
                    <p><strong>Alignment</strong>: <?php echo $rolledAlignment; ?></p>

                    <!-- Rolled Size -->
                    <p><strong>Size</strong>: <?php echo $rolledSize; ?></p>

                    <!-- Rolled Height -->
                    <p><strong>Height</strong>: <?php echo $feet; ?>' <?php echo $inches; ?>"</p>

                    <!-- Rolled Weight -->
                    <p><strong>Weight</strong>: <?php echo $rolledWeight; ?> Pounds</p>

                    <!-- Rolled Speed -->
                    <p><strong>Speed</strong>: <?php echo $rolledSpeed; ?> Feet</p>

                    <!-- Rolled Languages -->
                    <p><strong>Languages</strong>: This feature is coming soon!</p>

                    <!-- Rolled Racial Traits -->
                    <p><strong>Racial Traits</strong>:
                        <ul>
                            @foreach($racialTraits as $racialTrait)
                                <li>{{ $racialTrait }}</li>
                            @endforeach
                        </ul>
                    </p>

                    <!-- Rolled Subracial Traits -->
                    <p><strong>Subracial Traits</strong>:
                        <ul>
                            @foreach($subracialTraits as $subracialTrait)
                                <li>{{ $subracialTrait }}</li>
                            @endforeach
                        </ul>
                    </p>

                </div> <!-- .panel-body -->
            </div> <!-- .panel .panel-default -->
            </div> <!-- .col-xs-4 -->

            <div class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Class</h3>
                </div>
                <div class="panel-body">

                    <!-- Rolled Class -->
                    <p><strong>Class</strong>: <?php echo $rolledClass; ?></p>

                    <!-- Rolled Ability Scores -->
                    <p><strong>Ability Scores</strong>:</p>
                        <ul>
                            <?php foreach($abilityScores as $key => $abilityScore) { echo("<li><strong>".$key."</strong>: ".$abilityScore."</li>"); } ?>
                        </ul>

                    <!-- Hit Points -->
                    <p><strong>Hit Points</strong>: {{ $startingHitPoints }} + CON Modifier</p>

                    <!-- Saving Throws -->
                    <p><strong>Saving Throws</strong>:</p>

                    <!-- Class Abilities -->
                    <p><strong>Class Abilities</strong>:
                        <ul>
                            @foreach($classAbilities as $classAbility)
                                <li>{{ $classAbility }}</li>
                            @endforeach
                        </ul>
                    </p>

                </div> <!-- .panel-body -->
            </div> <!-- .panel .panel-default -->
            </div> <!-- .col-xs-4 -->

            <div class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Background &amp; Personality</h3>
                </div>
                <div class="panel-body">

                    <!-- Rolled Background -->
                    <p><strong>Background</strong>: <?php echo $rolledBackground; ?></p>

                </div> <!-- .panel-body -->
            </div> <!-- .panel .panel-default -->
            </div> <!-- .col-xs-4 -->

    </div> <!-- .row -->

    <div class="row">

        <div class="col-xs-4">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Proficiencies</h3>
                </div>
                <div class="panel-body">

                    <!-- Weapons -->
                    <p><strong>Weapon Proficiencies</strong>: This feature is coming soon!</p>

                    <!-- Armors -->
                    <p><strong>Armor Proficiencies</strong>: This feature is coming soon!</p>

                    <!-- Tools -->
                    <p><strong>Tool Proficiencies</strong>: This feature is coming soon!</p>

                </div> <!-- .panel-body -->
            </div> <!-- .panel .panel-default -->

        </div> <!-- .col-xs-4 -->

        <div class="col-xs-4">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Spells</h3>
                </div>
                <div class="panel-body">

                    <!-- Known Cantrips -->
                    <p><strong>Cantrips</strong>: This feature is coming soon!</p>

                    <!-- Known Level 1 Spells -->
                    <p><strong>Level 1</strong>: This feature is coming soon!</p>

                </div> <!-- .panel-body -->
            </div> <!-- .panel .panel-default -->

        </div> <!-- .col-xs-4 -->

        <div class="col-xs-4">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Equipment</h3>
                </div>
                <div class="panel-body">

                    <!-- Weapons -->
                    <p><strong>Weapons</strong>: This feature is coming soon!</p>

                    <!-- Armor -->
                    <p><strong>Armor</strong>: This feature is coming soon!</p>

                    <!-- Tools -->
                    <p><strong>Tools</strong>: This feature is coming soon!</p>

                    <!-- Trinkets -->
                    <p><strong>Trinkets</strong>: This feature is coming soon!</p>

                    <!-- Misc. -->
                    <p><strong>Miscsellaneous</strong>: This feature is coming soon!</p>

                </div> <!-- .panel-body -->
            </div> <!-- .panel .panel-default -->

        </div> <!-- .col-xs-4 -->

    </div> <!-- .row -->

@endsection