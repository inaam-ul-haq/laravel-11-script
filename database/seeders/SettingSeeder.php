<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = new Setting();

        $setting->name = "Snesar";
        $setting->url = "https://my-work.local/web/sensar/public";
        $setting->email = "admin@gmail.com";

        $setting->google_active = 1;
        $setting->google_api_key = env('googleapi');
        $setting->google_api_secret = env('googlesecret');
        $setting->google_redirect_url = env('googleredirect');

        $setting->github_active = 1;
        $setting->github_api_key = env('githubapi');
        $setting->github_api_secret = env('githubapi');
        $setting->github_redirect_url = env('githubapi');

        $setting->facebook_active = 1;
        $setting->facebook_api_key = env('facebookapi');
        $setting->facebook_api_secret = env('facebookapi');
        $setting->facebook_redirect_url = env('facebookapi');

        $setting->twitter_active = 1;
        $setting->twitter_api_key = env('twitterapi');
        $setting->twitter_api_secret = env('twitterapi');
        $setting->twitter_redirect_url = env('twitterapi');

        $setting->smtp_host = env('MAIL_HOST');
        $setting->smtp_port = env('MAIL_PORT');
        $setting->smtp_username = env('MAIL_USERNAME');
        $setting->smtp_password = env('MAIL_PASSWORD');
        $setting->smtp_email = "admin@gmail.com";
        $setting->smtp_sender_name = 'LaraAi';
        $setting->smtp_encryption = 'tls';

        $setting->save();
        $setting->file()->create(['name' => 'logo.svg', 'path' => 'settings/logo.svg', 'type' => 'logo']);
    }
}
