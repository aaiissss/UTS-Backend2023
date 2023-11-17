<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pasienController extends Controller
{
    public function index()
	{
        # menggunakan model pasiencovid untuk select data
		$pasien = pasiencovid::all();

		if (!empty($pasien)) {
			$response = [
				'message' => 'Menampilkan Data Semua pasien',
				'data' => $pasien,
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

        $pasien = pasien::create($validateData);


        $data = [
            'message' => 'pasien is created succesfully',
            'data' => $pasien,
        ];

        // mengembalikan data (json) dan kode 201
        return response()->json($data, 201);
    }
	public function show($id)
	{
		$pasien = pasien::find($id);

		if ($pasien) {
			$response = [
				'message' => 'Get detail pasien',
				'data' => $pasien
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
		$pasien = pasien::find($id);

		if ($pasien) {
			$response = [
				'message' => 'pasien is updated',
				'data' => $pasien->update($request->all())
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
		$pasien = pasien::find($id);

		if ($pasien) {
			$response = [
				'message' => 'pasien is delete',
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