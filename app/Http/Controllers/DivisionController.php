<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DivisionController extends Controller
{
     public function index()
    {
    
  $divisions = DB::table("divisions")->pluck("bn_name","id");
  $posts = DB::table("posts")->pluck("title","id");

  return view('ajaxbd',compact('divisions','posts'));
}


       public function getPostList(Request $request)
        {
            $post = DB::table("posts")
            ->where("id",$request->post_id)
            ->first();
            return response()->json($post);
        }

       public function getDistrictList(Request $request)
        {
            $districts = DB::table("districts")
            ->where("division_id",$request->division_id)
            ->pluck("bn_name","id");
            return response()->json($districts);
        }

        public function getUpazilaList(Request $request)
        {
            $upazilas = DB::table("upazilas")
            ->where("district_id",$request->district_id)
            ->pluck("bn_name","id");
            return response()->json($upazilas);
        }


}
