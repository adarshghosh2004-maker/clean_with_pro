<?php

namespace App\Console\Commands;

use App\Models\History;
use App\Models\User_Summary;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class generateSummary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-summary';

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
        User_Summary::truncate();
        $start_date = now()->subWeek()->startOfWeek();
        $end_date = now()->startOfWeek();

        $history = History::whereBetween('created_at', [$start_date, $end_date])->get()->groupBy('user_id');

        $sample_json = [
            'content_types' => [],
            'affinity_vectors' => [],
        ];

        foreach ($history as $user_id => $data) {
            $user_summary = User_Summary::create([
                'user_id' => $user_id,
                'score_json' => json_encode($sample_json, true)
            ]);

            $json = json_decode($user_summary->score_json, true);

            foreach ($data->groupBy('content_type') as $content_type => $content) {
                if (!isset($json['content_types'][$content_type])) {
                    $json['content_types'][$content_type] = 0;
                }

                $total_time_spend = $content->sum('time_spend');

                $json['content_types'][$content_type] += $total_time_spend;

                $dimensions = [
                    'author_id',
                    'category_id',
                    'language_id'
                ];
                foreach ($dimensions as $field) {
                    foreach ($content->groupBy($field) as $key => $value) {
                        if ($key <= 0) {
                            continue;
                        }
                        if (!isset($json['affinity_vectors'][$content_type][$field][$key])) {
                            $json['affinity_vectors'][$content_type][$field][$key] = 0;
                        }
                        $json['affinity_vectors'][$content_type][$field][$key] += $value->sum('time_spend');
                    }
                }
            }
            
            if (empty($json['content_types']) && empty($json['affinity_vectors'])) {
                $user_summary->delete();
            } else {
                arsort($json['content_types']);

                foreach ($json['affinity_vectors'] as $field => $value) {
                    foreach ($value as  $key => $val) {
                        arsort($val);

                        $json['affinity_vectors'][$field][$key] = $val;
                    }
                }
                $user_summary->update(['score_json' => json_encode($json, true)]);
            }
        }

        return Command::SUCCESS;
    }
}
