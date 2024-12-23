var addform = document.querySelector("#addform");

addform.onsubmit =  (e) => {
    e.preventDefault();

    const token = localStorage.getItem("api_token");

    let name = document.querySelector("#name").value;
    let description = document.querySelector("#description").value;
    let image = document.querySelector("#image").files[0];

    var formdata = new FormData();

    formdata.append("name", name);
    formdata.append("description", description);
    formdata.append("image", image);

    let response =  fetch("/api/post", {
        method: "POST",
        body: formdata,
        headers: {
            Authorization: `Bearer ${token}`,
        },
    })
        .then(response => response.json())
        .then((data) => {
            console.log(data);
            window.location.href = '/home' ;
        });
};
