<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SportNews extends Model
{

	use Notifiable;

	protected $table = 'sp_news';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sponsor_id', 'title', 'post_content', 'bg_image', 'is_active', 'show_at',
    ];

}
