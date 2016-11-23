<?php namespace Daviesgeek\IntervalFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
use Anomaly\SelectFieldType\SelectFieldTypePresenter;

class IntervalFieldTypePresenter extends SelectFieldTypePresenter {

  public function key() {
    return ucfirst(parent::key());
  }

}