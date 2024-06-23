<?php

namespace App\Http\Controllers;

use App\Models\MPertanyaan;
use App\Models\MTemplateSet;
use App\Models\MUsaha;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;
use TCPDF;

class QuisionerController extends Controller
{
    protected $module, $keterangan;
    public function __construct()
    {
        $this->module = "home";
        $this->keterangan = "Home";
    }
    /**
     * Display a listing of the resource.
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
     * Show the profile for a given user.
     */
    public function generateQuisioner(string $kode_usaha)
    {
        $usaha = 1;
        $model = MPertanyaan::get();
        $model_usaha = MUsaha::find($usaha);

        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
        $phpWord = new PhpWord();

        // Define a numbering style
        $numberingStyle = array('type' => 'multilevel', 'levels' => array(
            array('format' => 'decimal', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360),
        ));
        // Define a numbering style
        $numberingStyle1 = array('type' => 'multilevel', 'levels' => array(
            array('format' => 'decimal', 'text' => "•", 'left' => 360, 'hanging' => 360, 'tabPos' => 360),
        ));

        // Add the numbering style to the document
        $phpWord->addNumberingStyle('multilevel', $numberingStyle);
        $phpWord->addNumberingStyle('multilevel1', $numberingStyle1);

        // Adding an empty Section to the document...
        $section = $phpWord->addSection();
        // Adding Text element to the Section having font styled by default...
        $section->addText('KUESIONER', array('bold' => true, 'size' => 14), array('alignment' => 'center'));
        $section->addText('Bidang Usaha : ' . htmlspecialchars($model_usaha->usaha), array('bold' => true, 'size' => 11), array('alignment' => 'center'));
        $section->addText('Petunjuk Pengisian', array('bold' => true, 'size' => 12));
        $section->addListItem('Pengisian ini dilakukan dengan cara memberikan tanda silang (✔) pada salah
satu jawaban yang menurut Anda paling tepat.', 0, null, 'multilevel1');
        $section->addTextBreak(1);
        foreach ($model as $key => $value) {

            $section->addListItem(htmlspecialchars($value->pertanyaan), 0, array('size' => 12), 'multilevel');

            if ($value->style_jawaban) {
                foreach ($value->jawabans as $keye => $valuee) {
                    if ($valuee->kode_usaha == $model_usaha->kode || $valuee->kode_usaha == "") {
                        $section->addText("☐" . numtoalpa($keye) . '. ' . htmlspecialchars($valuee->jawaban), array('size' => 12), array(
                            'indentation' => array('left' => 360),
                        ));
                    }
                }
            } else {
                $textRun = $section->addTextRun(array(
                    'indentation' => array('left' => 360),
                ));
                foreach ($value->jawabans as $keye => $valuee) {
                    if ($valuee->kode_usaha == $model_usaha->kode || $valuee->kode_usaha == "") {
                        // $textRun->addText('o', array('size' => 12));
                        $textRun->addText(numtoalpa($keye) . '. ' . htmlspecialchars($valuee->jawaban) . ' ', array('size' => 12));
                    }
                }
            }
        }

        // $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        // $objWriter->save(storage_path('helloWorld.docx'));

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
        $html = $objWriter->save(storage_path('helloWorld.html'));

        // $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'PDF');
        // $objWriter->save(storage_path('helloWorld.pdf'));

        // $phpWordToPdf = \PhpOffice\PhpWord\IOFactory::load(storage_path('helloWorld.docx'));
        // $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWordToPdf, 'PDF');
        // $xmlWriter->save(storage_path('helloWorld.pdf'));
    }


    public function downloadPDF(string $kode_usaha)
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
            'questions' => $model_pertanyaan
        ])->render();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream('questionnaire.pdf', ['Attachment' => true]);
    }
}
