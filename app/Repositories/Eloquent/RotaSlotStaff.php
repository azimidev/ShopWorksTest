<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\RotaSlotStaffRepository;

class RotaSlotStaff extends Repository implements RotaSlotStaffRepository
{

    /**
     * Get model
     * @return mixed
     */
    public function model()
    {
        return \App\RotaSlotStaff::class;
    }
}