<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionnaire</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        h1,
        h2,
        h3,
        h4 {
            text-align: center;
            margin: 0;
            padding: 0;
        }

        label {
            margin-top: -22px;
            margin-left: 20px;
        }

        .question {
            margin-bottom: 20px;
        }

        .question label {
            display: block !important;
            margin-bottom: 5px;
        }

        .flexn {
            display: inline-flex;
        }

        .flex {
            display: flex;
        }

        .m {
            margin-top: 8px;
            margin-left: 32px;
        }

        .mm {
            margin-left: 30px !important;
        }

        .s {
            margin-top: 8px;
        }

        span {
            content: "\2713";
        }
    </style>
</head>

<body>
    Kode : {{ $model_usaha->kode }}
    <div class="container">
        <h1>KUESIONER</h1>
        {{-- <h4>Nama Usaha: {{ $nama_usaha }}</h4> --}}
        <h4>Bidang Usaha: {{ $model_usaha->usaha }}</h4>
        <div class="instructions">
            <p>Pengisian ini dilakukan dengan cara memberikan tanda centang (<input type="checkbox" checked="checked" />)
                pada salah satu
                jawaban yang menurut Anda
                paling tepat.</p>
        </div>
        @foreach ($questions as $key => $value)
            @if (array_key_exists($value->id, $pertanyaan_space))
                @for ($i = 0; $i < $pertanyaan_space[$value->id]; $i++)
                    <p></p>
                @endfor
            @endif

            <div class="question">
                <div class="flex">
                    <div class="w">{{ $key + 1 }} .</div>
                    <label class="mm"> {{ $value->pertanyaan }}</label>
                </div>
                @if ($value->style_jawaban)
                    <div class="m">
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($value->jawabans as $keye => $valuee)
                            @if ($valuee->kode_usaha == $model_usaha->kode || $valuee->kode_usaha == '')
                                <div class="flex">
                                    <input type="checkbox">
                                    <label>{{ numtoalpa($no) . '. ' . $valuee->jawaban }}</label>
                                </div>
                                @php
                                    $no++;
                                @endphp
                            @endif
                        @endforeach
                    </div>
                @else
                    <div class="m">
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($value->jawabans as $keye => $valuee)
                            @if ($valuee->kode_usaha == $model_usaha->kode || $valuee->kode_usaha == '')
                                <div class="flexn">
                                    <input type="checkbox">
                                    <label>{{ numtoalpa($no) . '.' . $valuee->jawaban }}</label>
                                </div>
                                @php
                                    $no++;
                                @endphp
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</body>

</html>
