<?php

namespace App\Console\Commands;

use Domain\Forms\Models\FormQuestionType;
use Illuminate\Console\Command;

class QuestionType extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'question:type';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $types = [
            array(
                'name' => 'Input Text',
                'internal_name' => 'input_text'
            ),
            array(
                'name' => 'Message',
                'internal_name' => 'message'
            )
        ];

        foreach ($types as $type) {

            $question = FormQuestionType::where('internal_name', $type['internal_name'])->first();

            if ($question) {

                $question->update($type);

            } else {
                FormQuestionType::create($type);
            }
        }

        return 0;
    }
}
