<?php

namespace App\Console\Commands;

use App\Services\User\UserRepository;
use Illuminate\Console\Command;

class RemoveInvalidatedUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:remove';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Invalidate old users without characters';

    private UserRepository $userRepository;


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        parent::__construct();
        $this->userRepository = $userRepository;
    }


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $updated = $this->userRepository->removeInvalidatedUsers();

        $this->comment(sprintf('Removed %s users', $updated));

        return 0;
    }
}
