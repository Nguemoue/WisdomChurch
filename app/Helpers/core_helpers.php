<?php
if(!function_exists("defaultPath")){
	function defaultPath(string $resource  = ''):string{
		if($resource == 'avatars'){
			return config("misc.default_path.$resource","storage/");
		}
		return config('misc.default_path.default','storage');
	}
}
if(!function_exists("defaultPoster")){
	function defaultPoster(string $resource=''): string
	{
		return  asset('images/image_1.jpg');
	}
}

if(!function_exists("webAuth")){
	function webAuth(): \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Auth\Factory
	{
		return auth("web");
	}
}

if(!function_exists("currentLocale")){
	function currentLocale(): bool|string
	{
		return LaravelLocalization::getCurrentLocale();
	}
}
