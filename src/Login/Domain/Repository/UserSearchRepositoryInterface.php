<?php

namespace LoginMemoryPersistent\Domain\Repository;

interface UserSearchRepositoryInterface
{
    public function findByUsername(String $username);
}