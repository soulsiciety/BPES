@section('header-css', 'sticky-top')
<x-app-layout>
    <!-- Page Title -->
    <div class="page-title">
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Starter Page</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section values section ">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            {{-- <h2>Starter Section</h2> --}}
            <p>Quisioner</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up">
            <div class="row gy-4">

                @foreach ($data['model_usaha'] as $item)
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <img src="assets/img/values-3.png" class="img-fluid" alt="">
                            <h3>{{ $item->usaha }}</h3>
                            <p>{{ $item->keterangan }}
                            </p>
                            <a href="{{ url("quisioner/$item->kode") }}" class="align-bottom btn btn-primary"><i
                                    class="bi bi-cloud-arrow-down"></i>
                                Download Quisioner</a>
                        </div>
                    </div><!-- End Card Item -->
                @endforeach
            </div>

        </div>

    </section><!-- /Starter Section Section -->


</x-app-layout>
