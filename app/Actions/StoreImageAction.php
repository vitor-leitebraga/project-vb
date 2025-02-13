<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;

class StoreImageAction
{
    use AsAction;

    public function handle($file, $folder, $returnAsUrl = false)
    {
		$path = $file->store($folder, 'public');
		return $returnAsUrl ? url("storage/" . $path) : $path;
    }
}
