<?php

namespace IBroStudio\Ploi\Commands;

use Illuminate\Console\Command;

class PloiCommand extends Command
{
    public $signature = 'laravel-ploi-sdk';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
