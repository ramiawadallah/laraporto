<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'admin',
            'email'     => 'admin@owlcms.com',
            'password'  => bcrypt(123456),
            'phone'     => '+021207687151',
            'rule'      => 'admin',
            'info'      => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.',
            'gender'    => 'male',
            ]);

        User::create([
            'name'      => 'editor',
            'email'     => 'editor@owlcms.com',
            'password'  => bcrypt(123456),
            'phone'     => '+021207687151',
            'rule'      => 'editor',
            'info'      => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.',
            'gender'    => 'male',
            ]);

        User::create([
            'name'      => 'user',
            'email'     => 'user@owlcms.com',
            'password'  => bcrypt(123456),
            'phone'     => '+021207687151',
            'rule'      => 'user',
            'info'      => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.',
            'gender'    => 'male',
        ]);
    }
}
