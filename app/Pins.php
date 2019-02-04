<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pins extends Model
{

	use Notifiable;

    protected $table = 'at_pins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'location_id', 'network_id', 'sponsor_id', 'sponsor_promo_image', 'pin_code', 'pin_code_char', 'is_active', 'show_at',
    ];

}
