<?php

namespace Tests\Feature\Domain\Forms\FormQuestions;

use Domain\Forms\Form\Actions\StoreFormAction;
use Domain\Forms\FormQuestion\Actions\DeleteFormQuestionAction;
use Domain\Forms\FormQuestion\Actions\StoreFormQuestionAction;
use Domain\Forms\FormQuestion\ResponseCodes\ResponseCodeFormQuestionDeleted;
use Domain\Forms\Models\FormQuestionType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteFormQuestionActionTest extends TestCase
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

        $delete = new DeleteFormQuestionAction($question);
        $response = $delete->execute();

        $response_fake = new ResponseCodeFormQuestionDeleted();
        $this->assertTrue(get_class($response_fake) == get_class($response));

    }

}
