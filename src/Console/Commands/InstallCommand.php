<?php
namespace Isb\Language\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'isb-language:install';

    /**
     * @var string
     */
    protected $description = 'Language Install';

    /**
     * @return mixed
     */
    public function handle()
    {
        $this->call('isb-language:add', ['code' => 'en', 'name' => 'English', 'native' => 'English']);
        $this->call('isb-language:add', ['code' => 'pt_BR', 'name' => 'Portuguese', 'native' => 'Português']);
    }
}
