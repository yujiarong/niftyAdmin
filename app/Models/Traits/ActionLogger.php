<?php
namespace App\Models\Traits;
use Illuminate\Support\Facades\Auth;
use Log;

trait ActionLogger
{
	protected static function bootActionLogger()
	{
		foreach (static::getModelEvents() as  $event) {
			static::$event(function($model) use ($event){
				$log = ['user'=>Auth::id(),'action'=>$event,'model'=>get_class($model),'data'=>$model->toArray()];
				Log::info(json_encode($log));
			});
		}
	}

	protected static function getModelEvents()
	{
		return static::$recordEvents ?? ['created','updated','deleted'];
	}


}
