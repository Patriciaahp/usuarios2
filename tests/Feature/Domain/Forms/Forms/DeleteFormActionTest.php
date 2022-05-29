<?php

namespace Tests\Feature\Domain\Forms\Forms;

use Domain\Forms\Form\Actions\DeleteFormAction;
use Domain\Forms\Form\Actions\StoreFormAction;
use Domain\Forms\Form\ResponseCodes\ResponseCodeFormDeleted;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteFormActionTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_forms_forms_delete_form_action_ok
     * @return void
     */
    public function domain_forms_forms_delete_form_action_ok()
    {
        $data = array(
            'name' => $this->faker->name,
            'title' => $this->faker->name,
            'description' => $this->faker->name);
        $action = new StoreFormAction($data);
        $result = $action->execute();

        $form = $result->object;

        $delete = new DeleteFormAction($form);
        $response = $delete->execute();

        $response_fake = new ResponseCodeFormDeleted();
        $this->assertTrue(get_class($response_fake) == get_class($response));

    }
}
