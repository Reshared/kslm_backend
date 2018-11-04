<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Setting::insert([
            [
                'skey' => 'logo',
                'svalue' => '',
                'stype' => 'image',
                'sdesc' => '企业logo',
            ], [
                'skey' => 'wechat_qrcode',
                'svalue' => '',
                'stype' => 'image',
                'sdesc' => '微信二维码',
            ], [
                'skey' => 'top_words',
                'svalue' => '',
                'stype' => 'string',
                'sdesc' => '顶部欢迎语',
            ], [
                'skey' => 'qa_tel',
                'svalue' => '',
                'stype' => 'string',
                'sdesc' => '咨询电话',
            ], [
                'skey' => 'company_des_imgs',
                'svalue' => '',
                'stype' => 'images',
                'sdesc' => '公司简介底部图',
            ], [
                'skey' => 'contact_way',
                'svalue' => json_encode([
                    '公司名称' => '百年老店',
                    '简介' => '我们是一家百年老店',
                    '统一服务热线' => '0312-029102',
                    '北京代表处' => '北京大兴代表处',
                    '邮箱' => '88888888@qq.com',
                    '地址' => '北京大型',
                    '经度' => '116.314955',
                    '纬度' => '39.675723',
                ]),
                'stype' => 'strings',
                'sdesc' => '联系方式',
            ],
        ]);
    }
}
