<?php

namespace Tests\Feature\Domain\Users\Users;

use Domain\Users\Models\User;
use Domain\Users\User\Actions\StoreUserAction;
use Domain\Users\User\Actions\UpdateUserAction;
use Domain\Users\User\ResponseCodes\ResponseCodeUserUpdated;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UpdateUserActionTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_users_users_update_user_action_ok
     * @return void
     */
    public function domain_users_users_update_user_action_ok()
    {
        $user = array(
            'name' => $this->faker->name,
            'surname' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'password' => 123456
        );

        $action = new StoreUserAction($user);
        $result = $action->execute();

        $user1 = $result->object;

        $data = array(
            'name' => 'hola',
            'surname' => 'adios',
            'email' => 'hola@mail.test',
            'password' => 12345
        );

        $action = new UpdateUserAction($user1, $data);
        $result = $action->execute($user1);

        $user = $result->object;

        $this->assertNotNull($user);

        $this->assertDatabaseHas($user->getTable(), [
            'id' => $user->id,
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],

        ]);

        $user = new User();
        $response_fake = new ResponseCodeUserUpdated($user);
        $this->assertTrue(get_class($response_fake) == get_class($result));
    }

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_users_users_update_user_action_no_name
     * @return void
     */
    public function domain_users_users_update_user_action_no_name()
    {
        $user = array(
            'name' => $this->faker->name,
            'surname' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'password' => 123456
        );

        $action = new StoreUserAction($user);
        $result = $action->execute();

        $user1 = $result->object;

        $data = array(

            'surname' => 'adios',
            'email' => 'hola@mail.test',
            'password' => 12345
        );

        $action = new UpdateUserAction($user1, $data);
        $result = $action->execute($user1);

        $user = $result->object;

        $this->assertNotNull($user);

        $this->assertDatabaseHas($user->getTable(), [
            'id' => $user->id,
            'name' => $user['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],

        ]);

        $user = new User();
        $response_fake = new ResponseCodeUserUpdated($user);
        $this->assertTrue(get_class($response_fake) == get_class($result));
    }

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_users_users_update_user_action_no_email
     * @return void
     */
    public function domain_users_users_update_user_action_no_email()
    {
        $user = array(
            'name' => $this->faker->name,
            'surname' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'password' => 123456
        );

        $action = new StoreUserAction($user);
        $result = $action->execute();

        $user1 = $result->object;

        $data = array(
            'name' => 'hola',
            'surname' => 'adios',
            'password' => 12345
        );

        $action = new UpdateUserAction($user1, $data);
        $result = $action->execute($user1);

        $user = $result->object;

        $this->assertNotNull($user);

        $this->assertDatabaseHas($user->getTable(), [
            'id' => $user->id,
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $user['email'],

        ]);

        $user = new User();
        $response_fake = new ResponseCodeUserUpdated($user);
        $this->assertTrue(get_class($response_fake) == get_class($result));
    }

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_users_users_update_user_action_no_surname
     * @return void
     */
    public function domain_users_users_update_user_action_no_surname()
    {
        $user = array(
            'name' => $this->faker->name,
            'surname' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'password' => 123456
        );

        $action = new StoreUserAction($user);
        $result = $action->execute();

        $user1 = $result->object;

        $data = array(
            'name' => 'hola',
            'email' => 'hola@test',
            'password' => 12345
        );

        $action = new UpdateUserAction($user1, $data);
        $result = $action->execute($user1);

        $user = $result->object;

        $this->assertNotNull($user);

        $this->assertDatabaseHas($user->getTable(), [
            'id' => $user->id,
            'name' => $data['name'],
            'surname' => $user['surname'],
            'email' => $data['email'],

        ]);

        $user = new User();
        $response_fake = new ResponseCodeUserUpdated($user);
        $this->assertTrue(get_class($response_fake) == get_class($result));
    }

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_users_users_update_user_action_no_password
     * @return void
     */
    public function domain_users_users_update_user_action_no_password()
    {
        $user = array(
            'name' => $this->faker->name,
            'surname' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'password' => 123456
        );

        $action = new StoreUserAction($user);
        $result = $action->execute();

        $user1 = $result->object;

        $data = array(
            'name' => 'hola',
            'email' => 'hola@test',
            'surname' => 'adios',
            'password' => ''
        );

        $action = new UpdateUserAction($user1, $data);
        $result = $action->execute($user1);

        $user = $result->object;

        $this->assertDatabaseHas($user->getTable(), [
            'id' => $user->id,
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],

        ]);
        $credentials = [
            'email' => $data['email'],
            'password' => 123456
        ];

        Auth::once($credentials);
        $this->assertAuthenticated();

        $user = new User();
        $response_fake = new ResponseCodeUserUpdated($user);
        $this->assertTrue(get_class($response_fake) == get_class($result));
    }

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_users_users_update_user_action_update_password
     * @return void
     */
    public function domain_users_users_update_user_action_update_password()
    {
        $user = array(
            'name' => $this->faker->name,
            'surname' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'password' => 123456
        );

        $action = new StoreUserAction($user);
        $result = $action->execute();

        $user1 = $result->object;

        $data = array(
            'name' => 'hola',
            'email' => 'hola@test',
            'surname' => 'adios',
            'password' => 22222
        );

        $action = new UpdateUserAction($user1, $data);
        $result = $action->execute($user1);

        $user = $result->object;

        $this->assertNotNull($user);

        $this->assertDatabaseHas($user->getTable(), [
            'id' => $user->id,
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],

        ]);
        $credentials = [
            'email' => $data['email'],
            'password' => 22222
        ];

        Auth::once($credentials);
        $this->assertAuthenticated();

        $user = new User();
        $response_fake = new ResponseCodeUserUpdated($user);
        $this->assertTrue(get_class($response_fake) == get_class($result));
    }

}
