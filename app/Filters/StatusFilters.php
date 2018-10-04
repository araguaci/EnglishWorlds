<?php

namespace English\Filters;

use English\User;

class StatusFilters extends Filters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = ['by'];

    /**
     * Filter the query by a given username.
     *
     * @param string $username
     *
     * @return Builder
     */
    protected function by($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        return $this->builder->where('user_id', $user->id);
    }
}
