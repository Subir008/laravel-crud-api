<!-- Inherting layout -->
@extends('components/layout')

<!-- Title section -->
@section('title', 'Home')

<!-- Main section -->
@section('home-main')
<header class="p-3 bg-dark text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-end">

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
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary">Save changes</button>
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
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection


@section('home_js')
<script>
  $(document).ready(function () {

    const token = localStorage.getItem('api_token');
    console.log(token);

    if (!token) {
      window.location.href = "/";
    }

    // Logout functionality using both fetch method and ajax method
    document.querySelector("#logoutbtn").addEventListener('click', function () {

      // Getting the token store at the time of login for logouting the user
      const token = localStorage.getItem('api_token');
      console.log(token);

      // Using Fetch Method
      // fetch('/api/logout' ,{
      //   method : 'POST',
      //   headers : {
      //     'Authorization' : `Bearer ${token}`
      //   }
      // })
      // .then(response => response.json())
      // .then(data => {
      //   console.log(data);
      //   window.location.href = "/";
      // });

      // Using AJAX
      $.ajax({
        url: '/api/logout',
        method: 'POST',
        // data : JSON.stringify({
        //   token : token
        // }),
        headers: {
          'Authorization': `Bearer ${token}`
        },
        success: function (data) {
          console.log(data);
          // window.location.href = "/";
          localStorage.removeItem('api_token');
        }
      })

    })

    // Get all data
    function loadData() {
      const token = localStorage.getItem('api_token');

      fetch('/api/post', {
        method: 'GET',
        headers: {
          'Authorization': `Bearer ${token}`
        }
      })
        .then(response => response.json())
        .then(data => {
          // console.log(data.data);

          let postData = data.data;
          let postcontainer = document.querySelector('#post-container');

          let tableData = `
                    <table class="table  table-hover text-center ">
                      <thead class="table-primary">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Image</th>
                          <th scope="col">Name</th>
                          <th scope="col">Description</th>
                          <th scope="col">View</th>
                          <th scope="col">Update</th>
                          <th scope="col">Delete</th>
                        </tr>
                      </thead>
                      <tbody> `;

          postData.forEach(post => {
            let postid = 1 ;
            tableData += `
                          <tr>
                          <th scope="row">${postid}</th>
                          <td><img src="upload/${post.image}" width="150px"></td>
                          <td>${post.name}</td>
                          <td>${post.description}</td>
                          <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                              data-bs-target="#viewModal" data-bs-target="#staticBackdrop" data-bs-postid="${post.id}" >View</button></td>
                          <td><button type="button" class="btn btn-warning" data-bs-toggle="modal"
                              data-bs-target="#updateModal" data-bs-postid="${post.id}" >Update</button></td>
                          <td><button type="button" class="btn btn-danger" data-bs-toggle="modal"
                              data-bs-target="#exampleModal" data-bs-postid="${post.id}" >Delete</button></td>
                        </tr>
                  `;
              postid+1 ;
          });

          tableData += `</tbody>
                    </table>`;

          postcontainer.innerHTML = tableData;
        });
    }
    loadData();

    // Open Single Post Modal
    var viewModal = document.querySelector('#viewModal');

    if (viewModal) {
      viewModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var id = button.getAttribute('data-bs-postid')
        
        const token = localStorage.getItem('api_token');

      fetch(`/api/post/${id}`, {
        method: 'GET',
        headers: {
          'Authorization': `Bearer ${token}`
        }
      })
        .then(response => response.json())
        .then(data =>{
          console.log(data.post);
          const post = data.post;

          const modalBody = document.querySelector(" #viewModal .modal-body");
          modalBody.innerHTML = `
          
          `;

          
        });
      })
    }

  });
</script>
@endsection