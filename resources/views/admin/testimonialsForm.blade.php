@include('admin.layouts.header')
<div class="row justify-content-center">
    <div class="col-md-11">
        <div class="p-5 shadow-lg ">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Add new testimonials</h1>
            </div>
            <form class="row justify-content-between" method="POST" action="" enctype="multipart/form-data">
                
                <div class="form-group row">
                    <div class="col-lg-6 mb-3 mt-2">
                        <label for="heading">NMAE <span class="text-danger">*</span></label>
                        <input name="title" type="text" class="form-control form-control-user" placeholder="title"
                            required="">
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="image"> IMAGE</label>
                        <input name="image" class="form-control form-control-user2" type="file" required="">

                    </div>

 <div class="col-lg-6 mb-3 mt-2">
                        <label for="heading">Skill <span class="text-danger">*</span></label>
                        <input name="skill" type="text" class="form-control form-control-user" placeholder="title"
                            required="">
                    </div>
              
                </div>

                <div class="col-lg-12 mb-3">
                    <label for="image"> description</label>
                    <textarea id="testimonialDescrption" name="description" style="display: none;">&lt;p&gt;This is some sample content.&lt;/p&gt;</textarea>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            ClassicEditor
                                .create(document.querySelector('#testimonialDescrption'))
                                .catch(error => {
                                    console.error(error);
                                });
                        });
                    </script>



                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Add Testimonials
                </button>
        </div>

        </form>
    </div>
</div>


@include('admin.layouts.footer')
