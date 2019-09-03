<?php

namespace App\Http\Controllers;

use App\Http\Resources\Meals;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Meal;
use App\Helper;
use App\Http\Resources\Meals as MealsResource;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\MealResource;
use Dimsav\Translatable\Translatable;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $validator = Validator::make($request->all(),
            [   'per_page'  => ['integer','min:1'],
                'page'      => ['integer','min:1'],
                'lang'      => ['required','max:2','min:2'],
                'diff_time' => ['integer','min:0']
            ]
        );
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
            $perPage               =      $request->input('per_page') ?: 15;
            $categoryRequest       =      $request->input('category');
            $tagRequest            =      $request->input('tags');
            $diff_timeRequest      =      $request->input('diff_time');
            $diff_time             =      date('Y-m-d H:i:s',$diff_timeRequest);
            $meals = Meal::query();
        
        if($diff_timeRequest > 0){
            $meals->where('updated_at','>',$diff_time)
            ->orWhere('created_at','>',$diff_time)
            ->orWhere('deleted_at','>',$diff_time);
        }
        if ($tagRequest) {
            $tags = explode(',',$tagRequest);
             foreach($tags as $item) {
               $meals = $meals->whereHas('tags', function($builder) use ($item) {
                     $builder->where('tags.id',$item);
                });
             }
        }
        if ($categoryRequest == "null") {
            $meals->where('category_id','=','null');
        }
        if ($categoryRequest == "!null") {
            $meals->where('category_id','!=',null);
        }
        if ($categoryRequest > 0) {
            $category = $categoryRequest;
            $meals->where('category_id',$category);
        }
        
        $mealsPaginator  =   $meals->paginate($perPage);
        return $this->returnPaginatedMealResource($mealsPaginator);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $meal = new Meal();

    $meal->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get meal
        $meal = Meal::findOrFail($id);

        // Return single meal as a resourse
        return new Meals($meal);
    }

    protected function returnPaginatedMealResource(LengthAwarePaginator $paginator)
    {
        $meals = collect($paginator->items());
        $response = [
            'meta' => [
                'currentPage' => $paginator->currentPage(),
                'totalItems' => $paginator->total(),
                'itemsPerPage' => (int)$paginator->perPage(),
                'totalPages' => $paginator->lastPage(),
            ],
            'data' => Meals::collection($meals),
            'links' => [
                'prev' => $paginator->previousPageUrl(),
                'next' => $paginator->nextPageUrl(),
                'self' => url()->current()
            ]
        ];
        return $response;
    }
    
}