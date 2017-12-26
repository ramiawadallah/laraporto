<?php

use Illuminate\Database\Seeder;
use App\Setting;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Control::store(request(),'setting',[
                'id'                => '1',
                 // website contact information
                'email'             => 'info@owlcms.com',
                'phone'             => '+962 7 9896 1076', 
                'address'           => 'Amman - Jordan',
                'fax'               => '+962 7 9896 1076',
                'pobox'             => '7112',
                'map'               => 'https://www.google.jo/maps/@31.8357604,35.9476308,10z?hl=en',

                // About your website   
                'translate'         => [ 
                    'title'         => 'OwlCMS',
                    'subtitle'      => 'Owl CMS',
                    'desc'          => 'Why do we use it?
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
                ],
                
                'maintenance'       => 'open',

                // Photo Logo for Home page website
                'photo'             => 'logo.png',
                
                // Social media 
                'facebook'          => 'https://www.facebook.com',
                'twitter'           => 'https://www.twitter.com',
                'instagram'         => 'https://www.instagram.com',
                'linkedin'          => 'https://www.linkedin.com',
                'youtube'           => 'https://www.youtube.com',
                'updated_by'        => 'Admin',
            ]);	
        

       
    }
}
