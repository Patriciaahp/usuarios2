<?php

namespace Tests\Feature\Domain\Forms\Answers;

use Domain\Forms\Answer\Actions\StoreAnswerAction;
use Domain\Forms\Answer\ResponseCodes\ResponseCodeAnswerStored;
use Domain\Forms\Form\Actions\StoreFormAction;
use Domain\Forms\FormQuestion\Actions\StoreFormQuestionAction;
use Domain\Forms\FormSession\Actions\StoreFormSessionAction;
use Domain\Forms\Models\FormQuestionType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreAnswerActionTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_forms_answers_store_answer_action_ok
     * @return void
     */
    public function domain_forms_answers_store_answer_action_ok()
    {
        $dataForm = array(
            'name' => $this->faker->name,
            'title' => $this->faker->name,
            'description' => $this->faker->name);
        $actionForm = new StoreFormAction($dataForm);
        $result = $actionForm->execute();

        $form = $result->object;


        $this->artisan('question:type');
        $type = FormQuestionType::all()->first();


        $data = array(
            'label' => $this->faker->name,
            'help_text' => $this->faker->name,
            'placeholder' => $this->faker->name,
            'required' => $this->faker->boolean,
            'order_' => $this->faker->randomNumber(2),
            'form_id' => $form->id,
            'type_id' => $type->id
        );

        $action = new StoreFormQuestionAction($data);
        $result = $action->execute();

        $question = $result->object;

        $data = array(
            'form_id' => $form->id
        );
        $action = new StoreFormSessionAction($data);
        $result = $action->execute();

        $session = $result->object;

        $data = array(
            'label' => $question['label'],
            'answer' => $this->faker->name,
            'session_id' => $session->id,
            'formulary_question_id' => $question->id,
            'form_id' => $form->id,
        );

        $action = new StoreAnswerAction($data);
        $result = $action->execute();

        $answer = $result->object;
        

        $response_fake = new ResponseCodeAnswerStored($answer);
        $this->assertTrue(get_class($response_fake) == get_class($result));

    }
}
