
const addForm = document.getElementById("add-item-form");
const updateForm = document.getElementById("edit-item-form");
const showAlert = document.getElementById("showAlert");
const addModal = new bootstrap.Modal(document.getElementById("addNewItemModal"));
const editModal = new bootstrap.Modal(document.getElementById("editItemModal"));
const tbody = document.querySelector("tbody");

// Add New Item Ajax Request
addForm.addEventListener("submit", async (e) => {
    e.preventDefault();

const formData = new FormData(addForm);
formData.append("add", 1);

if (addForm.checkValidity() === false) {
    e.preventDefault();
    e.stopPropagation();
    addForm.classList.add("was-validated");
    return false;
} else {
    document.getElementById("add-item-btn").value = "Please Wait...";

    const data = await fetch("action.php", {
        method: "POST",
        body: formData,
    });
    const response = await data.text();
    showAlert.innerHTML = response;
    document.getElementById("add-item-btn").value = "Add Item";
    addForm.reset();
    addForm.classList.remove("was-validated");
    addModal.hide();
    fetchAllItem();
}
});

// Fetch All Item Ajax Request
const fetchAllItem = async () => {
    const data = await fetch("action.php?read=1", {
    method: "GET",
});
    const response = await data.text();
    tbody.innerHTML = response;
};
fetchAllItem();

// Edit Item Ajax Request
tbody.addEventListener("click", (e) => {
if (e.target && e.target.matches("a.editLink")) {
    e.preventDefault();
    let id = e.target.getAttribute("id");
    editItem(id);
}
});

const editItem = async (id) => {
    const data = await fetch(`action.php?edit=1&id=${id}`, {
    method: "GET",
});
const response = await data.json();
    document.getElementById("id").value = response.id;
    document.getElementById("name").value = response.name;
    document.getElementById("Description").value = response.Description;
    document.getElementById("Price").value = response.Price;
    document.getElementById("Quantity").value = response.Quantity;
};

// Update Item Ajax Request
updateForm.addEventListener("submit", async (e) => {
    e.preventDefault();

const formData = new FormData(updateForm);
formData.append("update", 1);

if (updateForm.checkValidity() === false) {
    e.preventDefault();
    e.stopPropagation();
    updateForm.classList.add("was-validated");
    return false;
} else {
    document.getElementById("edit-item-btn").value = "Please Wait...";

    const data = await fetch("action.php", {
        method: "POST",
        body: formData,
    });
    const response = await data.text();

    showAlert.innerHTML = response;
    document.getElementById("edit-item-btn").value = "Update Item";
    updateForm.reset();
    updateForm.classList.remove("was-validated");
    editModal.hide();
    fetchAllItem();
}
});

// Delete Item Ajax Request
tbody.addEventListener("click", (e) => {
    if (e.target && e.target.matches("a.deleteLink")) {
    e.preventDefault();
    let id = e.target.getAttribute("id");
    deleteItem(id);
}
});

const deleteItem = async (id) => {
  const data = await fetch(`action.php?delete=1&id=${id}`, {
    method: "GET",
  });
  const response = await data.text();
  showAlert.innerHTML = response;
  fetchAllItem();
};
