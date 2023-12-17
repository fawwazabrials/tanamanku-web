const gambar = document.querySelector("#gambar");
const imgPreview = document.querySelector(".img-preview");

gambar.addEventListener("change", function () {
  const fileGambar = new FileReader();
  fileGambar.readAsDataURL(this.files[0]); // mengambil file yang diupload

  fileGambar.onload = function (e) {
    imgPreview.src = e.target.result; // mengganti src imgPreview dengan file yang diupload
  };
});

function searchPlants() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("hs-table-with-pagination-search");
  filter = input.value.toUpperCase();
  table = document.getElementById("plantsTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows and hide those that don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1]; // Index 1 corresponds to the "Name" column
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function searchRequests() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("hs-table-with-pagination-search");
  filter = input.value.toUpperCase();
  table = document.getElementById("requestsTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows and hide those that don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1]; // Index 1 corresponds to the "Name" column
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
