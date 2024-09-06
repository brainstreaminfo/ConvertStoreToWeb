<?php

namespace Webkul\ConvertStoreToWeb\Database\Seeders\CMS;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Webkul\Installer\Database\Seeders\CMS\CMSPagesTableSeeder as BaseCMSPagesTableSeeder;

class CMSPagesTableSeeder extends BaseCMSPagesTableSeeder
{
    /**
     * Seed the application's database.
     *
     * @param  array  $parameters
     * @return void
     */
    public function run($parameters = [])
    {
        DB::table('cms_pages')->delete();

        DB::table('cms_page_translations')->delete();

        $defaultLocale = $parameters['default_locale'] ?? config('app.locale');

        DB::table('cms_pages')->insert([
            [
                'id'         => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'id'         => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'id'         => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'id'         => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'id'         => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'id'         => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'id'         => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'id'         => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'id'         => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'id'         => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        $locales = $parameters['allowed_locales'] ?? [$defaultLocale];

        foreach ($locales as $locale) {
            DB::table('cms_page_translations')->insert([
                [
                    'locale'           => $locale,
                    'cms_page_id'      => 1,
                    'url_key'          => 'about-us',
                    'html_content'     => '<div class="static-container"><div class="mb-5">'.trans('installer::app.seeders.cms.pages.about-us.content', [], $locale).'</div></div>',
                    'page_title'       => trans('installer::app.seeders.cms.pages.about-us.title', [], $locale),
                    'meta_title'       => 'about us',
                    'meta_description' => '',
                    'meta_keywords'    => 'aboutus',
                ], [
                    'locale'           => $locale,
                    'cms_page_id'      => 2,
                    'url_key'          => 'terms-conditions',
                    'html_content'     => '<div class="static-container"><div class="mb-5">'.trans('installer::app.seeders.cms.pages.terms-conditions.content', [], $locale).'</div></div>',
                    'page_title'       => trans('installer::app.seeders.cms.pages.terms-conditions.title', [], $locale),
                    'meta_title'       => 'Terms & Conditions',
                    'meta_description' => '',
                    'meta_keywords'    => 'term, conditions',
                ], [
                    'locale'           => $locale,
                    'cms_page_id'      => 3,
                    'url_key'          => 'terms-of-use',
                    'html_content'     => '<div class="static-container"><div class="mb-5">'.trans('installer::app.seeders.cms.pages.terms-of-use.content', [], $locale).'</div></div>',
                    'page_title'       => trans('installer::app.seeders.cms.pages.terms-of-use.title', [], $locale),
                    'meta_title'       => 'Terms of use',
                    'meta_description' => '',
                    'meta_keywords'    => 'term, use',
                ], [
                    'locale'           => $locale,
                    'cms_page_id'      => 4,
                    'url_key'          => 'services',
                    'html_content'     => '<div class="static-container"><div class="mb-5">'.trans('convertstoretoweb::app.convertstoretoweb.footerpages.services', [], $locale).'</div></div>',
                    'page_title'       => trans('convertstoretoweb::app.convertstoretoweb.footerpages.services', [], $locale),
                    'meta_title'       => 'Customer Service',
                    'meta_description' => '',
                    'meta_keywords'    => 'customer, service',
                ], [
                    'locale'           => $locale,
                    'cms_page_id'      => 5,
                    'url_key'          => 'whats-new',
                    'html_content'     => '<div class="static-container"><div class="mb-5">'.trans('installer::app.seeders.cms.pages.whats-new.content', [], $locale).'</div></div>',
                    'page_title'       => trans('installer::app.seeders.cms.pages.whats-new.title', [], $locale),
                    'meta_title'       => 'What\'s New',
                    'meta_description' => '',
                    'meta_keywords'    => 'new',
                ], [
                    'locale'           => $locale,
                    'cms_page_id'      => 6,
                    'url_key'          => 'our-story',
                    'html_content'     => '<div class="static-container"><div class="mb-5">'.trans('convertstoretoweb::app.convertstoretoweb.footerpages.our-story', [], $locale).'</div></div>',
                    'page_title'       => trans('convertstoretoweb::app.convertstoretoweb.footerpages.our-story', [], $locale),
                    'meta_title'       => 'Our Story',
                    'meta_description' => '',
                    'meta_keywords'    => 'our, story',
                ], [
                    'locale'           => $locale,
                    'cms_page_id'      => 7,
                    'url_key'          => 'team',
                    'html_content'     => '<div class="static-container"><div class="mb-5">'.trans('convertstoretoweb::app.convertstoretoweb.footerpages.team', [], $locale).'</div></div>',
                    'page_title'       => trans('convertstoretoweb::app.convertstoretoweb.footerpages.team', [], $locale),
                    'meta_title'       => 'Team',
                    'meta_description' => '',
                    'meta_keywords'    => 'team',
                ], [
                    'locale'           => $locale,
                    'cms_page_id'      => 8,
                    'url_key'          => 'award',
                    'html_content'     => '<div class="static-container"><div class="mb-5">'.trans('convertstoretoweb::app.convertstoretoweb.footerpages.award', [], $locale).'</div></div>',
                    'page_title'       => trans('convertstoretoweb::app.convertstoretoweb.footerpages.award', [], $locale),
                    'meta_title'       => 'Award',
                    'meta_description' => '',
                    'meta_keywords'    => 'award',
                ], [
                    'locale'           => $locale,
                    'cms_page_id'      => 9,
                    'url_key'          => 'products',
                    'html_content'     => '<div class="static-container"><div class="mb-5">'.trans('convertstoretoweb::app.convertstoretoweb.footerpages.products', [], $locale).'</div></div>',
                    'page_title'       => trans('convertstoretoweb::app.convertstoretoweb.footerpages.products', [], $locale),
                    'meta_title'       => 'Products',
                    'meta_description' => '',
                    'meta_keywords'    => 'Products',
                ],
            ]);
        }
    }
}
