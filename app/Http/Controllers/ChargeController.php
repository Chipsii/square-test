<?php

namespace App\Http\Controllers;

use App\Models\User;
use Nikolag\Square\Facades\Square;
use Nikolag\Square\Models\Customer;

class ChargeController extends Controller
{
    public function createCustomer()
    {
        $customerArr = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'company_name' => 'Acme',
            'nickname' => 'JD',
            'email' => '5fI8v@example.com',
            'phone' => '555-555-5555',
            'note' => 'This is a note.',
        ];

        $customer = new Customer($customerArr);
        $customer->save();

        return response()->json(compact($customer, 200));
    }

    public function createCharge()
    {
        $transaction = Square::charge([
            'amount' => 100,
            'card_nonce' => 'xxxxxxxxxxxxxxxxxxxxxx',
            'location_id' => 'xxxxxxxxxxxxxxxxxxx',
            'currency' => 'USD',
        ]);

        return response()->json(compact($transaction));
    }

    public function chargeWithMarchant(User $merchant)
    {
        $transaction = Square::setMerchant($merchant)
            ->charge([
                'amount' => 100,
                'card_nonce' => 'xxxxxxxxxxxxxxxxxxxxxx',
                'location_id' => $merchant->square_location_id,
                'currency' => 'USD',
            ]);
        return response()->json(compact($transaction));
    }

    public function chargeWithCustomer(Customer $customer)
    {
        $transaction = Square::setCustomer($customer)
            ->charge([
                'amount' => 100,
                'card_nonce' => 'xxxxxxxxxxxxxxxxxxxxxx',
                'location_id' => $customer->location_id,
                'currency' => 'USD',
            ]);
        return response()->json(compact($transaction));
    }

    public function chargeWithCustomerAndMerchant(Customer $customer, User $merchant)
    {
        $transaction = Square::setMerchant($merchant)
            ->setCustomer($customer)
            ->charge([
                'amount' => 100,
                'card_nonce' => 'xxxxxxxxxxxxxxxxxxxxxx',
                'location_id' => 'xxxxxxxxxxxxxxxxxxx',
                'currency' => 'USD',
            ]);
        return response()->json(compact($transaction));
    }
}
