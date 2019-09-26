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

    public $tries = 3;

	protected $model;
	protected $collection;
    protected $filename;

    /**
     * Create a new job instance.
     *
     * @param $model
     * @param $collection
     * @param $filename
     */
	public function __construct($model, $collection, $filename)
	{
		$this->model = $model;
		$this->collection = $collection;
        $this->filename = $filename;
    }

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function handle()
	{
		$this->model->addMediaFromRequest($this->collection)
            ->usingFileName($this->filename)
            ->toMediaCollection($this->collection);
	}
}
