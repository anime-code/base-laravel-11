<?php declare(strict_types=1);

namespace App\Enums;

use App\Traits\EnumFromName;

enum RoleType: int
{
    use EnumFromName;

    case CONSOLE = 0;
    case CLIENT = 1;


}
