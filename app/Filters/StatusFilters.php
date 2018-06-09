<?php

namespace English\Filters;

use English\User;

class StatusFilters extends Filters
{
    protected $filters = ['by'];

    /**
     * Filter the query by a given username.
     *
     * @param string $username
     *
     * @return mixed
     */
    protected function by($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        return $this->builder->where('user_id', $user->id);
    }
}
