<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class NotificationType extends Enum
{
    const SMS = 'SMS';
    const Email = 'E-Mail';
    const Push = 'Push Notification';
}
