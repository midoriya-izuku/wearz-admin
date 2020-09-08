function readURL (input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        let image = document.getElementById('uploaded-image');
        reader.onload = function (e) {
            image.setAttribute('src',e.target.result)
            image.style.visibility = "visible";
            image.style.width = "100%";
            image.style.height = "90%";
        };

        reader.readAsDataURL(input.files[0]);
    }
}
window.readURL = readURL;