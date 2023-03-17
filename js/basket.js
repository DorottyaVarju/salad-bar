const basket = document.querySelectorAll(".basket");
let i, n, p;
let product = [];
let productsInBasket = [];
let alreadyInBasket = false;
let quantity = 1;

[...basket].forEach((b) => {
  b.addEventListener("click", function () {
    i = b.getAttribute("data-product-id");
    n = b.getAttribute("data-product-name");
    p = b.getAttribute("data-product-price");

    productsInBasket.forEach((pb) => {
      if (pb[0] == i) {
        alreadyInBasket = true;
        pb[3]++;
        quantity = pb[3];
      } else {
        quantity = 1;
      }
    });
    product.push(i, n, p, quantity);

    if (alreadyInBasket == true) {
    } else {
      productsInBasket.push(product);
    }
    setCookie("productsInBasket", '"' + productsInBasket + '"', 1);
    alreadyInBasket = false;
    product = [];
  });
});

function setCookie(name, value, days) {
  let expires = "";
  if (days) {
    let date = new Date();
    date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
    expires = "; expires=" + date.toUTCString();
  }
  document.cookie = name + "=" + value + expires + "; path=/";
}
