<?php
/**
 * Laravel 5 Settings
 *
 * @author   Alex Scott <alex.scott@takeawaytown.co.uk>
 * @license  http://opensource.org/licenses/MIT
 * @package  laravel-settings
 */

namespace TakeawayTown\LaravelSettings;

class MemorySettingStore extends SettingStore
{
	/**
	 * @param array $data
	 */
	public function __construct(array $data = null)
	{
		if ($data) {
			$this->data = $data;
		}
	}

	/**
	 * {@inheritdoc}
	 */
	protected function read()
	{
		return $this->data;
	}

	/**
	 * {@inheritdoc}
	 */
	protected function write(array $data)
	{
		// do nothing
	}
}
