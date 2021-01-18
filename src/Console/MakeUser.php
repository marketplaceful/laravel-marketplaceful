<?php

namespace Marketplaceful\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Marketplaceful\Marketplaceful;

class MakeUser extends Command
{
    protected $signature = 'marketplaceful:make-user';

    protected $description = 'Create a new user';

    protected $email;

    protected $name;

    protected $password;

    protected $owner;

    public function handle()
    {
        $this
            ->promptEmail()
            ->promptName()
            ->promptPassword()
            ->promptOwner()
            ->createUser();
    }

    protected function promptEmail()
    {
        $this->email = $this->ask('Email');

        if ($this->emailValidationFails()) {
            return $this->promptEmail();
        }

        return $this;
    }

    protected function promptName()
    {
        $this->name = $this->ask('Name', false);

        return $this;
    }

    protected function promptPassword()
    {
        $this->password = $this->secret('Password (Your input will be hidden)');

        return $this;
    }

    protected function promptOwner()
    {
        $this->owner = (bool) $this->confirm('Owner user', false);

        return $this;
    }

    protected function createUser()
    {
        if ($this->emailValidationFails()) {
            return;
        }

        config('marketplaceful.user_model')::forceCreate([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'owner' => $this->owner,
        ]);

        $this->info('User created successfully.');
    }

    private function emailValidationFails()
    {
        if (! filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        if (Marketplaceful::newUserModel()->where('email', $this->email)->exists()) {
            return true;
        }
    }
}
