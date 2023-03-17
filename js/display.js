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
let productData;
let tr, td;
let totalQuantity = 0,
  price;
totalPrice = 0;
const tbody = document.getElementsByTagName("tbody");

console.log(getCookie("productsInBasket"));

productData = getCookie("productsInBasket").split(",");
console.log(productData);

for (i = 1; i < productData.length; i += 4) {
  tr = document.createElement("tr");
  tbody[0].appendChild(tr);
  for (j = 0; j < 5; j++) {
    td = document.createElement("td");
    if (j == 0) {
      td.innerText = productData[i];
    } else if (j == 1) {
      productData[i + 2] = productData[i + 2].replace('"', "");
      td.innerText = productData[i + 2];
      totalQuantity += Number(productData[i + 2]);
    } else if (j == 2) {
      td.innerHTML =
        "<select class='form-select'><option selected>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select> <button class='btn btn-success add'>Add</button>";
    } else if (j == 3) {
      td.innerHTML = "<i class='fa fa-trash'></i>";
    } else if (j == 4) {
      price = (productData[i + 1] * productData[i + 2]).toFixed(2);
      td.innerText = price + "$";
      totalPrice += Number(price);
    }
    tr.appendChild(td);
  }
}

tr = document.createElement("tr");
tbody[0].appendChild(tr);
for (j = 0; j < 5; j++) {
  th = document.createElement("th");
  switch (j) {
    case 0:
      th.innerText = "All";
      break;
    case 1:
      th.innerText = totalQuantity;
      break;
    case 2:
      th.innerText = "";
      break;
    case 3:
      th.innerText = "";
      break;
    case 4:
      th.innerText = totalPrice.toFixed(2) + "$";
      break;
  }
  tr.appendChild(th);
}
