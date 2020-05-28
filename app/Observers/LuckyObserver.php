<?php

namespace App\Observers;

use App\Lucky;

class LuckyObserver
{
    public function creating(Lucky $lucky)
    {
        $number = mt_rand(1, 1000);
        $win = ($number % 2) == 0;
        $winSumm = 0;
        switch ($win) {
            case $number > 900:
                $winSumm = $number * 0.7;
                break;
            case $number > 600 && $number <= 900:
                $winSumm = $number * 0.5;
                break;
            case $number > 300 && $number <= 600:
                $winSumm = $number * 0.5;
                break;
            default:
                $winSumm = $number * 0.1;
        }
        $lucky->number = $number;
        $lucky->win = $win;
        $lucky->sum_win = $winSumm;
    }

    /**
     * Handle the lucky "created" event.
     *
     * @param \App\Lucky $lucky
     * @return void
     */
    public function created(Lucky $lucky)
    {
        //
    }

    /**
     * Handle the lucky "updated" event.
     *
     * @param \App\Lucky $lucky
     * @return void
     */
    public function updated(Lucky $lucky)
    {
        //
    }

    /**
     * Handle the lucky "deleted" event.
     *
     * @param \App\Lucky $lucky
     * @return void
     */
    public function deleted(Lucky $lucky)
    {
        //
    }

    /**
     * Handle the lucky "restored" event.
     *
     * @param \App\Lucky $lucky
     * @return void
     */
    public function restored(Lucky $lucky)
    {
        //
    }

    /**
     * Handle the lucky "force deleted" event.
     *
     * @param \App\Lucky $lucky
     * @return void
     */
    public function forceDeleted(Lucky $lucky)
    {
        //
    }
}
