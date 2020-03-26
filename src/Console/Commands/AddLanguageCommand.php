<?php
namespace Isb\Language\Console\Commands;

use Illuminate\Console\Command;
use Isb\Language\Language;

class AddLanguageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'isb-language:add
                            {code : Language Code}
                            {name : Language Name}
                            {native? : Language Native Name}';
    /**
     * @var string
     */
    protected $description = 'Add language';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $lang = new Language();
        $lang->forceFill([
            'id' => $this->argument('code'),
            'name' => $this->argument('name'),
            'name_native' => $this->argument('native'),
        ]);
        $lang->save();
        $this->info('Language ' . $lang->id . ' added successfully');
    }
}
