"use strict";
const employeeUrl = "./library/employeeController.php";
// let userId;

// function setUserId(id) {
//   userId = id;
// }

$(".needs-validation").on("submit", function (event) {
  event.preventDefault();
  if (event.target.checkValidity()) {
    let updatedEmployee = {};
    let elements = $(event.target).find("input, select");
    elements.each((number, element) => {
      updatedEmployee[element.id] = element.value;
    });
    updatedEmployee["id"] = userId;
    event.target.classList.add("was-validated");
    console.log(`${baseUrl}employees/updateEmployee/${userId}`);
    console.log(updatedEmployee);
    $.ajax({
      url: `${baseUrl}employees/updateEmployee/${userId}`,
      method: "UPDATE",
      data: updatedEmployee,
    })
      .done((response) => {
        console.log(response);
        $("#responseMsg")
          .text("Employee Update Success")
          .attr("class", "text-success");
      })
      .fail((response) => {
        console.log(response);
        $("#responseMsg")
          .text("Something when wrong")
          .attr("class", "text-danger");
      });
  }
});

function populateEmployeeForm() {
  $.ajax({
    // url: `${employeeUrl}/?id=${userId}`,
    url: `${baseUrl}employees/getEmployeeById/${userId}`,
    method: "GET",
    dataType: "json",
  })
    .done((employee) => {
      console.log("done");
      setEmployeeForm(employee);
    })
    .fail((response) => {
      console.log("fail");
      const errorModal = new bootstrap.Modal(
        document.getElementById("errorModal"),
        {
          keyboard: false,
        }
      );
      errorModal.show();
    });
}

function newEmployeeForm() {
  $("#employeeTitle").text("New employee");
  $("#submitBtn").text("Add employee");
  $("form").on("submit", handleNewEmployee);
  $("#navEmployee").removeClass("text-secondary").addClass("text-white");
  $("#navDashboard").addClass("text-secondary").removeClass("text-white");
}

function handleNewEmployee(event) {
  event.preventDefault();
  event.stopPropagation();
  const form = document.querySelector(".needs-validation");

  if (!form.checkValidity()) {
  } else {
    let objectToSend = {};
    let elements = $("form").find("input, select");
    elements.each((number, element) => {
      objectToSend[element.id] = element.value;
    });
    $.ajax({
      type: "POST",
      url: employeeUrl,
      data: objectToSend,
    }).done(() => {
      const successfulAddModalLabel = new bootstrap.Modal(
        document.getElementById("successfulAddModal"),
        {
          keyboard: false,
        }
      );
      successfulAddModalLabel.show();
      $("#successfulAddModal").on("hide.bs.modal", () => {
        window.location.replace("./dashboard.php");
      });
    });
  }

  form.classList.add("was-validated");
}

function setEmployeeForm(employee) {
  $("#name").val(typeof employee.name !== "undefined" ? employee.name : "");
  $("#lastName").val(
    typeof employee.lastName !== "undefined" ? employee.lastName : ""
  );
  $("#email").val(typeof employee.email !== "undefined" ? employee.email : "");
  $("#gender").val(
    typeof employee.gender !== "undefined" ? employee.gender : ""
  );
  $("#city").val(typeof employee.city !== "undefined" ? employee.city : "");
  $("#streetAddress").val(
    typeof employee.streetAddress !== "undefined" ? employee.streetAddress : ""
  );
  $("#state").val(typeof employee.state !== "undefined" ? employee.state : "");
  $("#age").val(typeof employee.age !== "undefined" ? employee.age : "");
  $("#postalCode").val(
    typeof employee.postalCode !== "undefined" ? employee.postalCode : ""
  );
  $("#phoneNumber").val(
    typeof employee.phoneNumber !== "undefined" ? employee.phoneNumber : ""
  );
  $("#navEmployee").removeClass("text-secondary").addClass("text-white");
  $("#navDashboard").addClass("text-secondary").removeClass("text-white");
}
