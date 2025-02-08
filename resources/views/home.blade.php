<!-- Inherting layout -->
@extends('components/layout')

<!-- Title section -->
@section('title', 'Home')

<!-- Main section -->
@section('home-main')
<header class="p-3 bg-dark text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center  justify-content-end">

      <div class="text-end">
        <a type="button" class="btn btn-success me-2" href="{{route('new-post')}}">Add New</a>
        <button type="button" class="btn btn-outline-danger me-2" id="logoutbtn">Log Out</button>
      </div>

    </div>
  </div>
</header>
@endsection

<!-- Table section -->
@section('home-table')
<div class="container my-4" id="post-container">
</div>

<!--View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewModal">Single Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      </div>
    </div>
  </div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" id="updateform">
        <div class="modal-body">
          <input type="hidden" name="" id="update_id" value="">
          <div class='col-md-12'>
            <label for='name' class='form-label'>Title</label>
            <input type='text' class='form-control' id='update_name' value=''>
          </div>
          <div class='col-md-12 my-2'>
            <label for='description' class='form-label'>Description</label>
            <textarea class='form-control' id='update_description'></textarea>
          </div>
          <div class='col-md-12 my-4 d-flex justify-content-center'>
            <img src='' height='150px' id="image">
          </div>
          <div class="input-group mb-3">
            <input type="file" class="form-control" id="image_upload">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection


@section('js')
<script src="/js/home.js"></script>
@endsection