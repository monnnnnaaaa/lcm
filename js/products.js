document.getElementById('searchInput').addEventListener('input', function() {
    const searchValue = this.value.toLowerCase();
    const products = document.querySelectorAll('.product');
    let noResults = true;
    
    products.forEach(product => {
        const productName = product.querySelector('h2').innerText.toLowerCase();
        const productId = product.querySelector('p:nth-child(2)').innerText.toLowerCase();
        
        if (productName.includes(searchValue) || productId.includes(searchValue)) {
            product.style.display = 'flex';
            noResults = false;
        } else {
            product.style.display = 'none';
        }
    });

    if (noResults) {
        document.getElementById('noResults').style.display = 'block';
    } else {
        document.getElementById('noResults').style.display = 'none';
    }
});



function copyContent() {
    var product = event.target.parentElement;
    var productText = '';
  
    
    for (var i = 0; i < product.childNodes.length; i++) {
      if (product.childNodes[i].nodeName !== 'BUTTON') {
        productText += product.childNodes[i].textContent;
      }
    }
  
    navigator.clipboard.writeText(productText).then(function() {
      console.log('Text copied to clipboard');
    }, function(err) {
      console.error('Error copying text to clipboard: ', err);
    });
  }

  function filterProducts() {
    var category = document.getElementById("searchDropdown").value;
    var products = document.getElementsByClassName("product");
    
    for (var i = 0; i < products.length; i++) {
        if (category === "all" || products[i].classList.contains(category)) {
            products[i].style.display = "block";
            products[i].classList.add("visible"); 
        } else {
            products[i].style.display = "none";
            products[i].classList.remove("visible"); 
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

function searchCustomer() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInputLeft");
    filter = input.value.toUpperCase();
    table = document.getElementById("dataTable");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0]; 
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

function searchUser() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInputUser");
    filter = input.value.toUpperCase();
    table = document.getElementById("userTable");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0]; 
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







