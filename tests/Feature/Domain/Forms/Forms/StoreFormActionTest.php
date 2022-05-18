<?php

namespace Tests\Feature\Domain\Forms\Forms;

use Domain\Forms\Forms\Actions\StoreFormAction;
use Domain\Forms\Forms\ResponseCodes\ResponseCodeFormStored;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use InvalidArgumentException;
use Tests\TestCase;

class StoreFormActionTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_forms_forms_store_form_action_ok
     * @return void
     */
    public function domain_forms_forms_store_form_action_ok()
    {
        $data = array(
            'name' => $this->faker->name,
            'title' => $this->faker->name,
            'description' => $this->faker->name);
        $action = new StoreFormAction($data);
        $result = $action->execute();

        $form = $result->object;
        $this->assertNotNull($form);

        $this->assertDatabaseHas($form->getTable(), [
            'id' => $form->id
        ]);

        $response_fake = new ResponseCodeFormStored($form);
        $this->assertTrue(get_class($response_fake) == get_class($result));

    }

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_forms_forms_store_form_action_no_name
     * @return void
     */
    public function domain_forms_forms_store_form_action_no_name()
    {

        $data = array(

            'title' => $this->faker->name,
            'description' => $this->faker->name);

        $this->expectException(InvalidArgumentException::class);

        $action = new StoreFormAction($data);

        $result = $action->execute();

    }

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_forms_forms_store_form_action_no_title
     * @return void
     */
    public function domain_forms_forms_store_form_action_no_title()
    {

        $data = array(
            'name' => $this->faker->name,
            'description' => $this->faker->name);

        $this->expectException(InvalidArgumentException::class);

        $action = new StoreFormAction($data);

        $result = $action->execute();

    }

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_forms_forms_store_form_action_no_description
     * @return void
     */
    public function domain_forms_forms_store_form_action_no_description()
    {

        $data = array(
            'name' => $this->faker->name,
            'title' => $this->faker->name,
        );

        $this->expectException(InvalidArgumentException::class);

        $action = new StoreFormAction($data);

        $result = $action->execute();

    }
}
