<?php

namespace App\Http\Controllers;

use App\Models\{Page};
use Illuminate\Http\Request;
use App\Http\Requests\CreatePage;
use App\Services\AlertService;
use marcusvbda\uploader\Controllers\UploaderController as Uploader;
use marcusvbda\uploader\Models\File as _Files;
use marcusvbda\uploader\Models\FileCategory;
use App\Teste;

class TesteController extends Controller
{
    public function index(Request $request)
    {
        dd("teste");
    }
    
    public function uploadImage(Request $request)
    {
        $data = $request->all();
        Uploader::upload($data["image"],$data["name"]);
    }

    private function setCategoryRelashion($idFile,$idCategory)
    {
        $category = FileCategory::find($idCategory)->first();
        $category->addFile(1);
        dd($category);
        $teste->addFile($idImage);
    }

    private function getCategories()
    {
        return FileCategory::get();
    }

    private function createCategory($name)
    {
        FileCategory::create(["name"=>$name]);
    }

    private function deleteUpload($id)
    {
        $file = _Files::find($id);
        dd($file->delete());
    }

    private function reorderImage()
    {
        $images = $this->getImagesRelashion(1)->get();
        $images->last()->reorder([
            [
                "file_id"    => 1,
                "ordination" => 3,
            ],
            [
                "file_id"    => 2,
                "ordination" => 2,
            ],
            [
                "file_id"    => 3,
                "ordination" => 1,
            ],
            [
                "file_id"    => 4,
                "ordination" => 0,
            ]
        ]);
    }

    private function setImagemRelashion($idImage,$idRelashion)
    {
        $teste = Teste::find($idRelashion)->first();
        $teste->addFile($idImage);
    }

    private function getImagesRelashion($idRelashion)
    {
        return Teste::find($idRelashion)->first()->files()->get();
    }

    private function removeFile($idRelashion,$idImage)
    {
        $teste = Teste::find($idRelashion)->first();
        $teste->removeFile($idImage);
    }


    

}


// <?php

// namespace App;

// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes; 
// use marcusvbda\uploader\Traits\HasFiles;



// class Teste extends Model
// {
//     use HasFiles;
    
//     protected $table = 'teste';
// 	protected $fillable = [
// 		'name'
// 	];

// }
