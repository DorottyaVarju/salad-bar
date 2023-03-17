let add = Array.from(document.getElementsByClassName("add"));
let select = Array.from(document.getElementsByClassName("form-select"));

add.forEach((a) => {
  a.addEventListener("click", function () {
    j = add.indexOf(a);
    i = add.indexOf(a);

    switch (i % 4) {
      case 1:
        i += 3;
        break;
      case 2:
        i += 6;
        break;
      case 3:
        i += 9;
        break;
      case 4:
        i += 12;
        break;
    }

    productData[i + 3] = Number(productData[i + 3]) + Number(select[j].value);
    setCookie("productsInBasket", productData, 1);
    location.reload();
  });
});
