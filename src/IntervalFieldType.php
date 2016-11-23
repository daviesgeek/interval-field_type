<?php namespace Daviesgeek\IntervalFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\SelectFieldType\SelectFieldType;
use Carbon\Carbon;

class IntervalFieldType extends SelectFieldType {

  protected $nouns = [
    '0' => 'once',
    '1' => 'day',
    '2' => 'week',
    '3' => 'month',
    '4' => 'quarter',
    '5' => 'year',
  ];

  protected $adverbs = [
    '0' => 'once',
    '1' => 'daily',
    '2' => 'weekly',
    '3' => 'monthly',
    '4' => 'quarterly',
    '5' => 'yearly',
  ];

  public function __construct() {
    $this->setOptions($this->adverbs);
  }

  public function getNoun() {
    return $this->nouns[$this->value];
  }

  public function startOf() {
    switch ($this->noun) {
      case 'once':
        return null;
      case 'quarter':
        $method = 'startOfQuarter';
        break;

      default:
        $method = 'startOf' . ucfirst($this->getNoun($this->value));
        break;
    }

    return Carbon::now()->{$method}();
  }

}
