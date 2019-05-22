<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CandleAnalyticsTime extends Model
{

	use Notifiable;

	protected $table = 'candle_analytics_time';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'time', 'time_hrs',
    ];


}
