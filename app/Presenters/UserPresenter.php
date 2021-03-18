<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter
{
    public function isEnable()
    {
        return $this->is_enable ? __('Yes') : __('No');
    }

    public function isSuper()
    {
        return $this->is_super ? __('Yes') : __('No');
    }

    public function allRoles()
    {
        $roles = [];

        foreach ($this->roles as $role) {
            $roles[] = $role->name;
        }

        return implode(',', $roles);
    }

    public function allGroups()
    {
        $groups = [];

        foreach ($this->groups as $group) {
            $groups[] = $group->name;
        }

        return implode(',', $groups);
    }
}
