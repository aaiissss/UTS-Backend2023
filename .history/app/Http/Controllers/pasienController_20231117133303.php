<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pasienController extends Controller
{
    public function index()
	{
        # menggunakan model pasiencovid untuk select data
		$pasiencovids = pasiencovid::all();

		if (!empty($pasiencovids)) {
			$response = [
				'message' => 'Menampilkan Data Semua pasiencovid',
				'data' => $pasiencovids,
			];
			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data tidak ada'
			];
			return response()->json($response, 404);
		}
	}

	public function store(Request $request)
    {
        #validate
        $validateData = $request->validate([
            'name' => 'required',
            'phone' => 'numeric|required',
            'addres' => 'required',
            'status' => 'required',
            'in_date_at' => 'date|required',
            'out_date_at' => 'date|required',
        ]);

        $pasiencovid = pasiencovid::create($validateData);


        $data = [
            'message' => 'pasiencovid is created succesfully',
            'data' => $pasiencovid,
        ];

        // mengembalikan data (json) dan kode 201
        return response()->json($data, 201);
    }
	public function show($id)
	{
		$pasiencovid = pasiencovid::find($id);

		if ($pasiencovid) {
			$response = [
				'message' => 'Get detail pasiencovid',
				'data' => $pasiencovid
			];
	
			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data not found'
			];
			
			return response()->json($response, 404);
		}
	}

	public function update(Request $request, $id)
	{
		$pasiencovid = pasiencovid::find($id);

		if ($pasiencovid) {
			$response = [
				'message' => 'pasiencovid is updated',
				'data' => $pasiencovid->update($request->all())
			];
	
			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data not found'
			];

			return response()->json($response, 404);
		}
	}

	public function destroy($id)
	{
		$pasiencovid = pasiencovid::find($id);

		if ($pasiencovid) {
			$response = [
				'message' => 'pasiencovid is delete',
				'data' => $pasiencovid->delete()
			];

			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data not found'
			];

			return response()->json($response, 404);
		}
	}
}