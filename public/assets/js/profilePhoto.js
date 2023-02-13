
const selectBtn = document.querySelector('.select-btn');
const fileInput = document.querySelector('#fileInput');
const profile = document.querySelector('.profile');
const imageContainer = document.querySelector('.image-container');
const removeBtn = imageContainer.querySelector('.button-close');
const xxx = imageContainer.querySelector('.xxx');

console.log(profile.value);

selectBtn.addEventListener('click', function() {
  fileInput.click();
});

fileInput.addEventListener('change', function() {
  selectBtn.style.display = 'none';

  const reader = new FileReader();
  reader.onload = function(e) {
    const img = document.createElement('img');
    img.src = e.target.result;
    img.style.width = '200px';
    img.style.height = '200px';
    imageContainer.appendChild(xxx);
    imageContainer.appendChild(img);
    imageContainer.style.display = "flex";
    profile.value = fileInput.value;
    console.log(profile.value);

  };
  reader.readAsDataURL(fileInput.files[0]);
});

removeBtn.addEventListener('click', function() {
  fileInput.value = "";
  selectBtn.style.display = 'flex';
  imageContainer.style.display = "none";
  imageContainer.innerHTML = '';
  profile.value = "";
  console.log(profile.value);

});

if (profile.value !== "") {
  selectBtn.style.display = 'none';
  const img = document.createElement('img');
  img.src = "storage/images/"+profile.value;
  img.style.width = '200px';
  img.style.height = '200px';
  imageContainer.appendChild(xxx);
  imageContainer.appendChild(img);
  imageContainer.style.display = "flex";


}
