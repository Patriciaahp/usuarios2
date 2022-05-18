<?php

namespace Tests\Feature\Domain\Forms\FormQuestions;

use Tests\TestCase;

class StoreFormQuestionActionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
