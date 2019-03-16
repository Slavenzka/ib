<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ImageSaving implements ShouldQueue
{
	use Dispatchable, SerializesModels;
	private $model;
	private $name;

	/**
	 * Create a new job instance.
	 *
	 * @param $model
	 * @param $name
	 */
	public function __construct($model, $name)
	{
		$this->model = $model;
		$this->name = $name;
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function handle()
	{
		$this->model->addMediaFromRequest($this->name)->toMediaCollection($this->name);
	}
}
