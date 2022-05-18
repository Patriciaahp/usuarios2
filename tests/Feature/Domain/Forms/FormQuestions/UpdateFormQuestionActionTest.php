<?php

namespace Tests\Feature\Domain\Forms\FormQuestions;

use Domain\Forms\FormQuestions\Actions\StoreFormQuestionAction;
use Domain\Forms\FormQuestions\ResponseCodes\ResponseCodeFormQuestionStored;
use Domain\Forms\Forms\Actions\StoreFormAction;
use Domain\Forms\Models\FormQuestionType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateFormQuestionActionTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_forms_forms_store_form_question_action_ok
     * @return void
     */
    public function domain_forms_forms_store_form_question_action_ok()
    {
        $dataForm = array(
            'name' => $this->faker->name,
            'title' => $this->faker->name,
            'description' => $this->faker->name);
        $actionForm = new StoreFormAction($dataForm);
        $result = $actionForm->execute();

        $form = $result->object;

        $dataType = array(

            'internal_name' => $this->faker->name,
            'name' => $this->faker->name,
        );
        $type = new FormQuestionType($dataType);
        $type = new FormQuestionType();
        $this->artisan('question:type');
        dd($type->id);

        $data = array(
            'label' => $this->faker->name,
            'help_text' => $this->faker->name,
            'placeholder' => $this->faker->name,
            'required' => $this->faker->boolean,
            'order_' => $this->faker->randomNumber(),
            'form_id' => $form->id,
            'type_id' => $type->id
        );

        $action = new StoreFormQuestionAction($data);
        $result = $action->execute();

        $question = $result->object;
        $this->assertNotNull($question);

        $this->assertDatabaseHas($question->getTable(), [
            'id' => $question->id
        ]);

        $response_fake = new ResponseCodeFormQuestionStored($question);
        $this->assertTrue(get_class($response_fake) == get_class($result));

    }
}
