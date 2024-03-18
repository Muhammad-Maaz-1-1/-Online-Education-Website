@include('student.layouts.header')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">All Courses</h6>
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
                        @foreach ($enrollment as $key => $value)
                            <tr>
                                <td>{{ $value->course->title }}</td>
                                <td><img src="{{ asset('uploads') . '/' . $value->course->image }}" width="50"
                                        height="50" alt=""></td>
                                <td>${{ $value->course->price }}</td>
                                <td>{{ $value->course->language }}</td>
                                <td>{{ $value->course->category->name }}</td>
                                <td>{{ $value->status == 0 ? 'Pending' : 'Active' }}</td>
                                <td> 
                                    <a href="{{ route('student_lecture', $value->course_id) }}"><svg xmlns="http://www.w3.org/2000/svg"
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

@include('student.layouts.footer')
