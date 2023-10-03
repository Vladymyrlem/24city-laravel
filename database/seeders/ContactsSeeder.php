<?php

    namespace Database\Seeders;

    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class ContactsSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {

            $contacts = [
                [
                    "company_id" => 57,
                    "contacts_phone" => "+38(0462)933-944"
                ],
                [
                    "company_id" => 1968,
                    "contacts_phone" => "+38(0462)651-966"
                ],
                [
                    "company_id" => 1968,
                    "contacts_phone" => "+38(0462)675-031"
                ],
                [
                    "company_id" => 1968,
                    "contacts_phone" => "+38(0462)651-979"
                ],
                [
                    "company_id" => 1968,
                    "contacts_phone" => "+38(0462) 651-286"
                ],
                [
                    "company_id" => 4062,
                    "contacts_phone" => "+38(093)203-09-59"
                ],
                [
                    "company_id" => 4074,
                    "contacts_phone" => "+38(098)602-39-06"
                ],
                [
                    "company_id" => 4075,
                    "contacts_phone" => "(050) 863-04-30|(093)"
                ],
                [
                    "company_id" => 4075,
                    "contacts_phone" => "(093) 913-99-69"
                ],
                [
                    "company_id" => 4075,
                    "contacts_phone" => "(0462) 611-937"
                ],
                [
                    "company_id" => 4078,
                    "contacts_phone" => "068 137 37 87"
                ],
                [
                    "company_id" => 4078,
                    "contacts_phone" => "063 235 08 05"
                ],
                [
                    "company_id" => 4080,
                    "contacts_phone" => "+38 096 563 93 29"
                ],
                [
                    "company_id" => 4080,
                    "contacts_phone" => "+38 063 702 07 41"
                ],
                [
                    "company_id" => 4085,
                    "contacts_phone" => "+38(096)184-25-71"
                ]
            ];
            foreach ($contacts as $contact) {

                DB::table('contacts')->insert([
                    'company_id' => $contact['company_id'],
                    'contacts_phone' => $contact['contacts_phone'],
                    'contacts_comment_to_phone' => NULL,
                    'contacts_fax' => NULL,
                    'created_at' => now('Europe/Kiev'),
                    'updated_at' => now('Europe/Kiev')
                ]);
            }
        }

    }
