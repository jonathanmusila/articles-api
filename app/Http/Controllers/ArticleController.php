<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index(){

        $article = Article::all();

        return response()->json($article, 200);
    }

    public function show($id){

        $_article = Article::findOrFail($id);

        if(is_null($_article)){
            return response()->json([
                'message' => "Article with that id not found",
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $_article
    ], 200);
    }

    public function store(Request $request){

        $rules = [
            'title' => ['required', 'string', 'unique:articles', 'min:10'],
            'body' => ['required', 'string', 'min:50'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $article = Article::create($request->all());
        
        return response()->json([
            'message' => "Article created successfully",
            'status' => 201,
            'data' => $article
        ], 201);
    }

    public function update(Request $request, $id){

        $rules = [
            'title' => ['string', 'unique:articles', 'min:10'],
            'body' => ['string', 'min:50'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $_article = Article::findOrFail($id);

        $_article->update($request->all());

        return response()->json([
            'message' => "Article updated succesfully",
            'status' => 200,
            'data' => $_article
    ], 200);

    }

    public function delete($id){

        $article = Article::findOrFail($id);

        // if(is_null($article)){
        //     return response()->json([
        //         'message' => "Article already deleted"
        //     ]);
        // }

        $article->delete();

        return response()->json([
            'message' => "Article deleted succesfully",
            'status' => 204,
        ], 200);

    }
}
