function toggleAnnee(value) {
  let div = document.getElementById("divAnnee");
  if (value !== "0" && value !== "4") {
    div.classList.remove("noneDisplay");
  } else {
    div.classList.add("noneDisplay");
  }
}
