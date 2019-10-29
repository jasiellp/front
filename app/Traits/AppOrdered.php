<?php

namespace App\Traits;

trait AppOrdered {
protected $orderBy = 'created_at';
protected $orderDirection = 'desc';


public function newQuery($ordered = true)
{
    $query = parent::newQuery();

    if (empty($ordered)) {
        return $query;
    }

    	$order = "{$this->table}.{$this->orderBy}";

        return $query->orderBy($order, $this->orderDirection);
    }

}