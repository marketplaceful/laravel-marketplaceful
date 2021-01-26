<?php

namespace Marketplaceful\Tests\Fixtures;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Marketplaceful\Traits\InteractsAsMarketplacefulUser;

class User extends Authenticatable
{
    protected $guarded = [];

    use InteractsAsMarketplacefulUser;
}
