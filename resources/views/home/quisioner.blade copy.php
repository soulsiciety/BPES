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
    <section id="starter-section" class="starter-section section ">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            {{-- <h2>Starter Section</h2> --}}
            <p>Unduh Quisioner</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up">
            <div class="row gy-4">
                <div class="shadow p-5 mb-5 bg-white rounded">
                    <form action="forms/contact.php" method="post" data-aos="fade-up" data-aos-delay="200">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <label for="exampleFormControlInput1">Nama Usaha</label>
                                <input type="text" name="name" class="form-control" placeholder="Your Name"
                                    required="">
                            </div>

                            <div class="col-md-6 ">
                                <label for="exampleFormControlInput1">Kategori Usaha</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    @foreach ($data['model_usaha'] as $item)
                                        <option value="{{ $item->kode }}">{{ $item->usaha }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="exampleFormControlInput1">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email"
                                    required="">
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="d-none loading">Loading</div>
                                <div class="d-none error-message"></div>
                                <div class="d-none sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit" class="btn w-100 btn-primary">Buat</button>
                            </div>

                        </div>
                    </form>
                </div>


            </div>

        </div>

    </section><!-- /Starter Section Section -->


</x-app-layout>
