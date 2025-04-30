<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DownloadCompanyLogos extends Command
{
    protected $signature = 'logos:download';
    protected $description = 'Download company logos from Google Images';

    public function handle()
    {
        $logos = [
            'microsoft.png' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Microsoft_logo.svg/2560px-Microsoft_logo.svg.png',
            'google.png' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/2560px-Google_2015_logo.svg.png',
            'amazon.png' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Amazon_logo.svg/2560px-Amazon_logo.svg.png',
            'valeo.png' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7a/Valeo_logo.svg/2560px-Valeo_logo.svg.png',
            'ibm.png' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/IBM_logo.svg/2560px-IBM_logo.svg.png',
        ];

        foreach ($logos as $filename => $url) {
            $this->info("Downloading {$filename}...");
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36');
            
            $contents = curl_exec($ch);
            if (curl_errno($ch)) {
                $this->error("Error downloading {$filename}: " . curl_error($ch));
                continue;
            }
            curl_close($ch);

            Storage::disk('public')->put("avatars/{$filename}", $contents);
        }

        $this->info('All logos downloaded successfully!');
    }
} 