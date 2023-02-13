const input = document.querySelector('#files');
const preview = document.querySelector('#preview');

input.addEventListener('change', function () {
  preview.innerHTML = '';
  const files = this.files;

  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    const reader = new FileReader();

    reader.addEventListener('load', function () {
      const image = new Image();
      image.src = this.result;
      preview.appendChild(image);
    });

    reader.readAsDataURL(file);
  }
});
