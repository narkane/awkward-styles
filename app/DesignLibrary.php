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

        $imageName = ((Auth::check()) ? Auth::user()->getAuthIdentifier() : "0") . time();

        $check = DesignLibrary::where('id', '=', $request->input('library_id'))
            ->where('user_id', '=', Auth::user()->getAuthIdentifier());

        if ($check->count() == 0) {

            $id = DesignLibrary::insertGetId([
                'user_id' => Auth::user()->getAuthIdentifier(),
                'image_url' => $imageName .".png"
            ]);

                if ($request->input('blob') != null) {

                    list($d, $data) = explode(",", $request->input('blob'));

                    $path = public_path() . DIRECTORY_SEPARATOR . "designs" . DIRECTORY_SEPARATOR . $id;

                    $image = imagecreatefromstring(base64_decode($data));

                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                    }

                    imagepng($image, $path . DIRECTORY_SEPARATOR . $imageName .".PNG");

                } else {

                    return 0;

                }

        } else {
            $id = $request->input('library_id');
        }

        return $id;
    }

}
