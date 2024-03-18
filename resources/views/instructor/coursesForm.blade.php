@include('instructor.layouts.header')
<div class="row justify-content-center">
    <div class="col-md-11">
        <div class="p-5 shadow-lg ">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Add new Course</h1>
            </div>
            <form class="row justify-content-between" method="POST" action="{{ route('admin_course_form_submit') }}"
                enctype="multipart/form-data">

                @csrf
                @if (session('success'))
                    <script>
                        toastr.success('{{ session('success') }}');
                    </script>
                    <p>{{ session('success') }}</p>
                @endif
                <input type="hidden" id="instructor_id" name="instructor_id" value="{{ auth()->id() }}">
                <div class="form-group row">
                    <div class="col-lg-6 mb-3 mt-2">
                        <label for="title">TITLE <span class="text-danger">*</span></label>
                        <input name="title" type="text" class="form-control form-control-user" placeholder="title"
                            required="">
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="image">FEATURED IMAGE</label>
                        {{-- <input name="image" class="form-control form-control-user2" type="file" required=""> --}}
                        {{--  --}}
                        <input type="file" class="form-control form-control-user2" id="choose-file" name="image"
                            accept="image/*" />
                        <div id="img-preview"></div>
                        <script>
                            const chooseFile = document.getElementById("choose-file");
                            const imgPreview = document.getElementById("img-preview");

                            chooseFile.addEventListener("change", function() {
                                getImgData();
                            });

                            function getImgData() {
                                const files = chooseFile.files[0];
                                if (files) {
                                    const fileReader = new FileReader();
                                    fileReader.readAsDataURL(files);
                                    fileReader.addEventListener("load", function() {
                                        imgPreview.style.display = "block";
                                        imgPreview.innerHTML = '<img class="imagePreview" src="' + this.result + '" />';
                                    });
                                }
                            }
                        </script>
                        {{--  --}}

                    </div>

                    <div class="col-lg-12 mb-3">
                        <label for="image">Short description</label>
                        <textarea id="editorss" name="description" style="display: none;">&lt;p&gt;This is some sample content.&lt;/p&gt;</textarea>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                ClassicEditor
                                    .create(document.querySelector('#editorss'))
                                    .catch(error => {
                                        console.error(error);
                                    });
                            });
                        </script>



                    </div>
                </div>

                <div class="col-lg-6 mb-3 mt-2">
                    <label for="lectures">Total Lectures<span class="text-danger">*</span></label>
                    <input name="lectures" type="text" class="form-control form-control-user" placeholder="lectures"
                        required="">
                </div>
                <div class="col-lg-6 mb-3 mt-2">
                    <label for="durations">DURATIONS<span class="text-danger">*</span></label>
                    <input name="durations" type="text" class="form-control form-control-user"
                        placeholder="durations" required="">
                </div>
                <div class="col-lg-6 mb-3 mt-2">
                    <label for="skill">SKILL LEVEL<span class="text-danger">*</span></label>
                    <input name="skill" type="text" class="form-control form-control-user"
                        placeholder="SKILL LEVEL" required="">
                </div>
                <div class="col-lg-6 mb-3 mt-2">
                    <label for="language">LANGUAGE<span class="text-danger">*</span></label>
                    <input name="language" type="text" class="form-control form-control-user" placeholder="language"
                        required="">
                </div>
                <div class="col-lg-6 mb-3 mt-2">
                    <label for="price">COURSE PRICE<span class="text-danger">*</span></label>
                    <input name="price" type="text" class="form-control form-control-user"
                        placeholder="COURSE PRICE" required="">
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="status">COURSE CATEGORY<span class="text-danger">*</span></label>
                    <select name="category" class="form-control form-control-user1">
                        <option value="category select">category select</option>
                        @foreach ($category as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Add Course
                </button>
        </div>

        </form>
    </div>
</div>


@include('admin.layouts.footer')
