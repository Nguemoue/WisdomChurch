<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$defaultProps = config("app.props_name");
    	foreach ($defaultProps as $key=>$value){
    		Property::query()->updateOrCreate([
    			"code"=>$key
			],[
				"name"=>$value
			])->propertyValue()->create(["value"=>""]);
		}
    	if(User::doesntExist()){
    		\App\Models\User::factory(10)->create();
		}
    }
}
