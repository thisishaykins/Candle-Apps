<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class BusinessNews extends Model
{

	use Notifiable;

	protected $table = 'business_news';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sponsor_id', 'business_post_title', 'business_post_content', 'business_post_image', 'is_active', 'show_at',
    ];

}
