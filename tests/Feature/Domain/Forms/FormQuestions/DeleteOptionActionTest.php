<?php

namespace Tests\Feature\Domain\Forms\FormQuestions;

use Domain\Forms\FormQuestion\Actions\DeleteOptionAction;
use Domain\Forms\FormQuestion\Actions\StoreOptionsAction;
use Domain\Forms\FormQuestion\ResponseCodes\ResponseCodeOptionDeleted;
use Tests\TestCase;

class DeleteOptionActionTest extends TestCase
{
    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_forms_form_questions_delete_option_action_ok
     * @return void
     */
    public function domain_forms_form_questions_delete_option_action_ok()
    {
        $data = [
            'option' => 'sadsffafdddd'
        ];

        $action = new StoreOptionsAction($data);
        $result = $action->execute();

        $option = $result->object;
        $this->assertNotNull($option);

        $delete = new DeleteOptionAction($option);
        $response = $delete->execute();
        $response_fake = new ResponseCodeOptionDeleted();
        $this->assertTrue(get_class($response_fake) == get_class($response));

        $this->assertDatabaseCount($option->getTable(), 0);
    }
}
