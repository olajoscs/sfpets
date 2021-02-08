<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Services\JWT\TokenRepository;
use Illuminate\Console\Command;

class RemoveInvalidatedTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'token:remove';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove old invalidated tokens';

    private TokenRepository $tokenRepository;


    public function __construct(TokenRepository $tokenRepository)
    {
        parent::__construct();
        $this->tokenRepository = $tokenRepository;
    }


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $updated = $this->tokenRepository->removeInvalidatedTokens();

        $this->comment(sprintf('Removed %s tokens', $updated));

        return 0;
    }
}