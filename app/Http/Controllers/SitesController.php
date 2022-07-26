<?php

namespace App\Http\Controllers;

use App\Exports\SitesExport;
use App\Models\Sites;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Sites::all();
        return view('sites.index', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sites.create');
    }

    public function search(Request $request)
    {

        if ($request->search != '') {
            $search = Sites::where('site_name', 'Like', '%' . $request->search . '%')->get();
            $outSupports = '';

            foreach ($search as $searches) {
                $outSupports .=
                    '<tr>
                    <td>' . $searches->site_name . '</td>
                    <td>' . $searches->site_admin . '</td>
                    <td>' . $searches->site_ftp . '</td>
                    <td>' . $searches->site_host . '</td>
                    </tr>';
            }

            return response($outSupports);
        } else {

            $search = Sites::all();
            $outSupports = '';

            foreach ($search as $searches) {
                $outSupports .=
                    '<tr>
                <td>' . $searches->site_name . '</td>
                <td>' . $searches->site_admin . '</td>
                <td>' . $searches->site_ftp . '</td>
                <td>' . $searches->site_host . '</td>
                </tr>';
            }

            return response($outSupports);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'site_name' => 'required',
            'site_admin' => 'required',
            'site_ftp' => 'required',
            'site_host' => 'required',
        ]);
        $site = Sites::create($data);
        if ($site->save()) {
            return redirect()->route('sites.index')->with('message', 'Доступ был добавлен!');
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
        $site = Sites::find($id);
        return view('sites.edit', compact('site'));
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
        $data = $request->validate([
            'site_name' => 'required',
            'site_admin' => 'required',
            'site_ftp' => 'required',
            'site_host' => 'required',
        ]);
        $site = Sites::find($id);
        $site->site_name = $data['site_name'];
        $site->site_admin = $data['site_admin'];
        $site->site_ftp = $data['site_ftp'];
        $site->site_host = $data['site_host'];
        if ($site->save()) {
            return redirect()->route('sites.index')->with('message', 'Доступ был изменен!');
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
        Sites::destroy($id);
        return redirect()->route('sites.index')->with('message', 'Доступ был удален');
    }
    public function export()
    {
        return Excel::download(new SitesExport, 'sites.xlsx');
    }
}
