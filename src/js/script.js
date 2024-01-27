// Header adjustment for <768px
const toggle = document.querySelector(".toggle");
const menu = document.querySelector(".nav-menu");
function toggleMenu() {
    if (menu.classList.contains("active")) {
        menu.classList.remove("active");
        // add hamburger icon
        toggle.innerHTML = `<i class="fa fa-bars"></i>`;
    }
    else {
        menu.classList.add("active");
        // add X icon
        toggle.innerHTML = `<i class="fa fa-times"></i>`;
    }
}
toggle.addEventListener("click", toggleMenu, false);


var addToCartButton = document.getElementById('add-to-cart');
if (addToCartButton != null) {
    // Add event listener to the add to cart button
    addToCartButton.addEventListener('click', function () {
        // Get the item details (e.g., name, price, etc.)
        var itemName = document.getElementById('item-name').textContent;
        var itemPrice = document.getElementById('item-price').textContent;
        if (document.getElementById('size').value == 'XL' || document.getElementById('size').value == 'XXL' || document.getElementById('size').value == 'L' || document.getElementById('size').value == 'M' || document.getElementById('size').value == 'S') {

            var itemSize = document.getElementById('size').value;
            var itemCount = document.getElementById('count').value;

            // Create an object to represent the item
            var item = {
                name: itemName,
                price: itemPrice,
                size: itemSize,
                count: itemCount
            };

            // Check if the cart already exists in local storage
            var cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Add the item to the cart
            cart.push(item);

            // Store the updated cart in local storage
            localStorage.setItem('cart', JSON.stringify(cart));

            // Optionally, you can display a success message or perform any other actions
            alert('Produsul a fost adaugat!');
        }
        else {
            alert('Selectati marimea!');
            return;
        }
    });
} else {


    // Check if the cart already exists in local storage
var cart = JSON.parse(localStorage.getItem('cart')) || [];

// Function to update the cart display
function updateCartDisplay() {
  // Get the cart display element
  var cartDisplay = document.getElementById('cart-display');

  // Clear the existing display
  cartDisplay.innerHTML = '';

  // Iterate over the cart items
  for (var i = 0; i < cart.length; i++) {
    // Create a new cart item element
    var cartItem = document.createElement('div');
    cartItem.textContent = cart[i].name + ' ' + cart[i].price+' Lei '+cart[i].size+' '+cart[i].count;

    // Append the cart item to the display
    cartDisplay.appendChild(cartItem);
  }
}

// Call the function to update the cart display
updateCartDisplay();

}
var checkout = document.getElementById('checkout');
checkout.addEventListener('click',function(){
    var cart = JSON.parse(localStorage.getItem('cart')) || [];
    var total=0;
    for (var i = 0; i < cart.length; i++) {
        
    total+=parseFloat(cart[i].price);
      }
    alert('Comanda a fost plasata suma ='+total);
      localStorage.removeItem('cart');


})