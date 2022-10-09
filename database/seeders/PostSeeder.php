<?php
    namespace Database\Seeders;


    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;
    use Carbon\Carbon;

    class PostSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {

        }
    public function runaaa()
    {
        $created_at = Carbon::now(); // or now()
        $length = 200;
        DB::table('posts')->insert([
            'title'         => 'My First Post',
            'slug'          => 'my-first-post',
            'author_id'      => 1,
            'category_id'   => 1,
            'excerpt'        => getRandomText($length),
            'content'       => getRandomText(),
            'created_at'  => $created_at,
            'updated_at' => ''
        ]);

        DB::table('posts')->insert([
            'title'      => 'My Second Post',
            'slug'     => 'my-second-post',
            'author_id' => 2,
            'category_id' => 2,
            'excerpt' => getRandomText($length),
            'content' => getRandomText(),
            'created_at' => $created_at,
            'updated_at' => ''
        ]);
        DB::table('posts')->insert([
            'title'      => 'Laravel Tutorial Post',
            'slug'     => 'laravel-tutorial-post',
            'author_id' => 3,
            'category_id' => 2,
            'excerpt' => getRandomText($length),
            'content' => getRandomText(),
            'created_at' => $created_at,
            'updated_at' => ''
        ]);
        DB::table('posts')->insert([
            'title'      => 'Laravel  Post',
            'slug'     => 'laravel-post',
            'author_id' => 3,
            'category_id' => 2,
            'excerpt' => getRandomText($length),
            'content' => getRandomText(),
            'created_at' => $created_at,
            'updated_at' => ''
        ]);
        DB::table('posts')->insert([
            'title'      => 'Laravel  Post High Level',
            'slug'     => 'laravel-post-high-level',
            'author_id' => 3,
            'category_id' => 2,
            'excerpt' =>getRandomText($length),
            'content' =>getRandomText(),
            'created_at' => $created_at,
            'updated_at' => ''
        ]);

    }

    }
    function getRandomText($leng= 0){
        $args = array(
            "Various versions have evolved over the years, sometimes by accident, sometimes on purpose. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Various versions have evolved over the years, sometimes by accident, sometimes on purpose",
            "Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet.\", comes from a line in section 1.10.32. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.",
            "On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.",
            "Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Laravel includes the ability to seed your database with data using seed classes. All seed classes are stored in the database/seeders directory. By default, a DatabaseSeeder class is defined for you. From this class, you may use the call method to run other seed classes, allowing you to control the seeding order. Laravel includes the ability to seed your database with data using seed classes. All seed classes are stored in the database/seeders directory. By default, a DatabaseSeeder class is defined for you. From this class, you may use the call method to run other seed classes, allowing you to control the seeding order.",
            "Laravel includes the ability to seed your database with data using seed classes. All seed classes are stored in the database/seeders directory. By default, a DatabaseSeeder class is defined for you. From this class, you may use the call method to run other seed classes, allowing you to control the seeding order. Laravel includes the ability to seed your database with data using seed classes. All seed classes are stored in the database/seeders directory. By default, a DatabaseSeeder class is defined for you. From this class, you may use the call method to run other seed classes, allowing you to control the seeding order.On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided,"

        );
        $text = $args[rand(0,3)];
        if($leng){
            return substr($text , 0, $leng);;
        }
        return $text;
    }
