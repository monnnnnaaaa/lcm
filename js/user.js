function searchUser() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInputUser");
    filter = input.value.toUpperCase();
    table = document.getElementById("userTable");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("th")[1]; 
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


function toggleContainer(containerId) {
    var containers = document.querySelectorAll('.container-product, .container-product-add, .container-product-manage');
    containers.forEach(function(container) {
        if (container.id === containerId) {
            container.style.display = 'block';
        } else {
            container.style.display = 'none';
        }
    });
}
