let trash = Array.from(document.getElementsByClassName("fa-trash"));

trash.forEach((t) => {
  t.addEventListener("click", function () {
    i = trash.indexOf(t);

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

    productData[i + 3]--;
    if (productData[i + 3] == 0) {
      productData.splice(i, 4);
    }
    setCookie("productsInBasket", productData, 1);
    location.reload();
  });
});
