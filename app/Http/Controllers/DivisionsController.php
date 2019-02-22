<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;

use App\Division;

use App\Worker;

class DivisionsController extends Controller
{
    
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Список отделов
		$divisions = Division::orderBy('id', 'asc')->paginate(9);
		
		return view('divisions', ['divisions'=>$divisions]);
    }

	
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Форма добавления отдела
		$divisions = new Division;
		$divisions->title = '';
		$actionForm = "create";
		return view('form_division', ['titlePage'=>'Форма добавления отдела', 'titleForm'=>'Добавить отдел', 'actionForm' => $actionForm, 'divisions'=>$divisions]);
    }

	
	
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Запись отдела
		$this->validate($request, [
			'title' => 'required'
		]);
		
		$Divisions = new Division;
		$Divisions->title = $request->title;
		$Divisions->save();

		return redirect('divisions');
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
		return redirect('divisions');
    }

	
	
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Вывод формы редактирования
		$divisions = Division::findOrFail($id);
		$actionForm = "edit";
		return view('form_division', ['titlePage'=>'Форма редактирования отдела', 'titleForm'=>'Переименовать отдел', 'actionForm' => $actionForm, 'divisions'=>$divisions]);
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
        //Валидация формы
		$this->validate($request, [
			'title' => 'required'
		]);
		
		//Редактирование
		$divisions = Division::findOrFail($id);
		$divisions->title = $request->title;
		$divisions->save();
		
		return redirect('divisions');
    }

	
	
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Удаление объекта
		$count_workers = Division::findOrFail($id)->workers()->count();
		if ($count_workers == 0)
		{
			$divisions = Division::destroy($id);
		}
		return redirect('divisions');
    }
}
