@extends('frontend.layouts.master')

@section('title', 'Full Stack Laravel Developer - S. M. Mahfujur Rahman')
@section('description',
    'Explore the portfolio of S. M. Mahfujur Rahman, a full stack Laravel developer with expertise
    in PHP, JavaScript, and project management.')
@section('keywords',
    'S. M. Mahfujur Rahman, Developer, Laravel, PHP, Full Stack, Backend, Frontend, Freelancer,
    JavaScript')

@section('content')

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "{{ session('success') }}"
                });
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "error",
                    title: "{{ session('error') }}"
                });
            });
        </script>
    @endif
    @if (session('warning'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "warning",
                    title: "{{ session('warning') }}"
                });
            });
        </script>
    @endif


    <div class="cv_main_wrapper">

        <!-- Bottom To Top Start -->
        <div class="cv_top_icon">
            <a id="button">
                <img src="assets/images/gototop.svg" class="img-fluid">
            </a>
        </div>
        <!-- Bottom To Top End -->

        <!-- Project Section Start -->
        <section class="cv_project_wrapper" id="portfolio">
            <div class="cv_container container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="cv_sec_heading" data-aos="zoom-out">
                            <h2>Latest Projects</h2>
                            <p class="text-justify">Here are some of the innovative projects I have built or collaborated
                                on. Feel free to visit and explore the details :</p>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="cv_project_content">
                            @foreach ($projects as $item)
                                <div class="cv_project_box" data-aos="zoom-out-down" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" data-title="{{ $item->title }}"
                                    data-image="{{ asset('uploads/project/resized/' . $item->thumbnail) }}"
                                    data-description="{{ htmlspecialchars($item->description, ENT_QUOTES, 'UTF-8') }}"
                                    data-time="{{ $item->created_at->diffForHumans() }}">
                                    <div class="cv_project_img">
                                        <img src="{{ asset('uploads/project/resized/' . $item->thumbnail) }}"
                                            class="img-fluid project_img">
                                    </div>
                                    <div class="cv_project_text">
                                        <div class="cv_project_heading">
                                            <p>{{ $item->category->name }}</p>
                                            <span>
                                                <img src="assets/images/time.svg">
                                                {{ $item->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                        <div class="cv_project_title">
                                            <p>{{ $item->title }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-12">
                                <div class="col-12">
                                    <!-- Manual Pagination Links -->
                                    <div class="pagination-wrapper d-flex justify-content-center" id="pagination-links">
                                        @if ($projects->hasPages())
                                            <ul class="pagination">
                                                {{-- Previous Page Link --}}
                                                @if ($projects->onFirstPage())
                                                    <li class="page-item disabled"><span class="page-link">&laquo;
                                                            Previous</span></li>
                                                @else
                                                    <li class="page-item"><a class="page-link"
                                                            href="{{ $projects->previousPageUrl() }}"
                                                            rel="prev">&laquo; Previous</a></li>
                                                @endif

                                                {{-- Pagination Elements --}}
                                                @foreach ($projects->getUrlRange(1, $projects->lastPage()) as $page => $url)
                                                    <li
                                                        class="page-item {{ $projects->currentPage() == $page ? 'active' : '' }}">
                                                        <a class="page-link"
                                                            href="{{ $url }}">{{ $page }}</a>
                                                    </li>
                                                @endforeach

                                                {{-- Next Page Link --}}
                                                @if ($projects->hasMorePages())
                                                    <li class="page-item"><a class="page-link"
                                                            href="{{ $projects->nextPageUrl() }}" rel="next">Next
                                                            &raquo;</a></li>
                                                @else
                                                    <li class="page-item disabled"><span class="page-link">Next
                                                            &raquo;</span></li>
                                                @endif
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Project Section End -->

        <!-- Portfolio Section Start -->
        {{-- <div class="cv_portfolio_wrapper" id="portfolio">
            <div class="cv_container container-fluid">
                <div class="row">
                    <div class="col-12">
                        <ul class="cv_port_tab" data-aos="flip-down">
                            <li>
                                <a class="active" data-rel="tab-1" href="javascript:void(0)">All</a>
                            </li>
                            <li>
                                <a class="" data-rel="tab-2" href="javascript:void(0)">Website</a>
                            </li>
                            <li>
                                <a class="" data-rel="tab-3" href="javascript:void(0)">Mobile App</a>
                            </li>
                            <li>
                                <a class="" data-rel="tab-4" href="javascript:void(0)">Dashboard</a>
                            </li>
                            <li>
                                <a class="" data-rel="tab-5" href="javascript:void(0)">Creative</a>
                            </li>
                        </ul>
                        <!-- All Tab -->
                        <div class="cv_tab_pane " id="tab-1" style="display:block;">
                            <div class="cv_gallery_wrapper"  data-aos="fade-left">
                                <div class="cv_gallery_item item-1">
                                    <div class="cv_gallery_small">
                                        <div class="cv_gallery_img img-1">
                                            <img src="assets/images/port-1.webp" class="img-fluid">
                                            <span class="cv_gallery_hover">
                                                <p>Website</p>
                                                <h4>Creative Website</h4>
                                            </span>
                                        </div>
                                        <div class="cv_gallery_img img-2">
                                            <img src="assets/images/port-2.webp" class="img-fluid">
                                            <span class="cv_gallery_hover">
                                                <p>Website</p>
                                                <h4>Creative Website</h4>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="cv_gallery_img img-3">
                                        <img src="assets/images/port-5.webp" class="img-fluid">
                                        <span class="cv_gallery_hover">
                                            <p>Website</p>
                                            <h4>Creative Website</h4>
                                        </span>
                                    </div>
                                </div>
                                <div class="cv_gallery_item item-2">
                                    <div class="cv_gallery_img img-4">
                                        <img src="assets/images/port-3.webp" class="img-fluid">
                                        <span class="cv_gallery_hover">
                                            <p>Website</p>
                                            <h4>Creative Website</h4>
                                        </span>
                                    </div>
                                    <div class="cv_gallery_small">
                                        <div class="cv_gallery_img img-5">
                                            <img src="assets/images/port-4.webp" class="img-fluid">
                                            <span class="cv_gallery_hover">
                                                <p>Website</p>
                                                <h4>Creative Website</h4>
                                            </span>
                                        </div>
                                        <div class="cv_gallery_img img-6">
                                            <img src="assets/images/port-6.webp" class="img-fluid">
                                            <span class="cv_gallery_hover">
                                                <p>Website</p>
                                                <h4>Creative Website</h4>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Website Tab -->
                        <div class="cv_tab_pane" id="tab-2">
                            <div class="cv_gallery_wrapper">
                                <div class="cv_gallery_item item-1">
                                    <div class="cv_gallery_small">
                                        <div class="cv_gallery_img img-1">
                                            <img src="assets/images/port-1.webp" class="img-fluid">
                                            <span class="cv_gallery_hover">
                                                <p>Website</p>
                                                <h4>Creative Website</h4>
                                            </span>
                                        </div>
                                        <div class="cv_gallery_img img-2">
                                            <img src="assets/images/port-2.webp" class="img-fluid">
                                            <span class="cv_gallery_hover">
                                                <p>Website</p>
                                                <h4>Creative Website</h4>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="cv_gallery_img img-3">
                                        <img src="assets/images/port-5.webp" class="img-fluid">
                                        <span class="cv_gallery_hover">
                                            <p>Website</p>
                                            <h4>Creative Website</h4>
                                        </span>
                                    </div>
                                </div>
                                <div class="cv_gallery_item item-2">
                                    <div class="cv_gallery_img img-4">
                                        <img src="assets/images/port-3.webp" class="img-fluid">
                                        <span class="cv_gallery_hover">
                                            <p>Website</p>
                                            <h4>Creative Website</h4>
                                        </span>
                                    </div>
                                    <div class="cv_gallery_small">
                                        <div class="cv_gallery_img img-5">
                                            <img src="assets/images/port-4.webp" class="img-fluid">
                                            <span class="cv_gallery_hover">
                                                <p>Website</p>
                                                <h4>Creative Website</h4>
                                            </span>
                                        </div>
                                        <div class="cv_gallery_img img-6">
                                            <img src="assets/images/port-6.webp" class="img-fluid">
                                            <span class="cv_gallery_hover">
                                                <p>Website</p>
                                                <h4>Creative Website</h4>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Tab -->
                        <div class="cv_tab_pane" id="tab-3">
                            <div class="cv_gallery_wrapper">
                                <div class="cv_gallery_item item-1">
                                    <div class="cv_gallery_small">
                                        <div class="cv_gallery_img img-1">
                                            <img src="assets/images/port-1.webp" class="img-fluid">
                                            <span class="cv_gallery_hover">
                                                <p>Website</p>
                                                <h4>Creative Website</h4>
                                            </span>
                                        </div>
                                        <div class="cv_gallery_img img-2">
                                            <img src="assets/images/port-2.webp" class="img-fluid">
                                            <span class="cv_gallery_hover">
                                                <p>Website</p>
                                                <h4>Creative Website</h4>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="cv_gallery_img img-3">
                                        <img src="assets/images/port-5.webp" class="img-fluid">
                                        <span class="cv_gallery_hover">
                                            <p>Website</p>
                                            <h4>Creative Website</h4>
                                        </span>
                                    </div>
                                </div>
                                <div class="cv_gallery_item item-2">
                                    <div class="cv_gallery_img img-4">
                                        <img src="assets/images/port-3.webp" class="img-fluid">
                                        <span class="cv_gallery_hover">
                                            <p>Website</p>
                                            <h4>Creative Website</h4>
                                        </span>
                                    </div>
                                    <div class="cv_gallery_small">
                                        <div class="cv_gallery_img img-5">
                                            <img src="assets/images/port-4.webp" class="img-fluid">
                                            <span class="cv_gallery_hover">
                                                <p>Website</p>
                                                <h4>Creative Website</h4>
                                            </span>
                                        </div>
                                        <div class="cv_gallery_img img-6">
                                            <img src="assets/images/port-6.webp" class="img-fluid">
                                            <span class="cv_gallery_hover">
                                                <p>Website</p>
                                                <h4>Creative Website</h4>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Dashboard Tab -->
                        <div class="cv_tab_pane" id="tab-4">
                            <div class="cv_gallery_wrapper">
                                <div class="cv_gallery_item item-1">
                                    <div class="cv_gallery_small">
                                        <div class="cv_gallery_img img-1">
                                            <img src="assets/images/port-1.webp" class="img-fluid">
                                            <span class="cv_gallery_hover">
                                                <p>Website</p>
                                                <h4>Creative Website</h4>
                                            </span>
                                        </div>
                                        <div class="cv_gallery_img img-2">
                                            <img src="assets/images/port-2.webp" class="img-fluid">
                                            <span class="cv_gallery_hover">
                                                <p>Website</p>
                                                <h4>Creative Website</h4>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="cv_gallery_img img-3">
                                        <img src="assets/images/port-5.webp" class="img-fluid">
                                        <span class="cv_gallery_hover">
                                            <p>Website</p>
                                            <h4>Creative Website</h4>
                                        </span>
                                    </div>
                                </div>
                                <div class="cv_gallery_item item-2">
                                    <div class="cv_gallery_img img-4">
                                        <img src="assets/images/port-3.webp" class="img-fluid">
                                        <span class="cv_gallery_hover">
                                            <p>Website</p>
                                            <h4>Creative Website</h4>
                                        </span>
                                    </div>
                                    <div class="cv_gallery_small">
                                        <div class="cv_gallery_img img-5">
                                            <img src="assets/images/port-4.webp" class="img-fluid">
                                            <span class="cv_gallery_hover">
                                                <p>Website</p>
                                                <h4>Creative Website</h4>
                                            </span>
                                        </div>
                                        <div class="cv_gallery_img img-6">
                                            <img src="assets/images/port-6.webp" class="img-fluid">
                                            <span class="cv_gallery_hover">
                                                <p>Website</p>
                                                <h4>Creative Website</h4>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Creative Tab -->
                        <div class="cv_tab_pane" id="tab-5">
                            <div class="cv_gallery_wrapper">
                                <div class="cv_gallery_item item-1">
                                    <div class="cv_gallery_small">
                                        <div class="cv_gallery_img img-1">
                                            <img src="assets/images/port-1.webp" class="img-fluid">
                                            <span class="cv_gallery_hover">
                                                <p>Website</p>
                                                <h4>Creative Website</h4>
                                            </span>
                                        </div>
                                        <div class="cv_gallery_img img-2">
                                            <img src="assets/images/port-2.webp" class="img-fluid">
                                            <span class="cv_gallery_hover">
                                                <p>Website</p>
                                                <h4>Creative Website</h4>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="cv_gallery_img img-3">
                                        <img src="assets/images/port-5.webp" class="img-fluid">
                                        <span class="cv_gallery_hover">
                                            <p>Website</p>
                                            <h4>Creative Website</h4>
                                        </span>
                                    </div>
                                </div>
                                <div class="cv_gallery_item item-2">
                                    <div class="cv_gallery_img img-4">
                                        <img src="assets/images/port-3.webp" class="img-fluid">
                                        <span class="cv_gallery_hover">
                                            <p>Website</p>
                                            <h4>Creative Website</h4>
                                        </span>
                                    </div>
                                    <div class="cv_gallery_small">
                                        <div class="cv_gallery_img img-5">
                                            <img src="assets/images/port-4.webp" class="img-fluid">
                                            <span class="cv_gallery_hover">
                                                <p>Website</p>
                                                <h4>Creative Website</h4>
                                            </span>
                                        </div>
                                        <div class="cv_gallery_img img-6">
                                            <img src="assets/images/port-6.webp" class="img-fluid">
                                            <span class="cv_gallery_hover">
                                                <p>Website</p>
                                                <h4>Creative Website</h4>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="cv_bottom_btn">
                            <a href="javascript:void(0)" class="cv_btn"  data-aos="fade-right">View More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Portfolio Section End -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content cv_main_wrapper">
                <div class="modal-body m-2">
                    <div class="text-end">
                        <img data-bs-dismiss="modal" aria-label="Close" src="{{ asset('assets/images/close3.svg') }}"
                            alt="exit" width="50" style="opacity: 70%">

                    </div>
                    <img id="modal-image" class="d-flex m-auto mt-2" src="" alt="Project Image">
                    <div class="modal-title-time">
                        <h1 id="modal-title" class="my-3 text-justify"></h1>
                        <h3 id="modal-time" class="my-3 text-justify"></h3>
                    </div>
                    <p id="modal-description" class="my-3 text-justify"></p>
                </div>
            </div>
        </div>
    </div>

    @push('script')
    <script>

        //Modal
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('exampleModal');

    modal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget; // Button that triggered the modal
        const title = button.getAttribute('data-title');
        const image = button.getAttribute('data-image');
        const description = button.getAttribute('data-description');
        const time = button.getAttribute('data-time');

        // Decode HTML entities to get the correct formatted HTML
        const decodeHtml = function(html) {
            const txt = document.createElement('textarea');
            txt.innerHTML = html;
            return txt.value;
        };

        const formattedDescription = decodeHtml(description);

        // Update the modal's content.
        const modalTitle = modal.querySelector('#modal-title');
        const modalImage = modal.querySelector('#modal-image');
        const modalDescription = modal.querySelector('#modal-description');
        const modalTime = modal.querySelector('#modal-time');

        if (modalTitle) {
            modalTitle.textContent = title;
        }
        modalImage.src = image;
        modalDescription.innerHTML = formattedDescription; // Use innerHTML to set formatted text
        modalTime.textContent = time;
    });
});
    </script>

    @endpush
@endsection
