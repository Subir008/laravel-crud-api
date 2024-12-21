<!-- Inherting layout -->
@extends('components/layout')

<!-- Title section -->
@section('title', 'Home')
<div class="auto-container ">
    <h2 class="bg-info text-white px-4 py-2">New Post</h2>
</div>

<div class="container-fluid px-5 py-4 mx-2">
    <form class="row g-3 mx-4">
        <div class="col-md-12">
            <label for="name" class="form-label">Title</label>
            <input type="text" class="form-control" id="name">
        </div>
        <div class="col-md-12">
            <label for="description" class="form-label">Description</label>
            <textarea type="password" class="form-control" id="description"></textarea>
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control" id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-lg btn-success col-4 ">Save</button>
        </div>
    </form>
</div>