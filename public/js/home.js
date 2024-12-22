$(document).ready(function () {
    const token = localStorage.getItem("api_token");
    console.log(token);

    if (!token) {
        window.location.href = "/";
    }

    // Logout functionality using both fetch method and ajax method
    document.querySelector("#logoutbtn").addEventListener("click", function () {
        // Getting the token store at the time of login for logouting the user
        const token = localStorage.getItem("api_token");
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
            url: "/api/logout",
            method: "POST",
            // data : JSON.stringify({
            //   token : token
            // }),
            headers: {
                Authorization: `Bearer ${token}`,
            },
            success: function (data) {
                console.log(data);
                // window.location.href = "/";
                localStorage.removeItem("api_token");
            },
        });
    });

    // Get all data
    function loadData() {
        const token = localStorage.getItem("api_token");

        fetch("/api/post", {
            method: "GET",
            headers: {
                Authorization: `Bearer ${token}`,
            },
        })
            .then((response) => response.json())
            .then((data) => {
                // console.log(data.data);

                let postData = data.data;
                let postcontainer = document.querySelector("#post-container");

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

                postData.forEach((post) => {
                    let postid = 1;
                    tableData += `
                    <tr>
                    <th scope="row">${postid}</th>
                    <td><img src="upload/${post.image}" width="150px"></td>
                    <td>${post.name}</td>
                    <td>${post.description}</td>
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal" data-bs-target="#staticBackdrop" data-bs-postid="${post.id}" >View</button></td>
                    <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal" data-bs-postid="${post.id}" >Update</button></td>
                    <td><button type="button" onclick="delete_data(${post.id})" class="btn btn-danger">Delete</button></td>
                  </tr>
                  `;
                    postid + 1;
                });

                tableData += `</tbody>
                    </table>`;

                postcontainer.innerHTML = tableData;
            });
    }

    loadData();

    // Open Single Post Modal and load data
    var viewModal = document.querySelector("#viewModal");

    if (viewModal) {
        viewModal.addEventListener("show.bs.modal", function (event) {
            // Button that triggered the modal
            var button = event.relatedTarget;
            // Extract info from data-bs-* attributes
            var id = button.getAttribute("data-bs-postid");

            const token = localStorage.getItem("api_token");

            fetch(`/api/post/${id}`, {
                method: "GET",
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    const post = data.post;

                    const modalBody = document.querySelector(
                        " #viewModal .modal-body"
                    );
                    modalBody.innerHTML = `
            <div class='container'>
              <div class='col-md-12'>
                <label for='name' class='form-label'>Title</label>
                <input type='text' class='form-control' id='name' value='${post.name}'>
              </div>
              <div class='col-md-12 my-2'>
              <label for='description' class='form-label'>Description</label>
              <textarea class='form-control' id='description'>${post.description}</textarea>
              </div>
              <div class='col-md-12 my-4'>
                  <img src='upload/${post.image}' height='150px' >
              </div>
              
            </div>
            `;
                });
        });
    }

    // Delete data
});

function delete_data(id) {
    const token = localStorage.getItem("api_token");

    console.log(id);

    $.ajax({
        url: `/api/post/${id}`,
        type: "DELETE",
        headers: {
            Authorization: `Bearer ${token}`,
        },
        success: function (data) {
            alert("Data deleted");
            window.location.reload();
        },
    });
}
