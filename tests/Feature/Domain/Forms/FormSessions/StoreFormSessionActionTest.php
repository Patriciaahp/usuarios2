<?php

namespace Tests\Feature\Domain\Forms\FormSessions;

use Domain\Forms\Forms\Actions\StoreFormAction;
use Domain\Forms\FormSessions\Actions\StoreFormSessionAction;
use Domain\Forms\FormSessions\ResponseCodes\ResponseCodeFormSessionStored;
use Domain\Forms\Models\FormSession;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreFormSessionActionTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_forms_form_sessions_store_form_session_action_ok
     * @return void
     */
    public function domain_forms_form_sessions_store_form_session_action_ok()
    {
        $data = array(
            'name' => $this->faker->name,
            'title' => $this->faker->name,
            'description' => $this->faker->name);
        $action = new StoreFormAction($data);
        $result = $action->execute();

        $form = $result->object;

        $data2 = array(
            'form_id' => $form->id
        );
        $action = new StoreFormSessionAction($data2);
        $result = $action->execute();

        $session = $result->object;

        $this->assertNotNull($session);

        $this->assertDatabaseHas($session->getTable(), [
            'id' => $session->id
        ]);
        $session = new FormSession();
        $response_fake = new ResponseCodeFormSessionStored($session);
        $this->assertTrue(get_class($response_fake) == get_class($result));
    }
}
