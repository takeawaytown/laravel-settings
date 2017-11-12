<?php
/**
 * Laravel 5 Settings
 *
 * @author   Alex Scott <alex.scott@takeawaytown.co.uk>
 * @license  http://opensource.org/licenses/MIT
 * @package  laravel-settings
 */

namespace TakeawayTown\LaravelSettings;

class Facade extends \Illuminate\Support\Facades\Facade
{
	protected static function getFacadeAccessor()
	{
		return 'TakeawayTown\LaravelSettings\SettingsManager';
	}
}
