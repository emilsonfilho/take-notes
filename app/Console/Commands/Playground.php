<?php

namespace App\Console\Commands;

use App\Models\Note;
use Illuminate\Console\Command;

class Playground extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:playground';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para rodar backend sem precisar de rotas.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Note::factory()->create();

        $this->info('Operation concluded!');
    }
}
