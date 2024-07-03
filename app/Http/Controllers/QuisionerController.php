<?php

namespace App\Http\Controllers;

use App\Models\MJawaban;
use App\Models\MPersonalIdentity;
use App\Models\MPertanyaan;
use App\Models\MTemplateSet;
use App\Models\MUsaha;
use App\Models\RPerusahaan;
use App\Models\RResponden;
use App\Models\RRespondenJawaban;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class QuisionerController extends Controller
{
    protected $module, $keterangan;
    public function __construct()
    {
        $this->module = "home";
        $this->keterangan = "Home";
    }

    /**
     * Menampilkan halaman utama.
     */
    public function index()
    {
        //
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
     * Menampilkan halaman quisioner.
     */
    public function quisioner()
    {
        $model_usaha = MUsaha::get();
        $data = array(
            "title" => $this->keterangan,
            "module" => $this->module,
            "breadcrumbs" => array(
                [
                    'title' => $this->keterangan,
                    'url' => $this->module
                ],
            ),
            "data" => array(
                'model_usaha' => $model_usaha,
            )
        );
        return view($this->module . '.quisioner', $data);
    }

    /**
     * Generate file quisioner.
     */
    public function downloadQuisioner(string $kode_usaha)
    {

        $model_usaha = MUsaha::where('kode', $kode_usaha)->first();

        if (!$model_usaha) {
            abort(404);
        }

        $model_set_temp = MTemplateSet::where('usaha_id', $model_usaha->id)->first();
        $model_pertanyaan = MPertanyaan::get();

        $pertanyaan_space = Arr::mapWithKeys($model_set_temp->pertanyaans->toArray(), function (array $item, int $key) {
            return [$item['pertanyaan_id'] => $item['jml_space']];
        });

        $html = view('template.template-quisioner', [
            'model_usaha' => $model_usaha,
            'pertanyaan_space' => $pertanyaan_space,
            'questions' => $model_pertanyaan,
            'nama_usaha' => 'nama_usaha'
        ])->render();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $filename = 'quisioner-' . $model_usaha->usaha . '.pdf';

        return $dompdf->stream($filename, ['Attachment' => true]);
    }

    /**
     * Generate file quisioner.
     */
    public function creatTempExcelQuisioner()
    {

        $model_pertanyaan = MPertanyaan::get();

        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();

        //set ORIENTATION_LANDSCAPE Page
        // apply custom style to single cell
        $activeWorksheet->getStyle('A1')->applyFromArray(['font' => ['size' => 14, 'bold' => true]]);
        $activeWorksheet->setCellValue('A1', 'Template Rekap Quisioner');
        $activeWorksheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);

        $spreadsheet->getActiveSheet()->mergeCells('A1:' . getExcelColumnName($model_pertanyaan->count() + 2 - 1) . '1');
        $activeWorksheet->getStyle('A1')->applyFromArray(['alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER]]);

        //set colum name
        $activeWorksheet->setCellValue(getExcelColumnName(0) . '4', 'No');
        $activeWorksheet->setCellValue(getExcelColumnName(1) . '4', 'Nama Responden');

        //set colum jawaban soal
        $index = 2;
        foreach ($model_pertanyaan as $key => $value) {
            $activeWorksheet->getColumnDimension(getExcelColumnName($index))->setWidth(4);
            $activeWorksheet->setCellValue(getExcelColumnName($index) . '4', $key + 1);

            // create rendom value
            // for ($i = 0; $i < 100; $i++) {
            //     $jawaban = MJawaban::where('jenis_jawaban', $value->jenis_jawaban)
            //         ->where(function ($query) {
            //             $query->where('kode_usaha', 'UH01')
            //                 ->orWhere('kode_usaha', '');
            //         })->count();
            //     $array = range(0, $jawaban - 1);

            //     $activeWorksheet->getColumnDimension(getExcelColumnName($index))->setWidth(4);

            //     if ($value->id >= 23) {
            //         $activeWorksheet->setCellValue(getExcelColumnName($index) . 5 + $i, numtoalpa($array[array_rand($array)]) . ',' . numtoalpa($array[array_rand($array)]) . ',' . numtoalpa($array[array_rand($array)]));
            //     } else {
            //         $activeWorksheet->setCellValue(getExcelColumnName($index) . 5 + $i, numtoalpa($array[array_rand($array)]));
            //     }
            // }
            //and

            $index++;
        }

        $writer = new Xlsx($spreadsheet);
        $return = $writer->save(storage_path('app') . '/public/template/template.xlsx');
    }

    /**
     * Download file quisioner.
     */
    public function downloadTempExcelQuisioner()
    {
        return response()->download(storage_path('app') . '/public/template/template.xlsx');
    }

    /**
     * Menampilkan halaman upload quisioner.
     */
    public function uploadQuisioner()
    {
        $model_usaha = MUsaha::get();
        $data = array(
            "title" => $this->keterangan,
            "module" => $this->module,
            "breadcrumbs" => array(
                [
                    'title' => $this->keterangan,
                    'url' => $this->module
                ],
            ),
            "data" => array(
                'model_usaha' => $model_usaha,
            )
        );
        return view($this->module . '.upload-quisioner', $data);
    }

    /**
     * Menampilkan halaman upload quisioner.
     */
    public function acUploadQuisioner(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'kode_usaha' => 'required',
            'nama_perusahaan' => 'required',
            'file' => [
                'required',
                File::types(['xlsx'])
            ],
        ]);

        if ($validate->fails()) {
            $status_code = 200;
            return response()->json([
                'success' => false,
                'message' => 'validation error ' . $validate->errors(),
                'errors' => $validate->errors()
            ], $status_code);
        }

        //cek kode usaha
        $model_usaha = MUsaha::where('kode', $request->kode_usaha)->first();
        if (!$model_usaha) {
            $result = array(
                "success" => false,
                "message" => "Kode usaha tidak sesuai!"
            );
            return response($result, 200);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();

            $now = Carbon::now();
            $filePath = '';
            $fileName = 'template-' . $now->timestamp . '.' . $extension;


            $path = Storage::putFileAs(
                $filePath,
                $file,
                $fileName
            );

            if (!$path) {
                $result = array(
                    "success" => false,
                    "message" => "File gagal tersimpan!"
                );
                return response($result, 200);
            }

            $data = $this->loadSpreadsheetFromRow(storage_path('app') . '/' . $path, 5);

            if ($data) {
                # code...
                try {
                    DB::beginTransaction();

                    $model_pertanyaan = MPertanyaan::get();
                    $model = new RPerusahaan();

                    $model->usaha_id = $model_usaha->id;
                    $model->nama = $request->nama_perusahaan;
                    $model->file = $fileName;
                    if ($res = $model->save()) {

                        foreach ($data as $key => $value) {
                            # code...
                            $model_responden = new RResponden();
                            $model_responden->perusahaan_id = $model->id;
                            $model_responden->nama = $value[1];

                            if ($res = $model_responden->save()) {
                                $jwb = array();
                                foreach ($model_pertanyaan as $key1 => $value1) {
                                    $jawabans = MJawaban::where('jenis_jawaban', $value1->jenis_jawaban)
                                        ->where(function ($query) use ($model_usaha) {
                                            $query->where('kode_usaha', $model_usaha->kode)
                                                ->orWhere('kode_usaha', '');
                                        })->get();

                                    $jawaban_arr = $jawabans->toArray();

                                    if ($value1->multi_jawaban == 0) {
                                        # code...
                                        $jawaban = $jawaban_arr[numtoalpa(str_replace(" ", "", $value[$key1 + 2]), false)];

                                        array_push(
                                            $jwb,
                                            [
                                                'responden_id' => $model_responden->id,
                                                'pertanyaan_id' => $value1->id,
                                                'jawaban_id' => $jawaban['id']
                                            ]
                                        );
                                    } else {
                                        $data_multi = explode(",", str_replace(" ", "", $value[$key1 + 2]));

                                        foreach ($data_multi as $key_multi => $value_milti) {
                                            # code...
                                            $jawaban = $jawaban_arr[numtoalpa(str_replace(" ", "", $value_milti), false)];

                                            array_push(
                                                $jwb,
                                                [
                                                    'responden_id' => $model_responden->id,
                                                    'pertanyaan_id' => $value1->id,
                                                    'jawaban_id' => $jawaban['id']
                                                ]
                                            );
                                        }
                                    }
                                }

                                $res = RRespondenJawaban::insert($jwb);
                            } else {
                                break;
                            }
                        }
                    }

                    if ($res) {


                        DB::commit();
                        $result = array(
                            'url' => url("/quisioner/perusahaan/$model->id"),
                            "success" => true,
                            "message" => "Data quisioner berhasil disimpan"
                        );
                        return response($result, 200);
                    } else {
                        Storage::delete($path);
                        DB::rollBack();
                        $result = array(
                            "success" => false,
                            "message" => "Data quisioner gagal disimpan"
                        );
                        return response($result, 200);
                    }
                } catch (\Throwable $th) {
                    Storage::delete($path);
                    $result = array(
                        "success" => false,
                        "message" => "Data quisioner gagal disimpan! $th"
                    );
                    return response($result, 200);
                }
            } else {
                DB::rollBack();
                Storage::delete($path);
                $result = array(
                    "success" => false,
                    "message" => "Data quisioner kosong. silakan unggah file yang sesuai."
                );
                return response($result, 200);
            }
        } else {
            $result = array(
                "success" => false,
                "message" => "File tidak sesuai!"
            );
            return response($result, 200);
        }
    }

    /**
     * Menampilkan halaman upload quisioner.
     */
    public function perusahaan($id)
    {
        $model_usaha = RPerusahaan::find($id);
        $data = array(
            "title" => $this->keterangan,
            "module" => $this->module,
            "breadcrumbs" => array(
                [
                    'title' => $this->keterangan,
                    'url' => $this->module
                ],
            ),
            "data" => array(
                'model_usaha' => $model_usaha,
            )
        );
        return view($this->module . '.perusahaan-quisioner', $data);
    }

    private function loadSpreadsheetFromRow($filePath, $startRow)
    {
        try {
            // Load the spreadsheet file
            $spreadsheet = IOFactory::load($filePath);

            // Get the first worksheet
            $worksheet = $spreadsheet->getActiveSheet();

            // Initialize an array to hold the data
            $data = [];

            // Loop through each row in the worksheet starting from the specified row
            foreach ($worksheet->getRowIterator($startRow) as $row) {
                $rowData = [];
                // Loop through each cell in the row
                foreach ($row->getCellIterator() as $cell) {
                    $rowData[] = $cell->getValue();
                }
                $data[] = $rowData;
            }

            return $data;
        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }
    }

    public function hasil($id)
    {
        $model = RPerusahaan::find($id);
        $model_pi = MPersonalIdentity::where('usaha_id', $model->usaha_id)->get();

        $kualifikasi_pi = array();

        foreach ($model_pi as $key => $value) {
            $kpi = $this->kualifikasiPI($value->kode,  $model->id);

            if (count($kpi) != 0) {
                array_push($kualifikasi_pi, [
                    'pi' =>  $value->personal_identity,
                    'penghasilan' => $this->penghasilan($kpi),
                    'ds' => $value->deskripsi,
                    'st' => $value->story,
                    'sy' => $this->jawabanTeratas($kpi, 24),
                    'pr' => $this->jawabanTeratas($kpi, 25),
                    'ne' => $this->jawabanTeratas($kpi, 26),
                    'bl' => $this->bulatRating($kpi),
                    'pm' => $this->promosi($kpi),

                ]);
            }
        }

        $data = array(
            'model' => $model,
            'model_pi' => $model_pi,
            'kualifikasi_pi' => $kualifikasi_pi
        );

        return view('template.b', $data);
    }
    private function kualifikasiPI($pi, $id_peru)
    {
        $model = DB::table('r_responden_jawabans')
            ->join('r_respondens', 'r_responden_jawabans.responden_id', '=', 'r_respondens.id')
            ->join('r_perusahaans', 'r_respondens.perusahaan_id', '=', 'r_perusahaans.id')
            ->where('r_perusahaans.id', $id_peru);

        switch ($pi) {
            case 'PI01':
                # code...
                $model->whereIn('r_responden_jawabans.jawaban_id', [15, 31, 1, 2, 3])
                    ->groupBy('r_respondens.id')
                    ->havingRaw('SUM(CASE WHEN r_responden_jawabans.jawaban_id IN (15, 31) THEN 1 ELSE 0 END) = 2')
                    ->havingRaw('SUM(CASE WHEN r_responden_jawabans.jawaban_id IN (1, 2, 3) THEN 1 ELSE 0 END) >= 1');
                break;
            case 'PI02':
                # code...
                $model->whereIn('r_responden_jawabans.jawaban_id', [8, 32, 33, 35, 36, 37])
                    ->groupBy('r_respondens.id')
                    ->havingRaw('SUM(CASE WHEN r_responden_jawabans.jawaban_id IN (8) THEN 1 ELSE 0 END) = 1')
                    ->havingRaw('SUM(CASE WHEN r_responden_jawabans.jawaban_id IN (32, 33) THEN 1 ELSE 0 END) >= 1')
                    ->havingRaw('SUM(CASE WHEN r_responden_jawabans.jawaban_id IN (35, 36, 37) THEN 1 ELSE 0 END) >= 1');
                break;
            case 'PI03':
                # code...
                $model->whereIn('r_responden_jawabans.jawaban_id', [4, 5, 18, 19, 20, 21, 22])
                    ->groupBy('r_respondens.id')
                    ->havingRaw('SUM(CASE WHEN r_responden_jawabans.jawaban_id IN (4, 5) THEN 1 ELSE 0 END) >= 1')
                    ->havingRaw('SUM(CASE WHEN r_responden_jawabans.jawaban_id IN (18, 19, 20, 21, 22) THEN 1 ELSE 0 END) >= 1');
                break;
            case 'PI04':
                # code...
                $model->where('r_responden_jawabans.jawaban_id', 20)->groupBy('r_respondens.id');
                break;
            case 'PI05':
                # code...
                $model->where('r_responden_jawabans.jawaban_id', 23)->groupBy('r_respondens.id');
                break;
            case 'PI06':
                # code...
                $model->where('r_responden_jawabans.jawaban_id', 22)->groupBy('r_respondens.id');
                break;
            case 'PI07':
                # code...
                $model->where('r_responden_jawabans.jawaban_id', 24)->groupBy('r_respondens.id');
                break;
            case 'PI08':
                # code...
                $model->where('r_responden_jawabans.jawaban_id', 4)->groupBy('r_respondens.id');
                break;
            case 'PI09':
                # code...
                $model->whereIn('r_responden_jawabans.jawaban_id', [32, 33, 35, 36, 37])
                    ->groupBy('r_respondens.id')
                    ->havingRaw('SUM(CASE WHEN r_responden_jawabans.jawaban_id IN (32, 33) THEN 1 ELSE 0 END) >= 1')
                    ->havingRaw('SUM(CASE WHEN r_responden_jawabans.jawaban_id IN (35, 36, 37) THEN 1 ELSE 0 END) >= 1');
                break;
            case 'PI10':
                # code...
                $model->where('r_responden_jawabans.jawaban_id', 17)->groupBy('r_respondens.id');
                break;
            default:
                # code...
                $model->groupBy('r_respondens.id');
                break;
        }

        $res = $model->pluck('r_respondens.id');

        return $res;
    }

    private function penghasilan($responden)
    {
        $model = DB::table('r_responden_jawabans')
            ->where('pertanyaan_id', 5)
            ->whereIn('responden_id', $responden)
            ->select('jawaban_id', DB::raw('count(*) as hasil'))
            ->groupBy('jawaban_id')
            ->orderBy('hasil', 'desc')
            ->first();

        $model_jawaban = MJawaban::find($model->jawaban_id);
        return $model_jawaban->jawaban;
    }

    private function jawabanTeratas($responden, $id)
    {
        $model = DB::table('r_responden_jawabans')
            ->where('pertanyaan_id', $id)
            ->whereIn('responden_id', $responden)
            ->select('jawaban_id', DB::raw('count(*) as hasil'))
            ->groupBy('jawaban_id')
            ->orderBy('hasil', 'desc')
            ->limit(3)
            ->pluck('jawaban_id');

        $model_jawaban = MJawaban::whereIn('id', $model)->get();
        return $model_jawaban;
    }

    private function bulatRating($responden)
    {
        $pertanyaan = MPertanyaan::where('jenis_jawaban', 'rep_likert')->get();
        $hasil = array();
        foreach ($pertanyaan as $key => $value) {
            $model = DB::table('r_responden_jawabans')
                ->where('pertanyaan_id', $value->id)
                ->whereIn('responden_id', $responden)
                ->pluck('jawaban_id');

            $nilai = 0;
            foreach ($model as $key1 => $value1) {
                switch ($value1) {
                    case 38:
                        $nilai = $nilai + 1;
                        break;
                    case 39:
                        $nilai = $nilai + 2;
                        break;
                    case 40:
                        $nilai = $nilai + 3;
                        break;
                    default:
                        # code...
                        break;
                }
            }

            array_push($hasil, ['id' => $value->id, 'pertanyaan' => $value->pertanyaan, 'nilai' => $nilai / count($responden)]);
        }

        return $hasil;
    }

    private function promosi($responden)
    {
        $pertanyaan = MPertanyaan::find(23);
        $hasil = array();
        foreach ($pertanyaan->jawabans as $key => $value) {

            $model = DB::table('r_responden_jawabans')
                ->where('pertanyaan_id', $pertanyaan->id)
                ->where('jawaban_id', $value->id)
                ->whereIn('responden_id', $responden)
                ->count();

            array_push($hasil, ['id' => $value->id, 'jawaban' => $value->jawaban, 'nilai' => $model, 'tl' => count($responden)]);
        }

        return $hasil;
    }
}
