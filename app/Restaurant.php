<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Restaurant extends Authenticatable
{
    use Notifiable;

    protected $guard = 'restaurant';

    public $type = 'restaurant';

    protected $fillable = [
        'name', 'email', 'password', 'image',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function menuItems(): BelongsToMany
    {
        return $this->belongsToMany(MenuItem::class, 'restaurant_menu_items', 'restaurant_id', 'menu_item_id')->withPivot('price', 'type', 'description', 'image');
    }

    public function restaurantMenuItems(): HasMany
    {
        return $this->hasMany(RestaurantMenuItem::class)->with('menuItem');
    }
}
