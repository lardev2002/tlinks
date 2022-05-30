<?php


namespace App\Dto;


use Spatie\DataTransferObject\DataTransferObject;

class TlinkDataCreateDto extends DataTransferObject
{
    public string $link;

    public int $transition_limit = 0;

    public int $lifetime;
}
