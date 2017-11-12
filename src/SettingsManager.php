<?php
/**
 * Laravel 5 Settings
 *
 * @author   Alex Scott <alex.scott@takeawaytown.co.uk>
 * @license  http://opensource.org/licenses/MIT
 * @package  laravel-settings
 */

namespace TakeawayTown\LaravelSettings;

use Illuminate\Support\Manager;
use Illuminate\Foundation\Application;

class SettingsManager extends Manager
{
	public function getDefaultDriver()
	{
		return $this->getConfig('settings.store');
	}

	public function createJsonDriver()
	{
		$path = $this->getConfig('settings.path');

		return new JsonSettingStore($this->app['files'], $path);
	}

	public function createDatabaseDriver()
	{
		$connectionName = $this->getConfig('settings.connection');
		$connection = $this->app['db']->connection($connectionName);
		$table = $this->getConfig('settings.table');
		$keyColumn = $this->getConfig('settings.keyColumn');
		$valueColumn = $this->getConfig('settings.valueColumn');

		return new DatabaseSettingStore($connection, $table, $keyColumn, $valueColumn);
	}

	public function createMemoryDriver()
	{
		return new MemorySettingStore();
	}

	public function createArrayDriver()
	{
		return $this->createMemoryDriver();
	}

	protected function getConfig($key)
	{
		return $this->app['config']->get($key);
	}
}
