<?php

namespace App\Console\Commands;

use App\Services\JWT\TokenRepository;
use Illuminate\Console\Command;

class InavlidateTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'token:invalidate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Invalidate old tokens';

    /**
     * @var TokenRepository
     */
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
        $updated = $this->tokenRepository->invalidateOldTokens();

        $this->comment(sprintf('Invalidated %s tokens', $updated));

        return 0;
    }
}
