<?php

$show_complete_tasks = rand(0, 1);

$projects = [
    'Входящие',
    'Учеба',
    'Работа',
    'Домашние дела',
    'Авто'
];

$tasks = [
    [
        'name' => 'Собеседование в IT компании',
        'date' => '01.12.2019',
        'project' => 'Работа',
        'ready' => false
    ],
    [
        'name' => 'Выполнить тестовое задание',
        'date' => '25.12.2019',
        'project' => 'Работа',
        'ready' => false
    ],
    [
        'name' => 'Сделать задание первого раздела',
        'date' => '21.12.2019',
        'project' => 'Учеба',
        'ready' => true
    ],
    [
        'name' => 'Встреча с другом',
        'date' => '22.12.2019',
        'project' => 'Входящие',
        'ready' => false
    ],
    [
        'name' => 'Купить корм для кота',
        'date' => 'null',
        'project' => 'Домашние дела',
        'ready' => false
    ],
    [
        'name' => 'Заказать пиццу',
        'date' => 'null',
        'project' => 'Домашние дела',
        'ready' => false
    ]
];
