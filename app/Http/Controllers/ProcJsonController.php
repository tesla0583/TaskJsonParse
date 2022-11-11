<?php

namespace App\Http\Controllers;

use App\Models\Json;
use Illuminate\Http\Request;

class ProcJsonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jsons = Json::all();

        return view('jsonIndex', ['jsons' => $jsons]);
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
        $data = Json::select(['data'])
            ->where('id', $id)
            ->firstOrFail();

        $dataArr = json_decode($data->data, true);
        $result = self::printDataArrayBeauty($dataArr);

        return view('jsonShow', ['result' => $result]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Json::all()
            ->where('id', $id)
            ->firstOrFail();

        return view('jsonEdit', ['result' => $data]);
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
        $res = Json::find($id);
        $res->data = $request->jsonText;
        $res->save();

        return redirect()->route('json.show', $res->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Json::where('id', $id)
            ->delete();

        return redirect()->route('json.index');
    }

    /**
     * Define beautiful printing array data method
     *
     * @param $data
     * @param  bool  $notUsePadding
     * @return string
     */
    public static function printDataArrayBeauty($data, $notUsePadding = false)
    {
        $result = $notUsePadding ? '<ul>' : '<ul class="pl-1">';
//        dd($data);

        if (is_array($data)) {

            foreach ($data as $key => $value) {
                $title = is_numeric($key) ? '#'.($key + 1) : $key.':';

                if (is_array($value)) {
                    $result .= '<li class="pt-3" style="list-style: none"><strong class="text-primary">'.$title.'</strong> '.self::printDataArrayBeauty($value, true).'</li>';
                } else {
                    $result .= '<li class="pt-1" style="list-style: none"><strong>'.$title.'</strong> '.$value.'</li>';
                }
            }
        }

        $result .= '</ul>';

        return $result;
    }
}

