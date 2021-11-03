<?php

namespace App\Http\Controllers\Api\Profile\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\CreateGameResource;
use App\Http\Resources\ProductResource;
use App\Http\Traits\ProductTrait;
use App\Models\Field;
use App\Models\Game;
use App\Models\Product;
use App\Models\Result;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    use ProductTrait;

    public function index()
    {
        return ProductResource::collection(Product::whereUserId(Auth::id())->get());
    }

    // return fields for create products page
    // Additional fields - Type
    public function create($game_id)
    {
        $game = Game::with('fields')->findOrFail($game_id);
        //Return Game Resource and attach @Type to @Game Resource
        return ( new CreateGameResource($game) )->type( Type::all() );
    }

    public function edit($id)
    {
        return new ProductResource( Product::whereUserId(Auth::id())->whereId($id)->firstOrFail() );
    }

    public function store(Request $request)
    {
        // Create product
        $product = $this->makeProduct($request);

        // Atach fields
        $fields = $this->getFields($request);

        //If there are no fields, just return
        if(!$fields)
            return json_encode(['success' => true, 'm' => 'Saved!']);

        //Else save fields
        foreach ($fields as $key => $value){
            //If field is wrong
            if(!$field = Field::find($key))
                continue;

            $newFiledContent = Result::create([
                'product_id'    =>  $product->id,
                'field_id'      =>  $field->id,
                'label'         =>  $field->label,
                'content'       =>  $value
            ]);

            return $newFiledContent;
        }

        return json_encode(['success' => true, 'm' => 'Saved!']);
    }


}
