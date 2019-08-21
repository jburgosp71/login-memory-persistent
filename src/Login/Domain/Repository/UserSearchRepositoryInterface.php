<?php

namespace LoginMemoryPersistent\Domain\Repository;

use LoginMemoryPersistent\Domain\Entity\User;

interface UserSearchRepositoryInterface
{
    public function findAll();

    public function findByUserName($username);
}