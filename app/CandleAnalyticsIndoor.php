<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CandleAnalyticsIndoor extends Model
{

	use Notifiable;

	protected $table = 'candle_analytics_indoor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'an_location_id', 'an_time_id', 'an_number_persons', 'an_soe_a', 'an_soe_b', 'an_soe_c', 'an_soe_d', 'an_soe_e', 'an_soe_f', 'an_gender_male', 'an_gender_female', 'an_date_added',
    ];


}
