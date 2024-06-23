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
            <p>Unggah Hasil Quisioner</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up">
            <div class="row gy-4">
                <div class="shadow p-5 mb-5 bg-white rounded">
                    <form action="forms/contact.php" method="post" data-aos="fade-up" data-aos-delay="200">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <label for="exampleFormControlInput1">Nama Perusahaan</label>
                                <input type="text" name="name" class="form-control" placeholder="Your Name"
                                    required="">
                            </div>

                            <div class="col-md-6 ">
                                <label for="exampleFormControlInput1">Kategori Perusahaan</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="exampleFormControlFile1">Example file input</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>



                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </div>

                        </div>
                    </form>
                </div>


            </div>

        </div>

    </section><!-- /Starter Section Section -->


</x-app-layout>
