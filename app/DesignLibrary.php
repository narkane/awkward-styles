<?php

namespace App;

use App\Http\Controllers\Api\DesignLibraryController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DesignLibrary extends Model
{
    protected $table = "design_library";


    protected $primaryKey = "user_id";

    protected $fillable = [
        'id', 'user_id', 'image_url'
    ];

    public function designPrints()
    {
        return $this->hasMany(
            'App\DesignPrints',
            'library_id',
            'id');
    }

    /**
     * Create or Update a library
     * @param Request $request
     * @return mixed
     */
    public static function createOrUpdate(Request $request)
    {
        // Verify we have all of the information

        /**
         * TODO: SET FILE MAX AND MIN IN ADMIN SETTINGS
         * @var int
         *
        $fileMax = 9999;
        $fileMin = 1000;


        // HANDLE FILE FIRST
        $file = $request->file('design');

        $inArr = in_array($file->getMimeType(), [
            'image/bmp',
            'image/gif',
            'image/jpeg',
            'image/svg+xml',
            'image/png'
        ]);
         * */

       // if ($inArr && ($file->getSize() > $fileMin && $file->getSize() < $fileMax)) {

            // Verifier
            $verifier = ['user_id' => Auth::user()->getAuthIdentifier()];

            if($request->has('library_id') && $request->input('library_id') != 0 && is_int($request->input('library_id'))){
                $verifier['id'] = $request->input('library_id');
            }


            $identifier = DesignLibrary::updateOrCreate(
                $verifier,
                [
                    'image_url' => "image1.png"
                ]
            );

            $id = $identifier->id;

            /* Send Image To Proper Location
            /public/designs/{id}/{image_name}
            */
            $id = $identifier->id;

            /* Send Image To Proper Location
            /public/designs/{id}/{image_name}
            */

            if($request->input('blob') != null) {

                $image = imagecreatefromstring($request->input('blob'));

                imagepng($image, "/public/designs/" . $id . "/" . $id . ".png");

            } else {

                return 0;

            }

            //$file->move(url('/') . "/designs/" . $id . "/");

            return $id;

        //}

        //return false;
    }

}
