<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Resources\ImageResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class ImageController extends ApiController
{
    public function __construct()
    {
        $this->resource = ImageResource::class;
        $this->model = app(Image::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( ImageRequest $request ){
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }
}
