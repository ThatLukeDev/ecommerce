<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Basket;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    const PERMISSION_USER = 0;
    const PERMISSION_ADMIN = 1;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'permission',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function items(): HasMany {
        return $this->hasMany(Basket::class);
    }

    public function basket(): Attribute {
        return Attribute::make(
            get: function () {
                $basket = [];

                $items = $this->items;
                foreach ($items as $item) {
                    if (!isset($basket[$item->id])) {
                        $basket[$item->id] = 0;
                    }
                    $basket[$item->id] += $item->amount;
                }

                return $basket;
            },
            set: function ($basket) {
                $this->items()->delete();

                foreach ($basket as $item => $amount) {
                    Basket::create([
                        "item_id" => $item,
                        "user_id" => Auth::id(),
                        "amount" => $amount
                    ]);
                }
            }
        );
    }
}
