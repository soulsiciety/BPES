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
            <p>Unduh Quisioner</p>
            <h2>Kategori Usaha</h2>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up">

            <div class="card">
                <ul class="list-group list-group-flush">
                    @foreach ($data['model_usaha'] as $key => $item)
                        <li class="list-group-item">
                            <h3>{{ $key + 1 . '. ' . $item->usaha }} <a style="float: right"
                                    href="{{ url('') }}/quisioner/get/{{ $item->kode }}" target="_blank"
                                    rel="noopener noreferrer"><i class="bi bi-cloud-arrow-down"></i></a></h2>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </section><!-- /Starter Section Section -->


</x-app-layout>
