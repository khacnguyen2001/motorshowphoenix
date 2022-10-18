//ÂN HIỆN MODAL FORM DONG XE
const wrapperModels = document.querySelector(".dropdown.models"),
  selectBtnModels = wrapperModels.querySelector(".select-btn"),
  searchInpModels = wrapperModels.querySelector("input"),
  optionsModels = wrapperModels.querySelector(".options");

let models = [
  "Sedan",
  "Hatchback",
  "SUV",
  "Crossover - CUV",
  "MPV",
  "Coupe",
  "Convertible",
  "Pickup",
  "Limousine",
  "Khác",
];

function addModels(selectedModels) {
  optionsModels.innerHTML = "";
  models.forEach((models) => {
    let isSelected = models == selectedModels ? "selected" : "";
    let li = `<li onclick="updateNameModles(this)" class="${isSelected}">${models}</li>`;
    optionsModels.insertAdjacentHTML("beforeend", li);
  });
}
addModels();

function updateNameModles(selectedLiModels) {
  searchInpModels.value = "";
  addModels(selectedLiModels.innerText);
  wrapperModels.classList.remove("active");
  selectBtnModels.firstElementChild.innerText = selectedLiModels.innerText;
}

searchInpModels.addEventListener("keyup", () => {
  let arr = [];
  let searchWord = searchInpModels.value.toLowerCase();
  arr = models
    .filter((data) => {
      return data.toLowerCase().startsWith(searchWord);
    })
    .map((data) => {
      let isSelected =
        data == selectBtnModels.firstElementChild.innerText ? "selected" : "";
      return `<li onclick="updateNameModles(this)" class="${isSelected}">${data}</li>`;
    })
    .join("");
  optionsModels.innerHTML = arr
    ? arr
    : `<p style="padding: 10px; color : red ; font-size : 14px">Không tìm thấy dòng xe nào !</p>`;
});

selectBtnModels.addEventListener("click", function () {
  wrapperModels.classList.toggle("active");
  let area = document.querySelector(".dropdown.area");
  let hasClassArea = area.classList.contains("active");
  if (hasClassArea) {
    area.classList.toggle("active");
  }
});
