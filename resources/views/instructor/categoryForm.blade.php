@include('admin.layouts.header')
<div class="row justify-content-center">
    <div class="col-md-11">
        <div class="p-5 shadow-lg ">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Add new Category</h1>
            </div>
            <form class="row justify-content-between" method="POST" action="{{ route('category_form_submit') }}" enctype="multipart/form-data">
                @if(session('success'))
    <script>
        toastr.success('{{ session('success') }}');
    </script>
@endif

                @csrf
                    <div class="col-lg-12 mb-3 mt-2">
                    <label for="category">Category Name<span class="text-danger">*</span></label>
                    <input name="category" type="text" class="form-control form-control-user"
                        placeholder="category" required="">
                </div>
            
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Add Category
                </button>
        </div>

        </form>
    </div>
</div>


@include('admin.layouts.footer')
