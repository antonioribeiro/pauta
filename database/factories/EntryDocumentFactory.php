<?php

use App\Data\Models\AttachedFile;
use App\Data\Repositories\Entries;
use App\Data\Repositories\Users as UsersRepository;
use App\Data\Models\EntryDocument as EntryDocumentModel;

$factory->define(EntryDocumentModel::class, function () {
    return [
        'entry_id' => app(Entries::class)->randomElement()->id,
        'attached_file_id' => factory(AttachedFile::class)->create(),
        'created_by_id' => app(UsersRepository::class)->randomElement()->id,
        'updated_by_id' => app(UsersRepository::class)->randomElement()->id,
    ];
});
