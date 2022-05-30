<?php


namespace App\Repositories;

use App\Models\TLink;
use App\Models\TLink as Model;

/**
 * Class TLinkRepository
 * @package App\Repositories
 */
class TLinkRepository extends BaseRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @param string $token
     * @return mixed
     */
    public function getForShow(string $token)
    {
        return TLink::active()->where('token', $token)->first();
    }
}
