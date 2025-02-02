<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGrades;
use App\Models\Grade;
use Dotenv\Result\Success;
use Illuminate\Http\Request;

class GradeController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $grades=Grade::all();
    return view('pages.Grades.Grades',['grades'=>$grades]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreGrades $request)
  {
      try{

        $validated = $request->validated();
        $grade=new Grade();
        $translations = [
            'en' => $request->name_en,
            'nl' => $request->name
         ];
         $grade->setTranslations('name', $translations);


        //$grade->name = ['en' => $request->name_en, 'ar' => $request->name];
        $grade->notes=$request->notes;
        $grade->save();
        toastr()->success(trans('message.success'));

        return redirect()->route('grades.index');

      }
      catch(\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);

      }


  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

}

?>
