<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ForkRepos implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $owner;
    private $repo;

    /**
     * Create a new job instance.
     *
     * @param string $owner
     * @param string $repo
     */
    public function __construct(string $owner, string $repo )
    {
        $this->owner = $owner;
        $this->repo = $repo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $URL = 'https://api.github.com/repos/'.$this->owner.'/'.$this->repo.'/forks';
        $ch = curl_init();
        $fileContent = [
            'Authorization: token '.  session('my_access_token'),
            'User-Agent: php',
            'Content-Type: application/x-www-form-urlencoded',
            'Accept: application/vnd.github.v3+json',
        ] ;

        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $fileContent);
        $result = curl_exec($ch);
        var_dump($result);
        curl_close ($ch);
    }
}
