<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function getUserinfo();
    public function getUserinfoApi();
    public function getCategoryWiseVideo($id);
    public function getLastVideo($id);
    public function getvideoDetails($id);
}
