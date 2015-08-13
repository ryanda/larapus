<?php 

class baseModel extends \Eloquent {
	public static $rules =[];

	public function updateRules() {
		$rules = static::$rules;

		foreach ($rules as $field => $rule) {
			// replace :id with $model->id
			$rules[$field] = str_replace(':id', $this->getKey(), $rule);
		}
		return $rules;
	}
}