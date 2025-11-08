<?php

declare(strict_types=1);

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

trait TrackUser
{
    /**
     * @return BelongsTo<User, $this>
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    protected static function boot(): void
    {
        parent::boot();

        self::creating(function (Model $model) {
            if (Auth::check()) {
                $model->setAttribute('created_by', Auth::id());
            }
        });

        self::updating(function (Model $model) {
            if (Auth::check()) {
                $model->setAttribute('updated_by', Auth::id());
            }
        });
    }
}
