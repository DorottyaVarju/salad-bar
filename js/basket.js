const basket = document.querySelectorAll(".basket");
let i, n, p;
let product = [];
let productsInBasket;
if (getCookie("productsInBasket") !== null) {
  productsInBasket = getCookie("productsInBasket").split(",");
  if (productsInBasket[0] == "") {
    productsInBasket = [];
  }
} else {
  productsInBasket = [];
}

let alreadyInBasket = false;
let quantity = 1;

[...basket].forEach((b) => {
  b.addEventListener("click", function () {
    i = b.getAttribute("data-product-id");
    n = b.getAttribute("data-product-name");
    p = b.getAttribute("data-product-price");
    if (getCookie("productsInBasket") !== null) {
      productsInBasket = getCookie("productsInBasket").split(",");
    }
    productsInBasket.forEach((pb) => {
      if (pb == i) {
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

    setCookie("productsInBasket", productsInBasket, 1);

    let added = Array.from(document.getElementsByClassName("added"));
    if (added.length != 0) {
      added.forEach((a) => {
        a.remove();
      });
    }

    let add = document.createElement("p");
    if (alreadyInBasket == true) {
      add.innerText = "Already in basket";
      add.classList.add("text-danger", "added");
    } else {
      add.innerText = "Just added to basket";
      add.classList.add("text-success", "added");
    }
    b.parentElement.appendChild(add);

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

function getCookie(name) {
  const cookies = document.cookie.split("; ");
  for (let i = 0; i < cookies.length; i++) {
    const cookie = cookies[i].split("=");
    if (cookie[0] === name) {
      return cookie[1];
    }
  }
  return null;
}
