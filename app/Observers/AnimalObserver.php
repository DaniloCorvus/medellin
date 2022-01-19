<?php

namespace App\Observers;

use App\Models\Animal;
use App\Models\Barnyard;

class AnimalObserver
{
    /**
     * Handle the AnimalObserver "created" event.
     *
     * @param  \App\Models\Animal  $animal
     * @return void
     */
    public function created(Animal $animal)
    {
        $barnyard =  Barnyard::find($animal->barnyard_id);
        $barnyard->limit = $barnyard->limit - 1;
        $barnyard->save();
    }

    /**
     * Handle the AnimalObserver "updated" event.
     *
     * @param  \App\Models\Animal  $animal
     * @return void
     */
    public function updated(Animal $animal)
    {
        //
    }

    /**
     * Handle the AnimalObserver "deleted" event.
     *
     * @param  \App\Models\Animal  $animal
     * @return void
     */
    public function deleted(Animal $animal)
    {
        //
    }
}
