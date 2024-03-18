@include('admin.layouts.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">All Courses</h6>
            <a href="{{ route('admin_course_form') }}" class="btn bg-primary text-light pointer">ADD COURSE</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>TITLE </th>
                            <th>IMAGE</th>
                            <th>PRICE</th>
                            <th>LANGUAGES</th>
                            <th>CATEGORY</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($course as $key => $value)
                            <tr>
                                <td>{{ $value->title }}</td>
                                <td><img src="{{ asset('uploads') . '/' . $value->image }}" width="50"
                                        height="50" alt=""></td>
                                <td>{{ $value->price }}</td>
                                <td>{{ $value->language }}</td>
                                <td>{{ $value->category->name }}</td>
                                <td>{{ $value->status == 0 ? 'Pending' : 'Active' }}</td>
                                <td> <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                            height="20" viewBox="0 0 26 26">
                                            <path fill="currentColor"
                                                d="M20.094.25a2.245 2.245 0 0 0-1.625.656l-1 1.031l6.593 6.625l1-1.03a2.319 2.319 0 0 0 0-3.282L21.75.937A2.36 2.36 0 0 0 20.094.25zm-3.75 2.594l-1.563 1.5l6.875 6.875L23.25 9.75l-6.906-6.906zM13.78 5.438L2.97 16.155a.975.975 0 0 0-.5.625L.156 24.625a.975.975 0 0 0 1.219 1.219l7.844-2.313a.975.975 0 0 0 .781-.656l10.656-10.563l-1.468-1.468L8.25 21.813l-4.406 1.28l-.938-.937l1.344-4.593L15.094 6.75L13.78 5.437zm2.375 2.406l-10.968 11l1.593.343l.219 1.47l11-10.97l-1.844-1.843z" />
                                        </svg></a> <a href="{{ route('course_delete', $value->id) }}"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 26 26">
                                            <path fill="currentColor"
                                                d="M11.5-.031c-1.958 0-3.531 1.627-3.531 3.594V4H4c-.551 0-1 .449-1 1v1H2v2h2v15c0 1.645 1.355 3 3 3h12c1.645 0 3-1.355 3-3V8h2V6h-1V5c0-.551-.449-1-1-1h-3.969v-.438c0-1.966-1.573-3.593-3.531-3.593h-3zm0 2.062h3c.804 0 1.469.656 1.469 1.531V4H10.03v-.438c0-.875.665-1.53 1.469-1.53zM6 8h5.125c.124.013.247.031.375.031h3c.128 0 .25-.018.375-.031H20v15c0 .563-.437 1-1 1H7c-.563 0-1-.437-1-1V8zm2 2v12h2V10H8zm4 0v12h2V10h-2zm4 0v12h2V10h-2z" />
                                        </svg></a>
                                    <a href="{{ route('lecture', $value->id) }}"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="20" height="20" viewBox="0 0 48 48">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M40.787 5.676h-33a2 2 0 0 0-2 2v33a2 2 0 0 0 2 2h33a2 2 0 0 0 2-2v-33a2 2 0 0 0-2-2ZM39.273 15.97v-5a2 2 0 0 0-2-2h-7" />
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="m32.81 24.2l-14.97 8.643V15.556ZM9 36.706v2.085a.834.834 0 0 0 .834.835h2.92" />
                                        </svg></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

@include('admin.layouts.footer')
