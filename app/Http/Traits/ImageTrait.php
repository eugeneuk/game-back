<?php
namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait ImageTrait{

    public $file_name = '/images/avatars/';
    public $file_path = 'public/images/avatars/';


    public function fileBase64Upload(Request $request)
    {
        $data = $request->image;
        // File is coming in Base64 coding, so we need to convert it
        $data = $this->makeImageFromBas64($data);

        $file_name = $this->makeCircleAndSave($data);

        return [
            'image' => $this->file_name . $file_name,
            'image_name' => $file_name
        ];
    }



    public function makeCircleAndSave($data)
    {
        $img = Image::make($data);

        $path = storage_path('app')."/";

        $img->encode('png');

        // create empty canvas
        $width = $img->getWidth();
        $height = $img->getHeight();
        $mask = \Image::canvas($width, $height);

        // draw a white circle
        $mask->circle($width, $width/2, $height/2, function ($draw) {
            $draw->background('#fff');
        });

        $img->mask($mask, false);

        $file_name = strtolower(md5(Str::random(10)) . '.' . 'png');

        $img->save($path. $this->file_path . $file_name);
        return $file_name;
    }

    // Decode base64
    protected function makeImageFromBas64($data)
    {
        if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {
            $data = substr($data, strpos($data, ',') + 1);
            $type = strtolower($type[1]); // jpg, png, gif

            if (!in_array($type, ['jpg', 'jpeg', 'gif', 'png'])) {
                throw new \Exception('invalid image type');
            }
            $data = str_replace(' ', '+', $data);
            $data = base64_decode($data);

            if ($data === false)
                throw new \Exception('base64_decode failed');

            return $data;

        } else {
            throw new \Exception('did not match data URI with image data');
        }
    }


}
