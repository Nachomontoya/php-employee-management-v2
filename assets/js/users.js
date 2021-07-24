var MyPasswordField = function (config) {
  jsGrid.Field.call(this, config);
};

MyPasswordField.prototype = new jsGrid.Field({
  sorter: function (pass1, pass2) {
    if (pass1 < pass2) {
      return -1;
    } else if (pass1 > pass2) {
      return 1;
    } else {
      return 0;
    }
  },

  itemTemplate: function (value) {
    return (
      "<input type='password' value='" +
      value +
      "'  style='border:none;background:transparent;' >"
    );
  },

  insertTemplate: function (value) {
    return (this._insertPicker = $("<input type='password'  >"));
  },

  editTemplate: function (value) {
    return (this._editPicker = $(
      "<input type='password' value='" + value + "'  >"
    ));
  },

  insertValue: function () {
    return this._insertPicker.val();
  },

  editValue: function () {
    return this._editPicker.val();
  },
});

jsGrid.fields.password = MyPasswordField;

$("#jsGrid").jsGrid({
  width: "100%",
  height: "auto",
  inserting: true,
  editing: false,
  sorting: true,
  paging: true,
  autoload: true,

  //   rowDoubleClick: function (item) {
  //     window.location.replace(
  //       `${baseUrl}employees/renderEmployee/${item.item.id}`
  //     );
  //   },

  //   onItemInserting: function () {
  //     console.log("insert");
  //   },

  //   insertRowRenderer: function (item, aa) {
  //     var classStr = "";

  //     if (aa % 2 == 0) {
  //       classStr = "custom";
  //     }

  //     var test =
  //       '<tr class="jsgrid-row ' +
  //       classStr +
  //       ' style="background:red">' +
  //       '<td class="jsgrid-cell" style="width: 150px;">' +
  //       item +
  //       "</td>" +
  //       '<td class="jsgrid-cell" style="width: 100px;">' +
  //       item +
  //       "</td>" +
  //       '<td class="jsgrid-cell" style="width: 100px;">' +
  //       item +
  //       "</td>" +
  //       "</tr>";

  //     return $(test);
  //   },

  controller: {
    loadData: function (response) {
      return $.ajax({
        type: "GET",
        url: `${baseUrl}users/getAllUsers`,
        dataType: "json",
        data: response,
        success: function (response) {
          console.log(response);
        },
        error: function (xhr, status) {
          console.log(xhr, status);
          //   let err = JSON.parse(xhr.responseText);
          //   renderError(err.message);
        },
      });
    },
    insertItem: function (item) {
      insertItemHandler(item);
    },
    // deleteItem: function (item) {
    //   deleteItemHandler(item);
    // },
  },

  fields: [
    { name: "id", title: "id", type: "text", visible: false },
    {
      name: "name",
      title: "Name",
      type: "text",
      width: 3,
      validate: "required",
    },
    {
      name: "email",
      title: "Email",
      type: "text",
      width: 10,
      validate: "required",
    },
    {
      name: "password",
      title: "Password",
      type: "password",
      width: 10,
      validate: "required",
    },
    { type: "control", width: 1, editButton: false },
  ],
});

function insertItemHandler(item) {
  console.log(item);
  return $.ajax({
    type: "POST",
    url: `${baseUrl}users/addUser`,
    data: item,
  }).done(() => {
    $("#jsGrid").jsGrid("loadData");
  });
}
