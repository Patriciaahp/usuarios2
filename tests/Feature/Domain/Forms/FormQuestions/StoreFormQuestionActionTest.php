<?php

namespace Tests\Feature\Domain\Forms\FormQuestions;

use Domain\Forms\Form\Actions\StoreFormAction;
use Domain\Forms\FormQuestion\Actions\StoreFormQuestionAction;
use Domain\Forms\FormQuestion\ResponseCodes\ResponseCodeFormQuestionStored;
use Domain\Forms\Models\FormQuestionType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use InvalidArgumentException;
use Tests\TestCase;

class StoreFormQuestionActionTest extends TestCase
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
        $this->assertNotNull($question);

        $this->assertDatabaseHas($question->getTable(), [
            'id' => $question->id
        ]);

        $response_fake = new ResponseCodeFormQuestionStored($question);
        $this->assertTrue(get_class($response_fake) == get_class($result));

    }

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_forms_forms_store_form_question_action_no_label
     * @return void
     */
    public function domain_forms_forms_store_form_question_action_no_label()
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
            'help_text' => $this->faker->name,
            'placeholder' => $this->faker->name,
            'required' => $this->faker->boolean,
            'order_' => $this->faker->randomNumber(2),
            'form_id' => $form->id,
            'type_id' => $type->id
        );

        $this->expectException(InvalidArgumentException::class);

        $action = new StoreFormAction($data);

        $result = $action->execute();

    }

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_forms_forms_store_form_question_action_no_help_text
     * @return void
     */
    public function domain_forms_forms_store_form_question_action_no_help_text()
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
            'placeholder' => $this->faker->name,
            'required' => $this->faker->boolean,
            'order_' => $this->faker->randomNumber(2),
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

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_forms_forms_store_form_question_action_placeholder
     * @return void
     */
    public function domain_forms_forms_store_form_question_action_no_placeholder()
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
            'help_text' => $this->faker->name,
            'label' => $this->faker->name,
            'required' => $this->faker->boolean,
            'order_' => $this->faker->randomNumber(2),
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

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_forms_forms_store_form_question_action_no_required
     * @return void
     */
    public function domain_forms_forms_store_form_question_action_no_required()
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
            'order_' => $this->faker->randomNumber(2),
            'form_id' => $form->id,
            'type_id' => $type->id
        );

        $this->expectException(InvalidArgumentException::class);

        $action = new StoreFormAction($data);

        $result = $action->execute();

    }


    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_forms_forms_store_form_question_action_no_order
     * @return void
     */
    public function domain_forms_forms_store_form_question_action_no_order()
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
            'form_id' => $form->id,
            'type_id' => $type->id
        );

        $this->expectException(InvalidArgumentException::class);

        $action = new StoreFormAction($data);

        $result = $action->execute();

    }

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_forms_forms_store_form_question_action_no_type_id
     * @return void
     */
    public function domain_forms_forms_store_form_question_action_no_type_id()
    {
        $dataForm = array(
            'name' => $this->faker->name,
            'title' => $this->faker->name,
            'description' => $this->faker->name);
        $actionForm = new StoreFormAction($dataForm);
        $result = $actionForm->execute();

        $form = $result->object;


        $data = array(
            'label' => $this->faker->name,
            'help_text' => $this->faker->name,
            'placeholder' => $this->faker->name,
            'required' => $this->faker->boolean,
            'order_' => $this->faker->randomNumber(2),
            'form_id' => $form->id,

        );

        $this->expectException(InvalidArgumentException::class);

        $action = new StoreFormAction($data);

        $result = $action->execute();

    }

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_forms_forms_store_form_question_action_no_form_id
     * @return void
     */
    public function domain_forms_forms_store_form_question_action_no_form_id()
    {
        $this->artisan('question:type');
        $type = FormQuestionType::all()->first();

        $data = array(
            'label' => $this->faker->name,
            'help_text' => $this->faker->name,
            'placeholder' => $this->faker->name,
            'required' => $this->faker->boolean,
            'order_' => $this->faker->randomNumber(2),
            'type_id' => $type->id
        );

        $this->expectException(InvalidArgumentException::class);

        $action = new StoreFormAction($data);

        $result = $action->execute();

    }
}
