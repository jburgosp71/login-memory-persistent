<?php

namespace LoginMemoryPersistent\Domain\Repository;

use LoginMemoryPersistent\Domain\Entity\User;

interface UserSaveRepositoryInterface
{
    public function save(User $user);
}