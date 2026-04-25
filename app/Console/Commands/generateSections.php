<?php

namespace App\Console\Commands;

use App\Models\Content_Section;
use App\Models\User_Summary;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class generateSections extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-sections';

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
        $data = User_Summary::where('status', 1)->get();

        foreach ($data as $user_summary) {
            $json = json_decode($user_summary->score_json, true);
            if (!is_array($json) || empty($json)) {
                Log::info('Invalid score json for user ' . $user_summary->user_id);
                continue;
            }

            $user_id = $user_summary->user_id;
            $top_type = '';
            $top_category = '';

            //get top content type 
            foreach ($json['content_types'] as $key => $value) {
                $top_type = $key;
                if (!empty($top_type)) {
                    break;
                }
            }

            //get top category 
            foreach ($json['affinity_vectors'][$top_type]['category_id'] as $key => $value) {
                $top_category = $key;
                if (!empty($top_category)) {
                    break;
                }
            }

            if (empty($top_type) || empty($top_category)) {
                Log::info('Invalid top type or category for user ' . $user_summary->user_id);
                continue;
            }

            Content_Section::insert([
                'user_id' => $user_id,
                'section_type' => 0,
                'content_type' => $top_type,
                'title' => 'Recommeded For You',
                'short_title' => 'Top Content For You',
                'screen_layout' => 'portrait',
                'author_id' => 0,
                'category_id' => $top_category,
                'language_id' => 0,
                'access_type' => 0,
                'order_by_view' => 2,
                'order_by_upload' => 2,
                'no_of_content' => 10,
                'view_all' => 0,
                'sort_order' => 0,
                'status' => 1,
            ]);
        }

        return Command::SUCCESS;
    }
}
