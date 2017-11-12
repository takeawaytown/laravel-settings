<?php

return [
	/*
	 * --------------------------------------------------------------------------
	 * Default Settings Store
	 * --------------------------------------------------------------------------
	 *
	 * This option controls the default settings store that gets used while
	 * using this settings library.
	 *
	 * Supported: "json", "database"
	 *
	 */
	'store' => env('SETTINGS_STORE', 'json'),

	/*
	 * --------------------------------------------------------------------------
	 * JSON Store
	 * --------------------------------------------------------------------------
	 *
	 * If the store is set to "json", settings are stored in the defined
	 * file path in JSON format. Use full path to file.
	 *
	 */
	'path' => storage_path() . env('SETTINGS_PATH', '/settings.json'),

	/*
	 * --------------------------------------------------------------------------
	 * Database Store
	 * --------------------------------------------------------------------------
	 *
	 * The database settings are stored in the .env file, with a fallback in the
	 * settings.php config file.
	 *
	 */
	'connection' => env('SETTINGS_CONNECTION', null),
	'table' => env('SETTINGS_TABLE', 'settings'),
	'keyColumn' => env('SETTINGS_KEY_COLUMN', 'key'),
	'valueColumn' => env('SETTINGS_VALUE_COLUMN', 'value')
];
