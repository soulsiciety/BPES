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

                @for ($i = 0; $i < 4; $i++)
                    <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <img src="assets/img/values-1.png" class="img-fluid" alt="">
                            <h3>Ad cupiditate sed est odio</h3>
                            <p>Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit. Et veritatis id.
                            </p>
                            <form action="#" method="post">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-cloud-arrow-down"></i>
                                    Quisioner</button>
                            </form>
                        </div>
                    </div><!-- End Card Item -->
                @endfor


            </div>

        </div>

    </section><!-- /Starter Section Section -->


</x-app-layout>
