<?php

namespace Tests\Feature\Domain\Forms\FormQuestions;

use Domain\Forms\FormQuestion\Actions\StoreOptionsAction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreOptionActionTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_forms_form_questions_store_option_action_ok
     * @return void
     */
    public function domain_forms_form_questions_store_option_action_ok()
    {
        $data = [
            'option' => 'sadsffafdddd'
        ];

        $action = new StoreOptionsAction($data);
        $result = $action->execute();

        $option = $result->object;
        $this->assertNotNull($option);
        $this->assertDatabaseHas($option->getTable(), [
            'option' => 'sadsffafdddd'
        ]);
    }
}
