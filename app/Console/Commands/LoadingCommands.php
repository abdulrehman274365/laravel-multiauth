<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
class LoadingCommands extends Command
{
    protected $signature = 'fetch:data';
    protected $description = 'Show multiple progress loading bars with per-loop and total percentage indicators';
    public function handle()
    {
        $totalLoops = 1000;
        $barLength = 50;
        $this->info("\nTotal Repositories: {$totalLoops}\n");

        for ($loop = 1; $loop <= $totalLoops; $loop++) {
            $this->info("\nDownloading Repository {$loop}/{$totalLoops}");

            for ($i = 0; $i <= 100; $i++) {
                $filled = round(($i / 100) * $barLength);

                $color = "\033[33m";
                
                if ($filled >= $barLength) {
                    $color = "\033[32m";
                }

                if ($filled >= $barLength) {
                    $bar = $color . str_repeat('=', $barLength) . "\033[0m";
                } else {
                    $bar = $color . str_repeat('=', $filled) . '>' . str_repeat('-', $barLength - $filled - 1) . "\033[0m";
                }

                $loopPercent = str_pad($i, 3, ' ', STR_PAD_LEFT) . '%';
                $overallPercent = str_pad(round((($loop - 1) * 100 + $i) / $totalLoops), 3, ' ', STR_PAD_LEFT) . '%';
                
                echo "\r[{$bar}]  Loading: {$loopPercent}  Total: {$overallPercent}";
                usleep(40000);
            }

            echo "\n";
            usleep(150000);
        }

        $this->newLine();
        return $this->info("\n✅ All {$totalLoops} Repositories installed successfully!\n");
    }
}
