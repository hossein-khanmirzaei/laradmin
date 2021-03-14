<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class RolePresenter extends Presenter
{
    public function byGroup()
    {
        return $this->by_group ? __('Yes') : __('No');
    }

    public function allPermissions()
    {
        $permissions = [];

        foreach ($this->permissions as $permission) {
            $permissions[] = $permission->name;
        }

        return implode(',', $permissions);
    }
}
