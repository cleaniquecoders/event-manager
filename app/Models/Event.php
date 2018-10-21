<?php

namespace App\Models;

use App\Traits\HasDatatable;
use App\Traits\HasMediaExtended;
use App\Traits\HasSlugExtended;
use App\Traits\LogsActivityExtended;
use CleaniqueCoders\Profile\Traits\HasProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Event extends Model implements HasMedia
{
    use HasDatatable, HasMediaExtended, HasSlugExtended, LogsActivityExtended,
        HasProfile, SoftDeletes;

    const DRAFT     = 0;
    const PUBLISHED = 1;
    const CANCELLED = 2;

    protected $guarded = ['id'];

    /**
     * Create Slug From.
     *
     * @var array
     */
    protected $slug_from = ['name'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that show in datatable.
     *
     * @var array
     */
    protected $datatable = [
        'name', 'excerpt', 'hashslug', 'date', 'time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeIsDraft($query)
    {
        return $query->latest()->whereIsDraft(true);
    }

    public function scopeIsPublished($query)
    {
        return $query->latest()->whereIsPublished(true);
    }

    public function scopeIsCancelled($query)
    {
        return $query->latest()->whereIsCancelled(true);
    }

    public function subscribers()
    {
        return $this->belongsToMany(
            User::class,
            'subscriptions',
            'event_id',
            'user_id'
        );
    }
}
