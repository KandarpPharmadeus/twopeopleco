<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionFormRequest;
use Illuminate\Http\Request;
use App\Models\Questions;

//codeplaners 
class QuestionController extends Controller
{
    // all questions
    public function index()
    {
        $questions = Questions::all()->toArray();
        return array_reverse($questions);
    }
  
    // Store question
    public function store(QuestionFormRequest $request)
    {
        $validated = $request->validated();
        $question = Questions::create([
            'userId' => 1,
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);
        
  
        return response()->json('question successfully added');
    }
  
    // edit question
    public function show($id)
    {
        $question = Questions::find($id);
        return response()->json($question);
    }

    // edit question
    public function edit($id)
    {
        $question = Questions::find($id);
        return response()->json($question);
    }
  
    // update question
    public function update($id, QuestionFormRequest $request)
    {
        $question = Questions::find($id);
        $validated = $request->validated();
        $question->update($request->all());
  
        return response()->json('question successfully updated');
    }
  
    // delete question
    public function delete($id)
    {
        $question = Questions::find($id);
        $question->delete();
  
        return response()->json('question successfully deleted');
    }
}
