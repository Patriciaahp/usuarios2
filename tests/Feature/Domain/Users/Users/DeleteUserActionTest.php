<?php

namespace Tests\Feature\Domain\Users\Users;

use Domain\Users\Users\Actions\DeleteUserAction;
use Domain\Users\Users\Actions\StoreUserAction;
use Domain\Users\Users\ResponseCodes\ResponseCodeUserDeleted;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteUserActionTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_users_users_delete_user_action_ok
     * @return void
     */
    public function domain_users_users_delete_user_action_ok()
    {
        $data = array(
            'name' => $this->faker->name,
            'surname' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'password' => 123456
        );

        $action = new StoreUserAction($data);
        $result = $action->execute();
        $user = $result->object;
        $delete = new DeleteUserAction($user);
        $response = $delete->execute();

        $response_fake = new ResponseCodeUserDeleted();
        $this->assertTrue(get_class($response_fake) == get_class($response));

    }
}
