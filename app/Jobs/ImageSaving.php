<?php

namespace App\Jobs;

use App\Http\Helper;
use App\Models\Work;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\UploadedFile;
use Illuminate\Queue\SerializesModels;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig;

class ImageSaving implements ShouldQueue
{
    use Dispatchable, SerializesModels;

    public $tries = 3;

    /**
     * @var Work
     */
    protected $model;

    /**
     * @var string
     */
    protected $collection;

    /**
     * @var UploadedFile
     */
    private $file;

    /**
     * Create a new job instance.
     *
     * @param Work $model
     * @param UploadedFile $file
     * @param $collection
     */
    public function __construct($model, UploadedFile $file, string $collection)
    {
        $this->model = $model;
        $this->collection = $collection;
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws DiskDoesNotExist
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function handle()
    {
        $this->model->addMediaFromRequest($this->collection)
            ->usingFileName(Helper::createFileName($this->file))
            ->toMediaCollection($this->collection);
    }
}
