<?php

use Illuminate\Database\Seeder;

class Qltv_NxbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //mượn thư viện faker để tạo dữ liệu ảo
        $faker =Faker\Factory::create('vi_VN'); //location ISO
        $list = [];
        $types = ["Nhà xuất bản Kim Đồng", "Nhà xuất bản Trẻ", "Nhà xuất bản Tổng hợp thành phố Hồ Chí Minh", "Nhà xuất bản chính trị quốc gia", "Nhà xuất bản giáo dục", "Nhà xuất bản Hội Nhà văn", "Nhà xuất bản Tư pháp", "Nhà xuất bản thông tin và truyền thông", "Nhà xuất bản lao động", "Nhà xuất bản giao thông vận tải"];
        sort($types);
        $today = new DateTime('2019-01-01 08:00:00');
        for ($i=1; $i <= 5; $i++) {
            array_push($list, [
                'id'        => $i,
                'manxb'     => 'NXB'.$i,
                'tennxb'    => $types[$i-1]
            ]);
        }
        DB::table('qltv_nxb')->insert($list);
    }
}
