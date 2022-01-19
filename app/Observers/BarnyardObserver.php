<?php

namespace App\Observers;

use App\Models\Barnyard;

class BarnyardObserver
{
    /**
     * Handle the BarnyardObserver "created" event.
     *
     * @param  \App\Models\BarnyardObserver  $barnyard
     * @return void
     */
    public function created(BarnyardObserver $barnyard)
    {
        //
    }

    /**
     * Handle the BarnyardObserver "updated" event.
     *
     * @param  \App\Models\BarnyardObserver  $barnyard
     * @return void
     */
    public function updated(BarnyardObserver $barnyard)
    {
        //
    }

    /**
     * Handle the BarnyardObserver "deleted" event.
     *
     * @param  \App\Models\BarnyardObserver  $barnyard
     * @return void
     */
    public function deleted(BarnyardObserver $barnyard)
    {
        //
    }

    /**
     * Handle the BarnyardObserver "restored" event.
     *
     * @param  \App\Models\BarnyardObserver  $barnyard
     * @return void
     */
    public function restored(BarnyardObserver $barnyard)
    {
        //
    }

    /**
     * Handle the BarnyardObserver "force deleted" event.
     *
     * @param  \App\Models\BarnyardObserver  $barnyard
     * @return void
     */
    public function forceDeleted(BarnyardObserver $barnyard)
    {
        //
    }
}
