<?php

namespace App\Http\Controllers;
use App\quiz;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class managefillingblanksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $quizes=quiz::all();
        return view("admin.managefillingblanks",compact('quizes'));
    }

    public function search(Request $request){

        if( $request->ajax() ){
            $output="";
            
            $questions=DB::table('fillingblanks')->where('quizid','=',$request->qid)->where('questiontype','=',$request->papertypeval)->get();
           // $questions=DB::table('mcqquizes')->where('quizid','LIKE','%'.$request->search."%")->get();
           // $questions = DB::select("select * from mcqquizes");


            
            if($questions)
            {
                foreach($questions as $question){
                    $output .='<tr>'.
                    '<td style="display:none">'.$question->Qid.'</td>'.
                    '<td>'.$question->Question.'</td>'.
                    '<td>'.$question->marks.'</td>'.
                    '<td>'.$question->questiontype.'</td>'.
                    '<td>
                    <a href="showmcqdata/'.$question->Qid.'" id="edit" type="submit"  data-id="'.$question->Qid.'" class="btn btn-primary edit" >Edit</a>
                    
                   
                       <a style="margin-left: 13%;" type="submit" data-id="'.$question->Qid.'" id="del" class="btn btn-danger delete-btn" >Delete</a>
                    </td>'.
                    '</tr>';


                    
                }
                return response($output);

            }

        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
