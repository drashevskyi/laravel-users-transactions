<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use OrderStatusSeeder;
use App\Models\User;

class UserControllerTest extends TestCase
{   
    /**
     * Delete user test test.
     *
     * @return void
     */
    public function testDestroy()
    {                
        $testUsers = User::where('email', 'LIKE', 'test_user_details%')->get();
        
        foreach ($testUsers as $testUser) {
            if (is_null($testUser->userDeatails)) {
                //user without UserDetails
                $response = $this->get('/user/delete/'.$testUser->id);
                $this->assertEquals(404, $response->getStatusCode());
            } else {
                //user with UserDetails
                $response = $this->get('/user/delete/'.$testUser->id);
                $this->assertEquals(302, $response->getStatusCode());
                $this->assertDatabaseMissing('users', [
                    'id' => $testUser->id,
                ]);
            }
        }
    }
}