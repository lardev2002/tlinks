<?php


namespace App\Services;

use App\Dto\TlinkDataCreateDto;
use App\Models\TLink;
use App\Repositories\TLinkRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class TLinkService
 * @package App\Services
 */
class TLinkService
{
    /** @var TLinkRepository $linkRepository */
    protected $linkRepository;

    /**
     * TLinkService constructor.
     * @param TLinkRepository $linkRepository
     */
    public function __construct(TLinkRepository $linkRepository)
    {
        $this->linkRepository = $linkRepository;
    }

    /**
     * @param TlinkDataCreateDto $dto
     * @return string|null
     */
    public function generateTLink(TlinkDataCreateDto $dto)
    {
        $token = $this->generateRandomToken();

        $data = array_merge($dto->all(), ['token' => $token]);

        $createdModel = $this->createModel($data);

        if (!$createdModel) {
            return null;
        }

        return $this->createLink($token);
    }

    /**
     * @param string $link
     * @return mixed
     */
    public function link(string $token) : mixed
    {
        $linkBase = $this->linkRepository->getForShow($token);

        if (!$linkBase || !$this->validateLink($linkBase)) {
            return false;
        }

        $this->incrementTransitionCount($linkBase);

        return $linkBase->link;
    }

    /**
     * @return string
     */
    protected function generateRandomToken()
    {
        return Str::random(config('tlink.token_length'));
    }

    /**
     * @param string $name
     * @return string
     */
    protected function createLink(string $token) : string
    {
        return route(config('tlink.route_name'), ['token' => $token]);
    }

    /**
     * @param TLink $link
     * @return bool
     */
    protected function validateLink(TLink $link) : bool
    {
        $finishedTime = Carbon::parse($link->created_at)->addMinutes($link->lifetime);

        $currentTransition = $link->transitions + 1;

        if (
            ($link->transition_limit != 0 && $currentTransition > $link->transition_limit) ||
            Carbon::now() > $finishedTime
        ) {
            $this->markAsNotActive($link);
            return false;
        }

        return true;
    }

    /**
     * @param TLink $linkBase
     * @return bool
     */
    protected function markAsNotActive(Tlink $linkBase) : bool
    {
        $linkBase->is_active = TLink::LINK_NOT_ACTIVE_STATE;
        return $linkBase->save();
    }

    /**
     * @param TLink $link
     * @return bool
     */
    protected function incrementTransitionCount(TLink $link) : bool
    {
        $link->transitions++;
        return $link->save();
    }

    /**
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    protected function createModel(array $data) : Model
    {
        return TLink::query()->create($data);
    }
}
