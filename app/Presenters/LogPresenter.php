<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class LogPresenter extends Presenter
{
    public function actionLink()
    {

        $link = '<a href="' . route('logs.show', $this->id) . '" class="btn btn-primary btn-sm" title="' . __('Show') . '"><i class="fas fa-folder"></i> ' . __('Show') . '</a>';

        return $link;
    }
}
