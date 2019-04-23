<?php

use App\Data\Models\File;
use App\Data\Models\AttachedFile;
use App\Data\Repositories\Entries;

$factory->define(AttachedFile::class, function () {
    !file_exists($destination = '/tmp/test') && mkdir($destination);

    return [
        'file_id' => factory(File::class)->create(),

        'fileable_id' => app(Entries::class)->randomElement()->id,

        'fileable_type' => Entries::class,

        'original_name' =>
            faker()->file('/tmp', $destination, false) . faker()->fileExtension,
    ];
});
