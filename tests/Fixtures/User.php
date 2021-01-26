<?php

namespace Marketplaceful\Tests\Fixtures;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Marketplaceful\Database\Factories\UserFactory;
use Marketplaceful\Traits\InteractsAsMarketplacefulUser;

class User extends Authenticatable
{
    use HasFactory;
    use InteractsAsMarketplacefulUser;

    protected $guarded = [];

    protected static function newFactory()
    {
        return UserFactory::new();
    }
}
