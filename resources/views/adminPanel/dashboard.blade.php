@extends('adminPanel.template.layout')

@php
    $homeslide = ''
@endphp

@section('contenido')
<div class="page-content">
    <div class="container-fluid">
        <h1>Configuracion Home</h1>
        <div class="row proyecto">         
                
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
    
                <h4 class="card-title">Home Slide Page </h4>
                {{-- {{ route('update.slider') }}    {{ $homeslide->id }}--}}
                <form method="post" action="#" enctype="multipart/form-data">
                    @csrf
    
                    <input type="hidden" name="id" value="">
    
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input name="title" class="form-control" type="text" value="{{ $homeslide->title }}"  id="example-text-input">
                    </div>
                </div>
                <!-- end row -->
    
                  <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Title </label>
                    <div class="col-sm-10">
                        <input name="short_title" class="form-control" type="text" value="{{ $homeslide->short_title }}"  id="example-text-input">
                    </div>
                </div>
                <!-- end row -->
    
    
                  <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Video URL </label>
                    <div class="col-sm-10">
                        <input name="video_url" class="form-control" type="text" value="{{ $homeslide->video_url }}"  id="example-text-input">
                    </div>
                </div>
                <!-- end row -->
    
    
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Slider Image </label>
                    <div class="col-sm-10">
           <input name="home_slide" class="form-control" type="file"  id="image">
                    </div>
                </div>
                <!-- end row -->
    
                  <div class="row mb-3">
                     <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                    <div class="col-sm-10">
      <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($homeslide->home_slide))? url( $homeslide->home_slide):url('upload/no_image.jpg') }}" alt="Card image cap">
                    </div>
                </div>
                <!-- end row -->
    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Slide">
                </form>
                 
               
               
            </div>
        </div>
    </div> <!-- end col -->
    </div>
    </div>
</div>
@endsection

