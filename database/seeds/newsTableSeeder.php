<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class newsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for($i = 0; $i < 10;$i++){
            DB::table('news')->insert(
             [
                'title' => 'Vụ thi thể nữ sinh lớp 6 nổi trên đập nước: Bà nội đề xuất được gặp con trai để nói rõ lý do sát hại cháu, cho rằng bố con nạn nhân hỗn láo',
                'description' => 'Mặc dù đi làm ăn xa nhưng một số lần về quê giữa hai mẹ con xảy ra bất đồng khiến bà Hường căm phẫn. Người bà nội này còn cho rằng cháu T. cũng hỗn láo nên nảy sinh ý định sát hại.',
                'image' => 'https://kenh14cdn.com/thumb_w/620/2019/11/7/c1-15730870687381534019593.jpg',
                'content' => 'Đối tượng nhờ cháu T. chở vào khu vực đập nước Bàu Ganh để tắm rồi bảo cháu cọ lưng cho rồi lợi dụng bất cẩn, bà Hường đã xô cháu T. xuống nước.
                21h cùng ngày, người đàn bà này tiếp tục bắt xe ra Hà Nội để làm giúp việc bình thường như chưa có chuyện gì xảy ra.',
                'author' => 'Vân Anh',
                'idCategory' => '1'
            ]


        );
        }

    }
}
