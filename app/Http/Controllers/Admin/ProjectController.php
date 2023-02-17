<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = ProjectCategory::all();
        return view('admin.project.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title', 'desc', 'summry' => 'required', 'status'
        ]);

        $project = new Project();
        $project =$this->mapping($request, $project);
        $project->save();
        $project->projectCategories()->attach($request->categories);
        if ($request->hasFile('images'))
            $this->projectImagesUpload($request, $project->id);

        $notify[] = ['success', 'Create Successfully'];
        return back()->withNotify($notify);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $project=Project::findorfail($id);
        $categories=ProjectCategory::all();
        return view('admin.project.edit',compact('project','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id,Request $request)
    {
        $project=Project::findorfail($id);
        $request->validate([
        'title', 'desc', 'summry' => 'required', 'status'
    ]);
        $this->mapping($request, $project);
        $project->save();
        $project->projectCategories()->sync($request->categories);
        if ($request->hasFile('images'))
            $this->projectImagesUpload($request, $project->id);

        $notify[] = ['success', 'Updated Successfully'];
        return back()->withNotify($notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    private function mapping($request, $project)
    {
        $project->title = $request->title;
        $project->desc = $request->desc;
        $project->summary = $request->summry;
        $project->order_date = $request->order_date;
        $project->released_date = $request->released_date;
        $project->link = $request->link;
        $project->status = $request->status;
        $project->location = $request->location;
        $project->client = $request->client;
        return $project;
    }

    private function projectImagesUpload($request, $projectID)
    {
        $path = imagePath()['project']['path'];
        $size = imagePath()['project']['size'];
        $images = $request->file('images');
        foreach ($images as $image) {
            $filename = $image;
            try {
                $filename = uploadImage($image, $path, $size, $filename);
                Image::create([
                    'imageable_id' => $projectID,
                    'imageable_type' => 'App\Models\Project',
                    'filename' => $filename
                ]);
            } catch (\Exception $exp) {
                $notify[] = ['errors', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }


        }
    }
}
