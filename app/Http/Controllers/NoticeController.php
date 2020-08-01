<?php

namespace App\Http\Controllers;

use App\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;

class NoticeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::orderBy('title', 'ASC')->paginate(5);
        return view('notices.index', compact('notices'));
    }

    /**
     * Show the form for creating a notice resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->hasPermissionTo('Cadastrar Noticia')) {
            throw new UnauthorizedException( 403, 'Você não tem permissão requerida!');
        }
        return view('notices.create');
    }

    /**
     * Store a noticely created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $request -> validate([

                'title'=>'required',
                'notice' => 'required',
                'responsible' => 'required',

            ]);

            Notice::create([

                'title'=> $request->title,
                'notice' => $request->notice,
                'responsible' => $request->responsible,

            ]);

            return redirect()->route('notice.index')->with(['color' => 'green', 'message' => 'Notícia cadastrada com sucesso!']);

        }

        catch (\Exception $e)
        {
            return redirect()->route('notice.create')->with(['color' => 'orange', 'message' => 'OOps!!, Favor preencher todos os campos abaixo.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notice = Notice::find($id);
        return view('notices.show', compact('notice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->hasPermissionTo('Editar Noticia')) {
            throw new UnauthorizedException( 403, 'Você não tem permissão requerida!');
        }
        $notice = Notice::find($id);
        return view('notices.edit', compact('notice'));
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
        try
        {

            $notice = Notice::find($id);

            $request->validate([

               'title'=>'required',
                'notice' => 'required',
                'responsible' => 'required',

            ]);

            Notice::whereId($id)->update([

                   'title'=> $request->title,
                'notice' => $request->notice,
                'responsible' => $request->responsible,

            ]);

            return redirect()->route('notice.index')->with(['color'=>'green', 'message'=> 'Notícia alterada com sucesso!']);

        }

        catch (\Exception $e)

        {

            return redirect()->route('notice.edit',$id)->with(['color'=>'orange', 'message'=> 'OOps!!!, altere os campos abaixo.']);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            Notice::destroy($id);
        }

        catch (\Exception $e)
        {
            return redirect()->back()->withInput()->with(['color' => 'orange', 'message' => 'Erro ao excluir a Notícia.']);
        }

        return redirect()->route('notice.index')->with(['color' => 'green', 'message' => 'Notícia excluida com sucesso!']);
    }

}
