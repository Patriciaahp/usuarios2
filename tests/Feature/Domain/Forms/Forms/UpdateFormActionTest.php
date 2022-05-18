<?php

namespace Tests\Feature\Domain\Forms\Forms;

use Domain\Forms\Forms\Actions\StoreFormAction;
use Domain\Forms\Forms\Actions\UpdateFormAction;
use Domain\Forms\Forms\ResponseCodes\ResponseCodeFormUpdated;
use Domain\Forms\Models\Form;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateFormActionTest extends TestCase
{

    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_forms_forms_update_form_action_ok
     * @return void
     */
    public function domain_forms_forms_update_form_action_ok()
    {
        $data = array(
            'name' => $this->faker->name,
            'title' => $this->faker->name,
            'description' => $this->faker->name);
        $action = new StoreFormAction($data);
        $result = $action->execute();

        $form = $result->object;

        $dataUpdate = array(
            'name' => 'hola',
            'title' => 'hola2',
            'description' => 'hola33');
        $actionUpdate = new UpdateFormAction($form, $dataUpdate);
        $resultNew = $actionUpdate->execute();
        $formUpdated = $resultNew->object;


        $this->assertDatabaseHas($formUpdated->getTable(), [
            'name' => 'hola',
            'title' => 'hola2',
            'description' => 'hola33'

        ]);

        $formNew = new Form();
        $response_fake = new ResponseCodeFormUpdated($formNew);
        $this->assertTrue(get_class($response_fake) == get_class($resultNew));

    }

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_forms_forms_update_form_action_no_name
     * @return void
     */
    public function domain_forms_forms_update_form_action_no_name()
    {
        $data = array(
            'name' => 'asdf',
            'title' => $this->faker->name,
            'description' => $this->faker->name);
        $action = new StoreFormAction($data);
        $result = $action->execute();

        $form = $result->object;

        $dataUpdate = array(
            'title' => 'hola2',
            'description' => 'hola33');
        $actionUpdate = new UpdateFormAction($form, $dataUpdate);
        $resultNew = $actionUpdate->execute();
        $formUpdated = $resultNew->object;


        $this->assertDatabaseHas($formUpdated->getTable(), [
            'name' => 'asdf',
            'title' => 'hola2',
            'description' => 'hola33'

        ]);

        $formNew = new Form();
        $response_fake = new ResponseCodeFormUpdated($formNew);
        $this->assertTrue(get_class($response_fake) == get_class($resultNew));

    }

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_forms_forms_update_form_action_no_description
     * @return void
     */
    public function domain_forms_forms_update_form_action_no_description()
    {
        $data = array(
            'name' => $this->faker->name,
            'title' => $this->faker->name,
            'description' => 'asdf');
        $action = new StoreFormAction($data);
        $result = $action->execute();

        $form = $result->object;

        $dataUpdate = array(
            'name' => 'hola2',
            'title' => 'hola33');
        $actionUpdate = new UpdateFormAction($form, $dataUpdate);
        $resultNew = $actionUpdate->execute();
        $formUpdated = $resultNew->object;


        $this->assertDatabaseHas($formUpdated->getTable(), [
            'description' => 'asdf',
            'name' => 'hola2',
            'title' => 'hola33'

        ]);

        $formNew = new Form();
        $response_fake = new ResponseCodeFormUpdated($formNew);
        $this->assertTrue(get_class($response_fake) == get_class($resultNew));

    }

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_forms_forms_update_form_action_no_title
     * @return void
     */
    public function domain_forms_forms_update_form_action_no_title()
    {
        $data = array(
            'name' => $this->faker->name,
            'title' => 'asdf',
            'description' => $this->faker->name);
        $action = new StoreFormAction($data);
        $result = $action->execute();

        $form = $result->object;

        $dataUpdate = array(
            'name' => 'hola2',
            'description' => 'hola33');
        $actionUpdate = new UpdateFormAction($form, $dataUpdate);
        $resultNew = $actionUpdate->execute();
        $formUpdated = $resultNew->object;


        $this->assertDatabaseHas($formUpdated->getTable(), [
            'title' => 'asdf',
            'name' => 'hola2',
            'description' => 'hola33'

        ]);

        $formNew = new Form();
        $response_fake = new ResponseCodeFormUpdated($formNew);
        $this->assertTrue(get_class($response_fake) == get_class($resultNew));

    }

}
