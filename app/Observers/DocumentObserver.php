<?php

namespace App\Observers;

use App\User;

class DocumentObserver
{
    public function updated($model)
    {
        $model->adjustments()->updateExistingPivot(User::find(1)->id,['after'=>$model->getDirty()]);
    }
}
