@section('header-css', 'sticky-top')
<x-app-layout>
    <!-- Page Title -->
    <div class="page-title">
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ url('') }}">Home</a></li>
                    <li class="current">Quisioner</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section ">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <p>Perusahaan</p>
            {{-- <h2>Kategori Usaha</h2> --}}
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up">

            <div class="card">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row" class="w-25">Nama Perusahaan</th>
                            <td>{{ $data['model_usaha']->nama }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Kategori Usaha</th>
                            <td>{{ $data['model_usaha']->jenisUsaha->usaha }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Jumlah Responden</th>
                            <td>{{ $data['model_usaha']->respondens->count() }} Responden</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div>
                <h2>Persona Identity</h2>
            </div>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe scrolling="auto" class="embed-responsive-item"
                    src="{{ url('quisioner/pi') }}/{{ $data['model_usaha']->id }}" frameborder="0"
                    allowfullscreen></iframe>

            </div>
        </div>
    </section><!-- /Starter Section Section -->

    @section('css')
        <style>
            .embed-responsive {
                position: relative;
                display: block;
                width: 100%;
                padding: 0;
                overflow: hidden;
                height: 700px;
            }

            .embed-responsive .embed-responsive-item,
            .embed-responsive embed,
            .embed-responsive iframe,
            .embed-responsive object,
            .embed-responsive video {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 100%;
                border: 0;
            }
        </style>
    @endsection
    @prepend('js')
        <script></script>
    @endprepend
</x-app-layout>
