<?php

namespace App\Http\Controllers;

use App\Models\MJenisJawaban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class JenisJawabanController extends Controller
{
    protected $module, $keterangan;
    public function __construct()
    {
        $this->module = "jenis-jawaban";
        $this->keterangan = "Jenis Jawaban";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            "title" => $this->keterangan,
            "module" => $this->module,
            "breadcrumbs" => array(
                [
                    'title' => $this->keterangan,
                    'url' => $this->module
                ],
            ),
            "data" => array()
        );
        return view($this->module . '.index', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shgetdata(Request $request)
    {
        //
        //Request Post
        $limit = $request->input('length');
        $page = $request->input('start');
        $draw = $request->input('draw');
        $column = $request->input('columns');

        $total = $this->_filter($request)->count();
        $list = $this->_filter($request)->skip($page)->take($limit)->get();

        $data = [];
        foreach ($list as $i => $r) {
            // TIDAK PERLU DIUBAH TEMPLATE DATATABLE
            // Pemberian nomor pada datatable
            // ==============================================================
            $data[$i]["no"] = $page + $i + 1;

            // Menampilkan data sesuai dengan data yang akan ditampilkan
            for ($j = 0; $j < count($column); $j++) {
                $field = $column[$j]["data"];

                if ($column[$j]["orderable"] == "true") {
                    $data[$i][$field] = $r[$field];
                }
            }
            // ==============================================================
            // END TIDAK PERLU DIUBAH TEMPLATE DATATABLE

            // Kustom field yang akan ditampilkan pada datatable
            // ==============================================================
            $data[$i]["aksi"] = '<button type="button" class="btn btn-sm btn-info mb-1 mr-1" title="Edit Data" onclick="modal(' . $r["id"] . ')"><i class="fas fa-pen"></i></button>';
            $data[$i]["aksi"] .= '<button type="button" class="btn btn-sm btn-danger mb-1 mr-1" title="Hapus Data" onclick="hapus(' . $r["id"] . ')"><i class="fas fa-trash"></i></button>';
            // ==============================================================
            // END Kustom field yang akan ditampilkan pada datatable
        }
        //Set data
        $data = array(
            "recordsTotal" => $total,
            "recordsFiltered" => $total,
            "data" => $data,
            "draw" => (int)$draw,
            "csrf" => csrf_token(),
        );

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function modal($id)
    {
        //
        $result = array();
        $result_dokumen = array();

        if ($id) {
            $result = $this->findModel($id);
            // if ($result) {
            //     $result_kewenangan = $result->kewenangan()->get();
            //     $result_kecamatan = $result->kecamatan()->get();
            //     $result_desakel = $result->desakel($result->id_kecamatan)->get();
            // }
        }

        $data = array(
            "title" => $this->keterangan,
            "module" => $this->module,
            "data" => $result,
            "data_dokumen" => $result_dokumen,
        );
        return view($this->module . '.form', $data);
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
        $rules = [
            'nama' => 'required',
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'validation error ' . $validate->errors(),
                'errors' => $validate->errors()
            ]);
        }

        DB::beginTransaction();

        if (isset($request->id)) {
            $model = $this->findModel($request->id);
        } else {
            $model = new MJenisJawaban();
        }

        $model->nama = strtolower($request->nama);
        $model->tag = strtolower($request->nama);
        $model->status = ($request->status == 1) ? 1 : -1;

        if ($valid = $model->save()) {
        }

        if ($valid) {
            DB::commit();

            $data = array(
                'id' => $model->id,
                'success' => true,
                'message' => 'Berhasil.',
            );
        } else {
            DB::rollBack();

            $data = array(
                'success' => false,
                'message' => 'Gagal.'
            );
        }

        return response()->json($data);
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
        $model = $this->findModel($id);

        try {
            $model->delete();

            $data = array(
                'success' => true,
                'message' => 'Berhasil.',
            );

            return response()->json($data);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Gagal ' . $e->errorInfo
            ]);
        }
    }

    function shGetJenisJawaban(Request $request)
    {
        $model = MJenisJawaban::query();

        if ($request->search) {
            $model->where('jenis_jawaban', 'like', "%$request->search%");
        }

        $get = $model->get();
        $result = array();
        if ($get) {
            $result = commonFormatSelect2($get, "id", "jenis_jawaban");
        }

        $data = array(
            "data" => $result,
            "csrf" => csrf_token(),
        );

        return response()->json($data);
    }

    protected function findModel($id)
    {
        if (($model = MJenisJawaban::find($id)) !== null) {
            return $model;
        }

        abort(404);
    }

    private function _filter(Request $request)
    {
        $model = MJenisJawaban::query();
        $search = $request->input("search.value");
        $index = $request->input("order.0.column");
        $filter = $request->input("order.0.dir");
        $filterCol =  $request->input("columns.$index.data");

        if ($search) {
            $model->where(function ($query) use ($search) {
                $query->where('jenis_jawaban', 'like', "%$search%");
            });
        }

        $model->orderBy($filterCol, $filter);

        return $model;
    }
}
