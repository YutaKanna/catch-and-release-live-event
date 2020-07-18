<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserType extends Enum
{
    const User = 1;
    const Musician = 10;
    // ライブハウスとかも入るのかな
    const Admin = 100;
}
