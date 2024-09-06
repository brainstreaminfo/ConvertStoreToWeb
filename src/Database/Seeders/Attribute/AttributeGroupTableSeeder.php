<?php

namespace Webkul\ConvertStoreToWeb\Database\Seeders\Attribute;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Webkul\Installer\Database\Seeders\Attribute\AttributeGroupTableSeeder as BaseAttributeGroupTableSeeder;

class AttributeGroupTableSeeder extends BaseAttributeGroupTableSeeder
{
    /**
     * Seed the application's database.
     *
     * @param  array  $parameters
     * @return void
     */
    public function run($parameters = [])
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('attribute_groups')->delete();

        DB::table('attribute_group_mappings')->delete();

        DB::table('attribute_groups')->delete();

        $defaultLocale = $parameters['default_locale'] ?? config('app.locale');

        DB::table('attribute_groups')->insert([
            [
                'id'                  => 1,
                'code'                => 'general',
                'name'                => trans('installer::app.seeders.attribute.attribute-groups.general', [], $defaultLocale),
                'column'              => 1,
                'is_user_defined'     => 0,
                'position'            => 1,
                'attribute_family_id' => 1,
            ], [
                'id'                  => 2,
                'code'                => 'description',
                'name'                => trans('installer::app.seeders.attribute.attribute-groups.description', [], $defaultLocale),
                'column'              => 1,
                'is_user_defined'     => 0,
                'position'            => 2,
                'attribute_family_id' => 1,
            ], [
                'id'                  => 3,
                'code'                => 'meta_description',
                'name'                => trans('installer::app.seeders.attribute.attribute-groups.meta-description', [], $defaultLocale),
                'column'              => 1,
                'is_user_defined'     => 0,
                'position'            => 3,
                'attribute_family_id' => 1,
            ], [
                'id'                  => 6,
                'code'                => 'settings',
                'name'                => trans('installer::app.seeders.attribute.attribute-groups.settings', [], $defaultLocale),
                'column'              => 2,
                'is_user_defined'     => 0,
                'position'            => 3,
                'attribute_family_id' => 1,
            ],
        ]);

        DB::table('attribute_group_mappings')->insert([
            /**
             * General Group Attributes
             */
            [
                'attribute_id'        => 1,
                'attribute_group_id'  => 1,
                'position'            => 1,
            ], [
                'attribute_id'        => 27,
                'attribute_group_id'  => 1,
                'position'            => 2,
            ], [
                'attribute_id'        => 2,
                'attribute_group_id'  => 1,
                'position'            => 3,
            ], [
                'attribute_id'        => 3,
                'attribute_group_id'  => 1,
                'position'            => 4,
            ], [
                'attribute_id'        => 23,
                'attribute_group_id'  => 1,
                'position'            => 6,
            ], [
                'attribute_id'        => 24,
                'attribute_group_id'  => 1,
                'position'            => 7,
            ], [
                'attribute_id'        => 25,
                'attribute_group_id'  => 1,
                'position'            => 8,
            ],

            /**
             * Description Group Attributes
             */
            [
                'attribute_id'        => 9,
                'attribute_group_id'  => 2,
                'position'            => 1,
            ], [
                'attribute_id'        => 10,
                'attribute_group_id'  => 2,
                'position'            => 2,
            ],

            /**
             * Settings Group Attributes
             */
            [
                'attribute_id'        => 5,
                'attribute_group_id'  => 6,
                'position'            => 1,
            ], [
                'attribute_id'        => 6,
                'attribute_group_id'  => 6,
                'position'            => 2,
            ], [
                'attribute_id'        => 7,
                'attribute_group_id'  => 6,
                'position'            => 3,
            ], [
                'attribute_id'        => 8,
                'attribute_group_id'  => 6,
                'position'            => 4,
            ], [
                'attribute_id'        => 26,
                'attribute_group_id'  => 6,
                'position'            => 5,
            ],

            /**
             * Price Group Attributes
             */
            [
                'attribute_id'        => 16,
                'attribute_group_id'  => 3,
                'position'            => 1,
            ], [
                'attribute_id'        => 17,
                'attribute_group_id'  => 3,
                'position'            => 2,
            ], [
                'attribute_id'        => 18,
                'attribute_group_id'  => 3,
                'position'            => 3,
            ],
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    }
}
