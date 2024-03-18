<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\lecturesModel;
use App\Models\programModel;
use App\Models\User;
use Illuminate\Http\Request;

class lectureController extends Controller
{
    //
    public function index($id)
    {
        $course_id = $id;
        $course = lecturesModel::where('course_id', $course_id)->get();
        $userId = auth()->user()->id;
        $user = User::where('id', $userId)->first();
        return view('admin.lecture', compact('user', 'course_id', 'course'));
    }

    // public function lectureSubmit(Request $request)
    // {
    //     $lecture =  new lecturesModel();
    //     $lecture->course_id = $request->course_id;
    //     $lecture->title = $request->title;
    //     $video_paths = []; // Initialize an array to store video paths
    //     $lecture->video = $video_paths;
    //     if ($request->hasFile('videos')) {
    //         foreach ($request->file('videos') as $video) {
    //             // Generate a unique filename for each video
    //             $video_name = rand(0, 9999) . time() . '.' . $video->getClientOriginalName();

    //             // Store the video in the "public/uploads" directory
    //             $video->move(public_path('uploads'), $video_name);

    //             // Add the video path to the array
    //             $video_paths[] = $video_name;
    //         }
    //     }

    //     $lecture->description = $request->description;
    //     $lecture->save();
    // }
    public function lectureSubmit(Request $request)
    {
        $lecture = new lecturesModel();
        $lecture->course_id = $request->course_id;
        $lecture->title = $request->title;

        // Process and save videos
        $video_paths = [];
        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $video) {
                $video_name = uniqid() . '_' . time() . '.' . $video->getClientOriginalExtension();
                $video->move(public_path('uploads'), $video_name);
                $video_paths[] = 'uploads/' . $video_name; // Store relative path to the video
            }
        }
        $lecture->video = json_encode($video_paths); // Store videos as JSON in the database

        $lecture->description = $request->description;
        $lecture->save();

        return response()->json(['message' => 'Lecture added successfully'], 200);
    }
    public function coursePublished($id)
    {
        $course_id = $id;
        $course = programModel::where('id', $course_id)->first();
        $course->status = 1;
        $course->update();
        return redirect()->back();
    }
    public function courseDelete($id)
    {
        $course_id = $id;
        $course = programModel::where('id', $course_id)->delete();
        return redirect()->back();
    }
}
