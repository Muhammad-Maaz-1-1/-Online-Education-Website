@include('instructor.layouts.header')
<div class="row justify-content-center">
    <div class="col-md-11">
        <div class="p-5 shadow-lg ">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4 text-uppercase">{{ $user->role }} PLEASE COMPLETE YOUR PROFILE</h1>
            </div>
            <form class="row justify-content-between" method="POST" action="{{ route('profile_form_submit') }}"
            
                enctype="multipart/form-data">
                @csrf
                @if (session('success'))
                    <script>
                        toastr.success('{{ session('success') }}');
                    </script>
                    <p>{{ session('success') }}</p>
                @endif
                <input type="hidden" value="{{ $user->id }}" name="id">
                <div class="form-group row">
                    <div class="col-lg-6 mb-3 mt-2">
                        <label for="name">NAME <span class="text-danger">*</span></label>
                        <input name="name" value="{{ $user->name }}" type="text"
                            class="form-control form-control-user" placeholder="title" required="">

                    </div>
                    <div class="col-lg-6 mb-3 mt-2">
                        <label for="email">email <span class="text-danger">*</span></label>
                        <input name="email" value="{{ $user->email }}" type="text"
                            class="form-control form-control-user" placeholder="Skill " required="">
                    </div>
                 
                    <div class="col-lg-6 mb-3 mt-2">
                        <label for="skill">Skill <span class="text-danger">*</span></label>
                        <input name="skill" value="{{ $user->skill }}" type="text"
                            class="form-control form-control-user" placeholder="Skill " required="">
                    </div>
                    <div class="col-lg-6 mb-3 mt-2">
                        <label for="role">role <span class="text-danger">*</span></label>
                        <input name="role" disabled value="{{ $user->role }}" type="text"
                            class="form-control form-control-user" placeholder="role" required="">
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="image">PROFILE IMAGE</label>
                        {{-- <input name="image" class="form-control form-control-user2" type="file" required=""> --}}
                        {{--  --}}
                        <input type="file" class="form-control form-control-user2" id="choose-file" name="image"
                            accept="image/*" />
                        <div id="img-preview"></div>
                        <img style="
                        width: 300px;
                        margin: 10px;
                    " src="{{ asset('uploads') . '/' . $user->image }}" alt="">
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

                </div>


                <button type="submit" class="btn btn-primary btn-user btn-block">
                    UPDATE PROFIEL
                </button>
        </div>

        </form>
    </div>
</div>


@include('instructor.layouts.footer')
