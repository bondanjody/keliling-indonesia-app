function previewImage() {
  const gambar = document.querySelector("#gambar");
  const gambarLabel = document.querySelector(".label-gambar");
  const gambarPreview = document.querySelector(".preview-gambar");

  gambarLabel.textContent = gambar.files[0].name;

  const fileGambar = new FileReader();
  fileGambar.readAsDataURL(gambar.files[0]);

  fileGambar.onload = (e) => {
    gambarPreview.src = e.target.result;
  };
}
