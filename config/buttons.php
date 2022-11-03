<?php

return [
    'BUTTON_THREE' => env(
        'BUTTON_THREE',
        'http://www.omdbapi.com/?s=Matrix%20Revolutions&apikey=720c3666'
    ),
    'BUTTON_TWO' => env('BUTTON_TWO', 'http://www.omdbapi.com/?s=Matrix%20Reloaded&apikey=720c3666'),
    'BUTTON_ONE' => env('BUTTON_ONE', 'http://www.omdbapi.com/?s=Matrix&apikey=720c3666'),
];
