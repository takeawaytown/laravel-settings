<?php
/**
 * Laravel 5 Settings
 *
 * @author   Alex Scott <alex.scott@takeawaytown.co.uk>
 * @license  http://opensource.org/licenses/MIT
 * @package  laravel-settings
 */

namespace TakeawayTown\LaravelSettings;

use Illuminate\Foundation\Application;

class SettingsServiceProvider extends \Illuminate\Support\ServiceProvider
{
	/**
	 * This provider is deferred and should be lazy loaded.
	 *
	 * @var boolean
	 */
	protected $defer = true;

	/**
	 * Register IoC bindings.
	 */
	public function register()
	{
		$method = version_compare(Application::VERSION, '5.2', '>=') ? 'singleton' : 'bindShared';

		// Bind the manager as a singleton on the container.
		$this->app->$method('TakeawayTown\LaravelSettings\SettingsManager', function($app) {
			/**
			 * Construct the actual manager.
			 */
			return new SettingsManager($app);
		});

		// Provide a shortcut to the SettingStore for injecting into classes.
		$this->app->bind('TakeawayTown\LaravelSettings\SettingStore', function($app) {
			return $app->make('TakeawayTown\LaravelSettings\SettingsManager')->driver();
		});

		$this->mergeConfigFrom(__DIR__ . '/config/config.php', 'settings');
	}

	/**
	 * Boot the package.
	 */
	public function boot()
	{
		$this->publishes([
				__DIR__.'/config/config.php' => config_path('settings.php'),
		], 'config');

		$this->mergeConfigFrom(__DIR__.'/config/config.php', 'settings');

		if (! class_exists('CreateSettingsTable')) {
			$timestamp = date('Y_m_d_His', time());

			$this->publishes([
				__DIR__.'/migrations/create_settings_table.php.stub' => database_path("/migrations/{$timestamp}_create_settings_table.php"),
			], 'migrations');
		}

	}

	/**
	 * Which IoC bindings the provider provides.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array(
			'TakeawayTown\LaravelSettings\SettingsManager',
			'TakeawayTown\LaravelSettings\SettingStore',
		);
	}
}
