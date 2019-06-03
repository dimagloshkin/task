<?php
return array(
    'sort/(name)/([0-9]+)'=>'main/index/$1/$2',
    'sort/(mail)/([0-9]+)'=>'main/index/$1/$2',
    'sort/(status)/([0-9]+)'=>'main/index/$1/$2',
    'admin' => 'main/authorization',
    'edit/([0-9]+)' => 'edit/edit/$1',
    '' => 'main/index/name/1'
);