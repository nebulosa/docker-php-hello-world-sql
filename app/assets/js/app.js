// Get the modal
let modal = document.getElementById("myModal");
let captionText = document.getElementById("caption");
let imgQr = document.querySelectorAll(".imgQr");

for (let i = 0; i < imgQr.length; i++) {
    imgQr[i].addEventListener("click", function() {
        let img = document.getElementById(this.id);
        let modalImg = document.getElementById("imgQr");
        modal.style.display = "block";
        modalImg.src = img.src;
        captionText.innerHTML = this.alt;
     });
 }

let span = document.getElementsByClassName("close")[0];
span.onclick = function() {
    modal.style.display = "none";
} 