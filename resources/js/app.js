import './bootstrap';

function previewImage() {
    const photo = document.querySelector('#photo');
    const imgPreview = document.querySelector('.img-preview');

    if (!photo || !imgPreview || !photo.files || !photo.files[0]) {
        return;
    }

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(photo.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    };
}

window.previewImage = previewImage;
