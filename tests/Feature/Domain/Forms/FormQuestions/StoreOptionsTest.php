<?php

namespace Tests\Feature\Domain\Forms\FormQuestions;

use Domain\Forms\FormQuestion\Actions\StoreOptionsAction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreOptionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
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
