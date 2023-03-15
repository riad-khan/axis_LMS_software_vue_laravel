<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\ClassResource;
use App\Models\User\Classs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ClassResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class_resources = Cache::remember('class_resources', 22 * 60, function () {
            $class_resources = new \stdClass();
            $resources = ClassResource::select('class_id', 'title', 'video_url', 'download_url')->where('is_active', 1)->get();
            $today_class_resources = [];
            $previous_class_resources = [];
            foreach($resources as $resource){
                $class = Classs::select('ending_time')->where('id', $resource->class_id)->first();
                if ($class->ending_time == date('Y-m-d H:i:s')) {
                    array_push($today_class_resources, $resource);
                }else {
                    array_push($previous_class_resources, $resource);
                }
            }
            $class_resources->today_class_resources = $today_class_resources;
            $class_resources->previous_class_resources = $previous_class_resources;
            return $class_resources;
        });
        return response()->json($class_resources);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User\ClassResource  $classResource
     * @return \Illuminate\Http\Response
     */
    public function show(ClassResource $classResource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User\ClassResource  $classResource
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassResource $classResource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User\ClassResource  $classResource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassResource $classResource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User\ClassResource  $classResource
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassResource $classResource)
    {
        //
    }
}
