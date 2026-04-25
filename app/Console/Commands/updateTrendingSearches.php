<?php

namespace App\Console\Commands;

use App\Models\Trending_Searches;
use App\Models\User_Searches;
use Illuminate\Console\Command;

class updateTrendingSearches extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-trending-searches';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $trending = User_Searches::where('created_at', '>=', now()->subDays(60))
            ->selectRaw(
                'term,(COUNT(*) + COUNT(DISTINCT user_id) * 3) as score'
            )
            ->groupBy('term')
            ->orderByDesc('score')
            ->limit(5)
            ->get();

        if ($trending->isEmpty()) {
            return Command::SUCCESS;
        }

        Trending_Searches::truncate();

        $data = [];
        foreach ($trending as $item) {
            $data[] = [
                'term' => $item->term,
                'score' => $item->score,
                'status' => 1,
            ];
        }

        Trending_Searches::insert($data);

        return Command::SUCCESS;
    }
}
