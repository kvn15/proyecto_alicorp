@extends('adminPanel.template.layout')
@section('contenido')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Slider</h4> <br><br>
                    {{--   --}}
                    <form method="post" action="{{ route('adminPanel.update.slide') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $slider->id }}">

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Slider </label>
                            <div class="col-sm-10">
                                <input name="image" class="form-control" type="file" id="image">
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                            <div class="col-sm-10">
                                <img id="showImage" class="rounded avatar-lg" src="{{asset('storage/'.$slider->home_slide)}}"
                                    alt="Card image cap">
                            </div>
                        </div>
                        <!-- end row -->
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Actualizar Slider">
                    </form>



                </div>
            </div>
        </div> <!-- end col -->
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
