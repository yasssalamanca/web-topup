<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\DatabaseSeeder;
use App\Models\Transaction;

class TransactionFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Run the seeder to populate products and payment methods
        $this->seed(DatabaseSeeder::class);
    }

    public function test_user_can_checkout_topup()
    {
        $response = $this->postJson('/checkout', [
            'product_id' => 101, // Weekly Diamond Pass
            'target_id' => '12345678',
            'target_zone' => '1234',
            'payment_method_id' => 1, // QRIS
            'game' => 'mobile-legends',
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'success' => true,
                 ]);

        $this->assertDatabaseHas('transactions', [
            'product_id' => 101,
            'target_id' => '12345678',
            'target_zone' => '1234',
            'payment_method_id' => 1,
            'status' => 'pending',
        ]);
    }

    public function test_user_can_checkout_joki_with_dynamic_price()
    {
        $response = $this->postJson('/checkout', [
            'product_id' => 999, // Custom Joki
            'amount' => 40000,   // Dynamic Price
            'target_id' => '98765432',
            'target_zone' => '4321',
            'payment_method_id' => 2, // OVO
            'game' => 'mobile-legends',
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'success' => true,
                 ]);

        $this->assertDatabaseHas('transactions', [
            'product_id' => 999,
            'target_id' => '98765432',
            'target_zone' => '4321',
            'payment_method_id' => 2,
            'amount' => 40000,
            'status' => 'pending',
        ]);
    }

    public function test_user_can_simulate_payment()
    {
        // 1. Create a transaction first
        $checkoutResponse = $this->postJson('/checkout', [
            'product_id' => 101,
            'target_id' => 'user_test',
            'payment_method_id' => 1,
            'game' => 'mobile-legends',
        ]);

        $referenceId = $checkoutResponse->json('data.reference_id');

        $this->assertDatabaseHas('transactions', [
            'reference_id' => $referenceId,
            'status' => 'pending',
        ]);

        // 2. Simulate Payment
        $simulateResponse = $this->postJson("/api/simulate-payment/{$referenceId}");

        $simulateResponse->assertStatus(200)
                         ->assertJson([
                             'success' => true,
                         ]);

        $this->assertDatabaseHas('transactions', [
            'reference_id' => $referenceId,
            'status' => 'success',
        ]);
    }
}
