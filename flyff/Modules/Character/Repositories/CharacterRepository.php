<?php

namespace Flyff\Modules\Character\Repositories;

use Flyff\Core\Database\Repository\BaseRepository;
use Flyff\Modules\Character\Models\Character;

class CharacterRepository extends BaseRepository
{
    public function getCharacters(int $paginate)
    {
        return Character::IsUser()->orderByLevel()->orderByPlayTime()->unblocked()->active()->paginate($paginate);
    }
}