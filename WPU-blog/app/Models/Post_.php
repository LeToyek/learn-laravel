<?php

namespace App\Models;

class Post 
{
    private static $tweet_posts = [
        [
            "title" => "Menjadi Kaya",
            "slug" => "menjadi-kaya",
            "author" => "Handoko Tjung",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure cum labore minus et illo quaerat obcaecati, velit tenetur molestiae id maxime, deserunt provident temporibus totam illum quos facilis officia rem repellendus. Explicabo iusto neque alias, laborum at, tempore earum magni consequuntur eius veniam atque illo. Ducimus reiciendis quisquam aliquam fuga voluptates! Laboriosam tempora at eligendi voluptatum commodi obcaecati esse iste illo explicabo nobis doloremque, error unde labore ad eaque non nisi ipsam mollitia excepturi! Doloribus qui hic voluptate commodi ea exercitationem rem eos quibusdam voluptatum eaque, libero aspernatur officia beatae distinctio debitis aliquid. Labore architecto consectetur numquam. Quisquam dignissimos repudiandae quas eligendi rem, non necessitatibus accusantium corporis adipisci pariatur vel minima voluptates eveniet fugit itaque nulla explicabo deleniti! Hic qui, voluptates sit harum nemo assumenda repudiandae sequi nisi. Officiis ullam fugiat, odio et fuga sit. Quae quidem quibusdam, doloremque atque nam cum dolore, nobis repellendus aperiam, aliquam voluptatum alias. Impedit aliquid blanditiis obcaecati laudantium amet deleniti omnis! Ipsam dolor aspernatur, autem delectus qui provident perferendis laborum. Suscipit nihil dignissimos quo ex. Quas itaque deserunt adipisci minus illum facere tempore sunt. Fugit optio similique dolore, dignissimos vitae ex sint corrupti earum ad repellendus sed facilis at vel mollitia aliquid nam nostrum!"
        ],
        [
            "title" => "Menjadi Miskin",
            "slug" => "menjadi-miskin",
            "author" => "Handoko",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure cum labore minus et illo quaerat obcaecati, velit tenetur molestiae id maxime, deserunt provident temporibus totam illum quos facilis officia rem repellendus. Explicabo iusto neque alias, laborum at, tempore earum magni consequuntur eius veniam atque illo. Ducimus reiciendis quisquam aliquam fuga voluptates! Laboriosam tempora at eligendi voluptatum commodi obcaecati esse iste illo explicabo nobis doloremque, error unde labore ad eaque non nisi ipsam mollitia excepturi! Doloribus qui hic voluptate commodi ea exercitationem rem eos quibusdam voluptatum eaque, libero aspernatur officia beatae distinctio debitis aliquid. Labore architecto consectetur numquam. Quisquam dignissimos repudiandae quas eligendi rem, non necessitatibus accusantium corporis adipisci pariatur vel minima voluptates eveniet fugit itaque nulla explicabo deleniti! Hic qui, voluptates sit harum nemo assumenda repudiandae sequi nisi. Officiis ullam fugiat, odio et fuga sit. Quae quidem quibusdam, doloremque atque nam cum dolore, nobis repellendus aperiam, aliquam voluptatum alias. Impedit aliquid blanditiis obcaecati laudantium amet deleniti omnis! Ipsam dolor aspernatur, autem delectus qui provident perferendis laborum. Suscipit nihil dignissimos quo ex. Quas itaque deserunt adipisci minus illum facere tempore sunt. Fugit optio similique dolore, dignissimos vitae ex sint corrupti earum ad repellendus sed facilis at vel mollitia aliquid nam nostrum!"
        ],
        [
            "title" => "Menjadi jadi",
            "slug" => "menjadi-jadi",
            "author" => "Handoko Tjung",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure cum labore minus et illo quaerat obcaecati, velit tenetur molestiae id maxime, deserunt provident temporibus totam illum quos facilis officia rem repellendus. Explicabo iusto neque alias, laborum at, tempore earum magni consequuntur eius veniam atque illo. Ducimus reiciendis quisquam aliquam fuga voluptates! Laboriosam tempora at eligendi voluptatum commodi obcaecati esse iste illo explicabo nobis doloremque, error unde labore ad eaque non nisi ipsam mollitia excepturi! Doloribus qui hic voluptate commodi ea exercitationem rem eos quibusdam voluptatum eaque, libero aspernatur officia beatae distinctio debitis aliquid. Labore architecto consectetur numquam. Quisquam dignissimos repudiandae quas eligendi rem, non necessitatibus accusantium corporis adipisci pariatur vel minima voluptates eveniet fugit itaque nulla explicabo deleniti! Hic qui, voluptates sit harum nemo assumenda repudiandae sequi nisi. Officiis ullam fugiat, odio et fuga sit. Quae quidem quibusdam, doloremque atque nam cum dolore, nobis repellendus aperiam, aliquam voluptatum alias. Impedit aliquid blanditiis obcaecati laudantium amet deleniti omnis! Ipsam dolor aspernatur, autem delectus qui provident perferendis laborum. Suscipit nihil dignissimos quo ex. Quas itaque deserunt adipisci minus illum facere tempore sunt. Fugit optio similique dolore, dignissimos vitae ex sint corrupti earum ad repellendus sed facilis at vel mollitia aliquid nam nostrum!"
        ],
    ];

    public static function all(){
        return collect(self::$tweet_posts);
    }
    public static function find($slug){
        $tweets = static::all();

        return $tweets->firstWhere('slug',$slug);
    }
}