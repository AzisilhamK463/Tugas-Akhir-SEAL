<?php

namespace App\Observers;

use App\Models\Modul;

class ModulObserver
{
    public function creating(Modul $modul)
    {
        $modul->slug = str()->slug($modul->name);
    }
}
