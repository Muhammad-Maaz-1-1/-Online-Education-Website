@include('admin.layouts.header')
<div class="row justify-content-center">
    <div class="col-md-11">
        <div class="p-5 shadow-lg ">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">HOME ABOUT</h1>
            </div>
            <form class="row justify-content-between" method="POST" action="" enctype="multipart/form-data">

                <div class="form-group row">
                  
                 

                    <div class="col-lg-6 mb-3 mt-2">
                        <label for="title">title <span class="text-danger">*</span></label>
                        <input name="title" type="text" class="form-control form-control-user" placeholder="address"
                            required="">
                    </div>
                    <div class="col-lg-6 mb-3 mt-2">
                        <label for="description">description <span class="text-danger">*</span></label>
                        <input name="description" type="text" class="form-control form-control-user" placeholder="phone"
                            required="">
                    </div>
                 
                </div>

             
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    SUBMIT 
                </button>
        </div>

        </form>
    </div>
</div>


@include('admin.layouts.footer')
