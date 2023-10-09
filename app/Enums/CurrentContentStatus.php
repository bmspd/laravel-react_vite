<?php
namespace App\Enums;

enum CurrentContentStatus:string {
    case RELEASED = 'released';
    case STOPPED = 'stopped';
    case ONGOING = 'ongoing';
    case ANNOUNCED = 'announced';
}
