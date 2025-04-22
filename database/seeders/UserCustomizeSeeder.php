<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserCustomizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch users with NULL or empty custom_id
        $users = User::whereNull('custom_id')->orWhere('custom_id', '')->get();

        foreach ($users as $user) {
            // Generate a unique custom_id for each user
            $user->custom_id = $this->generateUniqueId();
            $user->save();
        }
    }

    /**
     * Generate a unique 7-digit ID.
     *
     * @return string
     */
    private function generateUniqueId(): string
    {
        do {
            // Generate a random 7-digit number
            $id = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);
        } while (User ::where('custom_id', $id)->exists()); // Ensure it's unique

        return $id;
    }
}