<?php

namespace Flyff\Modules\Ranking\Services;

use Flyff\Modules\Character\Repositories\CharacterRepository;

class UserRankingService
{
    public function __construct(
        private readonly CharacterRepository $characterRepository,
    ){}


    public function getCharacters(int $paginate){
        return $this->characterRepository->getCharacters($paginate);
    }
}