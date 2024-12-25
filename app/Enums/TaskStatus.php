<?php

namespace App\Enums;

enum TaskStatus: string
{
    case ToDo = 'to_do';
    case Doing = 'doing';
    case Done = 'done';
}
