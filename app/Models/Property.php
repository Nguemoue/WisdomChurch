<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Property extends Model
{
	public function propertyValue(): HasOne
	{
		return $this->hasOne(PropertyValue::class, 'property_id');
	}
}
