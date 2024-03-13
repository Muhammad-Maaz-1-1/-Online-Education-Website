@include('admin.layouts.header')
<div class="row justify-content-center">
    <div class="col-md-11">
        <div class="p-5 shadow-lg ">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Add new Course</h1>
            </div>
            <form class="row justify-content-between" method="POST" action="" enctype="multipart/form-data">
                
                <div class="form-group row">
                    <div class="col-lg-6 mb-3 mt-2">
                        <label for="heading">TITLE <span class="text-danger">*</span></label>
                        <input name="title" type="text" class="form-control form-control-user" placeholder="title"
                            required="">
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="image">FEATURED IMAGE</label>
                        <input name="image" class="form-control form-control-user2" type="file" required="">

                    </div>

                    <div class="col-lg-12 mb-3">
                        <label for="image">Short description</label>
                        <textarea id="editorss" name="long_description" style="display: none;">&lt;p&gt;This is some sample content.&lt;/p&gt;</textarea>

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
                    <input name="lectures" type="text" class="form-control form-control-user"
                        placeholder="lectures" required="">
                </div>
                <div class="col-lg-6 mb-3 mt-2">
                    <label for="menu_name">DURATIONS<span class="text-danger">*</span></label>
                    <input name="menu_name" type="text" class="form-control form-control-user"
                        placeholder="durations" required="">
                </div>
                <div class="col-lg-6 mb-3 mt-2">
                    <label for="menu_name">SKILL LEVEL<span class="text-danger">*</span></label>
                    <input name="skilllevel" type="text" class="form-control form-control-user"
                        placeholder="SKILL LEVEL" required="">
                </div>
                <div class="col-lg-6 mb-3 mt-2">
                    <label for="menu_name">LANGUAGE<span class="text-danger">*</span></label>
                    <input name="languages" type="text" class="form-control form-control-user"
                        placeholder="languages" required="">
                </div>
                <div class="col-lg-6 mb-3 mt-2">
                    <label for="menu_name">COURSE PRICE<span class="text-danger">*</span></label>
                    <input name="price" type="text" class="form-control form-control-user"
                        placeholder="COURSE PRICE" required="">
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="status">COURSE CATEGORY<span class="text-danger">*</span></label>
                    <select name="category" class="form-control form-control-user1">
                        <option value="active" selected="">Active</option>
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
