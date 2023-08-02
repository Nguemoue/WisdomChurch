<?php


namespace App\Services;


use App\Models\Testimony;
use PHPUnit\Util\Test;

class TestimonyService
{
	public function store(int $userId,string $content){
		Testimony::query()->create([
			"user_id"=>$userId,
			"content"=>$content
		]);
	}

	/**
	 * @param array $data
	 */
	public function update(string $key,string $value, array $data){
		Testimony::where($key,$value)->update($data);
	}

	public function destroy(string $key, $value)
	{
		Testimony::where($key,$value)->delete();

	}

}
