// Image preview before adding post

const imgPreview = document.getElementById('img')
imgPreview.style.display = 'none';

function readURL(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader()
        imgPreview.style.display = 'block';

        reader.addEventListener('load', (e) => {
            imgPreview.src = reader.result
        }, false)
        reader.readAsDataURL(input.files[0])
    } else {
        imgPreview.style.display = 'none';
    }
}