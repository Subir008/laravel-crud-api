$(document).ready(function(){

    var addform = document.querySelector('#addform');

    addform.onsubmit = async (e) => {
        e.preventDefault();

        const token = localStorage.getItem('api_token');

        let name = $('#name').val();
        let description = $('#description').val() ;
        let image = document.querySelector('#image').files[0];

        

    }

}); 