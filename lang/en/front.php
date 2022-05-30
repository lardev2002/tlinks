<?php

return [
    'footer_text' => 'Cover template for Bootstrap',
    'btn_create' => 'Create',
    'btn_click_to' => 'Click to',
    'tlink_title' => 'Temporary links',
    'tlink_slogan' => 'Here you can register a temporary link to another Internet resource',
    'tlink_link_generated' => 'Your temporary link:',
    'tlink_field_link' => 'Link required* (Example: https://google.com)',
    'tlink_field_link_placeholder' => 'Enter link address. Example: https://google.com',
    'tlink_field_link_help' => 'Enter your link address',
    'tlink_field_limit' => 'Transition limit (0 = unlimited)',
    'tlink_field_limit_placeholder' => 'Enter the number of hits for the link',
    'tlink_field_limit_help' => 'Enter transition limit for link',
//    'tlink_field_lifetime_1' => 'Lifetime required* (minutes | max:',
//    'tlink_field_lifetime_2' => 'minutes =',
//    'tlink_field_lifetime_3' => 'hours)',
    'tlink_field_lifetime' => 'Lifetime required* (minutes | max:'
        .config('tlink.lifetime.max').' minutes ='
        .convert_time_to_hours("config('tlink.lifetime.max'").' hours)',
    'tlink_field_lifetime_placeholder' => 'Enter link lifetime',
    'tlink_field_lifetime_help' => 'Enter lifetime for link',
    'btn_create_link' => 'Create link'
];
