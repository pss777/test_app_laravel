<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;

use App\Division;

use App\Worker;

class WorkersController extends Controller
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
        //
		$workers = Worker::orderBy('id','asc')->paginate(9);
		
		return view('workers', ['workers' => $workers]);
    }

	
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Вывод формы добавления сотрудника
		$divisions = Division::orderBy('title', 'asc')->get();
		$workers = new Worker;
		$workers->name = '';
		$workers->surname = '';
		$workers->patronymic = '';
		$workers->sex = 'none';
		$workers->wages = '';
		$workers->divisions = '';
		$actionForm = "create";
		
		return view('form_worker', ['titlePage'=>'Форма добавления сотрудника', 'titleForm'=>'Добавить сотрудника', 'actionForm' => $actionForm, 'divisions'=>$divisions, 'workers'=>$workers]);
    }

	
	
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Валидация формы
		$this->validate($request, [
			'name' => 'required',
			'surname' => 'required',
			'wages' => 'required',
            'divisions' => 'required',
		]);
		
		//Сохранить
		$workers = new Worker;
		$workers->name = $request->name;
		$workers->surname = $request->surname;
		$workers->patronymic = $request->patronymic;
		$workers->sex = $request->sex;
		$workers->wages = $request->wages;
		$workers->save();
		$workers->divisions()->attach($request->input('divisions'));
		
		return redirect('workers');
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
		return redirect('workers');
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
		$divisions = Division::orderBy('title', 'asc')->get();
		$workers = Worker::findOrFail($id);
		$workers->divisions = explode(',',$workers->divisions()->pluck('id')->implode(','));
		$actionForm = "edit";
		
		return view('form_worker', ['titlePage'=>'Форма редактирования сотрудника', 'titleForm'=>'Изменить данные сотрудника', 'actionForm' => $actionForm, 'divisions'=>$divisions, 'workers'=>$workers]);
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
			'name' => 'required',
			'surname' => 'required',
			'wages' => 'required',
            'divisions' => 'required',
		]);
		
		//Редактирование
		$workers = Worker::findOrFail($id);
		$workers->name = $request->name;
		$workers->surname = $request->surname;
		$workers->patronymic = $request->patronymic;
		$workers->sex = $request->sex;
		$workers->wages = $request->wages;
		$workers->save();
		$workers->divisions()->detach();
		$workers->divisions()->attach($request->input('divisions'));
		
		return redirect('workers');
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
		$workers = Worker::findOrFail($id);
		$workers->divisions()->detach();
		$workers->delete();
		
		return redirect('workers');
    }
}
