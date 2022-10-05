<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function getUserinfo();
    public function getCategoryWiseVideo($id);
    public function getLastVideo($id);
}
