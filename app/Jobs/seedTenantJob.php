<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\{Tenant, User};

class seedTenantJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $tenent;
    public function __construct(Tenant $tenent)
    {
        $this->tenent = $tenent;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->tenent->run(function () {
            user::create([
                'name' => $this->tenent->name,
                'email' => $this->tenent->email,
                'password' => $this->tenent->password,
            ]);
        });
    }
}
