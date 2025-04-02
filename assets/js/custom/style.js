$(document).ready(function () {
  const page_url = window.location.pathname.split("/");
  // $('span.c_name').text('Hello');
  // warning => swaMsg('warning',"An error occured. Continue","#f8bb86");
  // success => swaMsg('success',"An error occured. Continue","#0F843F");
  // error => swaMsg('error',"An error occured. Continue","#D30C0C");
  // reload_data("#contact_query_data", "contact_query_data");
  // filterInput("#aadhaar_number", "number", ".aadhaar_number");
  // filterInput("#aadhaar_number", "number", ".aadhaar_number");
  // toCapital("#ifsc_code");
  // toCapital("#pancard_number");
  // toCapital("#block");
  // limitInputLength("#aadhaar_number", 12);
  // limitInputLength("#pancard_number", 10);
  // limitInputLength("#c_pincode", 6);
  // filterInput("#c_pincode", "number", ".c_pincode");
  // limitInputLength("#c_phone", 10);
  // limitInputLength("#c_alter_phone", 10);

  function validatePhoneNumber(elmid) {
    var phoneNumber = $(elmid).val().replace(/\D/g, ''); // Remove non-numeric characters
    if (phoneNumber.length > 10) {
      phoneNumber = phoneNumber.slice(0, 10); // Splice extra digits if length is greater than 10
    }
    $(elmid).val(phoneNumber); // Update input value
  }
  const formSubmit = (loader_f = '#loader-f') => {
    $(loader_f).removeClass('d-none');
  }

  const formStop = (loader_f = '#loader-f') => {
    $(loader_f).addClass('d-none');
  }
  // Attach input event listener to phone number input field
  // $('#contactNo').on('input', function() {
  //     validatePhoneNumber('#contactNo'); // Validate phone number on input
  // });   
  // $('#alternateNo').on('input', function() {
  //   validatePhoneNumber('#alternateNo'); // Validate phone number on input
  // });
  /*----------------------------------------------------------------------------
                  -- Widget Setting Show Or Hide --
  --------------------------------------------------------------------------- */
  check_status(".off_warehouse", 2);
  delete_table('.delete-warehouse', 2);
  delete_recycle('.recover-warehouse', 2);

  check_status(".off_item", 3);
  delete_table('.delete-item', 3);
  delete_recycle('.recover-item', 3);

  check_status(".off_party", 4);
  delete_table('.delete-party', 4);
  delete_recycle('.recover-party', 4);

  delete_table('.delete-item-order', 5);
  delete_recycle('.recover-item-order', 5);
  /*----------------------------------------------------------------------------
                -- Widget Setting Show Or Hide --
--------------------------------------------------------------------------- */
  async function writeToClipboard(text) {
    try {
      await navigator.clipboard.writeText(text);
      // Use a function or method to display a success message (e.g., swaMsg)
      swaMsg('success', "Text copied.", '#0F843F');
    } catch (error) {
      // Use a function or method to display an error message (e.g., swaMsg)
      swaMsg('error', "Failed to copy.", '#D30C0C');
    }
  }

  /*===============================
      Function to get latitude and longitude for library register
  ===============================*/
  $(document).on("click", ".copy_text", function () {
    let text = $(this).data('text');
    writeToClipboard(text);
  });
  function limitInputLength(inputField, maxLength) {
    $(inputField).on("input", function () {
      let value = $(this).val();
      if (value.length > maxLength) {
        $(this).val(value.slice(0, maxLength));
      }
    });
  }
  function toCapital(id) {
    $(id).on("input", function () {
      $(this).val($(this).val().toUpperCase());
    });
  }
  function filterInput(inputField, type, errorMessageClass) {
    $(inputField).on("input", function () {
      let value = $(this).val();
      $(errorMessageClass).css("color", "#FA5252");

      if (type === "text" && !/^[a-zA-Z]*$/.test(value)) {
        $(errorMessageClass).text("Only alphabet characters allowed.");
      } else if (type === "number" && !/^[0-9]*$/.test(value)) {
        $(errorMessageClass).text("Only numeric characters allowed.");
      } else {
        $(errorMessageClass).empty();
      }
    });
  }
  // ! ||--------------------------------------------------------------------------------||
  // ! ||                                      Login                                     ||
  // ! ||--------------------------------------------------------------------------------||
  $(document).on("submit", "#login_fd", function (e) {
    e.preventDefault();
    $("#sub_btn").prop('disabled', true);
    formSubmit();
    $('.error-span').text('');
    const formData = new FormData(this);
    formData.append('data', 'login');
    $.ajax({
      url: path_set,
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      cache: false,
      success: function (res) {
        console.log(res);

        $("#sub_btn").prop('disabled', false);
        formStop();
        try {
          let json = JSON.parse(res);
          if (json.status === 200) {
            setTimeout(() => window.location.assign("./index.php"), 500);
            swaMsg("success", json.msg, "#0F843F");
          } else {
            json.key && $(`.${json.key}`).text();
            swaMsg("error", json.msg, "#FA5252");
          }
        } catch {
          swaMsg("error", "An error occurred. Please try again.", "#FA5252");
        }
      },
      error: function (jqXHR) {
        $("#sub_btn").prop('disabled', false);
        formStop();

        try {
          let json = JSON.parse(jqXHR.responseText);
          console.log(json);
          if ([400, 401, 500].includes(json.status)) {
            json.key && $(`.${json.key}`).text(json.msg);
            swaMsg("error", json.msg, "#FA5252");
          }
        } catch {
          swaMsg("error", "An error occurred while submitting the form. Please try again later.", "#FA5252");
        }
      }
    });
  });

  $(document).on('click', '#logout', function () {
    $.ajax({
      url: path_set,
      type: "POST",
      data: {
        data: 'logout'
      },
      success: function (res) {
        console.log(res);

        if (res == 1) {
          swaMsg("success", 'Logout successful', "#0F843F");
          setTimeout(() => window.location.assign("./login.php"), 500);
        } else {
          swaMsg("error", 'Something went wrong.', "#FA5252");
        }
      }
    });
  });
  // ! ||--------------------------------------------------------------------------------||
  // ! ||                             Warehouse Add & Update                             ||
  // ! ||--------------------------------------------------------------------------------||
  $(document).on("submit", "#save_warehouse", function (e) {
    e.preventDefault();
    $("#sub_btn").prop('disabled', true);
    formSubmit();
    $('.error-span').text('');
    const formData = new FormData(this);
    formData.append('data', 'save_warehouse');
    $.ajax({
      url: path_set,
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      cache: false,
      success: function (res) {
        $("#sub_btn").prop('disabled', false);
        formStop();
        try {
          let json = JSON.parse(res);
          if ([200, 201].includes(json.status)) {
            if (json.status == 201) {
              $("#save_warehouse").trigger('reset');
            }
            swaMsg("success", json.msg, "#0F843F");
          } else {
            json.key && $(`.${json.key}`).text();
            swaMsg("error", json.msg, "#FA5252");
          }
        } catch {
          swaMsg("error", "An error occurred. Please try again.", "#FA5252");
        }
      },
      error: function (jqXHR) {
        $("#sub_btn").prop('disabled', false);
        formStop();

        try {
          let json = JSON.parse(jqXHR.responseText);
          console.log(json);
          if ([400, 401, 500].includes(json.status)) {
            json.key && $(`.${json.key}`).text(json.msg);
            swaMsg("error", json.msg, "#FA5252");
          }
        } catch {
          swaMsg("error", "An error occurred while submitting the form. Please try again later.", "#FA5252");
        }
      }
    });
  });

  $(document).on('click', '.edit-warehouse', function (e) {
    e.preventDefault();
    const id = $(this).data('id');
    $.ajax({
      url: path_set,
      type: 'POST',
      data: {
        data: 'fetchWareHouseJson',
        id
      },
      success: (res) => {
        const data = JSON.parse(res);
        $("#updateid").val(data.id);
        $("#warehouse_name").val(data.wtitle);
      }
    });
  });
  // ! ||--------------------------------------------------------------------------------||
  // ! ||                             ITEM ADD AND UPDATE                                ||
  // ! ||--------------------------------------------------------------------------------||
  $(document).on("submit", "#save_item", function (e) {
    e.preventDefault();
    $("#sub_btn").prop('disabled', true);
    formSubmit();
    $('.error-span').text('');
    const formData = new FormData(this);
    formData.append('data', 'save_item');
    $.ajax({
      url: path_set,
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      cache: false,
      success: function (res) {
        $("#sub_btn").prop('disabled', false);
        formStop();
        try {
          let json = JSON.parse(res);
          if ([200, 201].includes(json.status)) {
            if (json.status == 201) {
              $("#save_item").trigger('reset');
            }
            swaMsg("success", json.msg, "#0F843F");
          } else {
            json.key && $(`.${json.key}`).text();
            swaMsg("error", "An error occurred. Please try again.", "#FA5252");
          }
        } catch {
          swaMsg("error", "An error occurred. Please try again.", "#FA5252");
        }
      },
      error: function (jqXHR) {
        $("#sub_btn").prop('disabled', false);
        formStop();
        try {
          let json = JSON.parse(jqXHR.responseText);
          if ([400, 401, 500].includes(json.status)) {
            json.key && $(`.${json.key}`).text(json.msg);
            swaMsg("error", json.msg, "#FA5252");
          }
        } catch {
          swaMsg("error", "An error occurred while submitting the form. Please try again later.", "#FA5252");
        }
      }
    });
  });
  // ! ||--------------------------------------------------------------------------------||
  // ! ||                                   ITEM IMPORT                                  ||
  // ! ||--------------------------------------------------------------------------------||
  $(document).on("submit", "#upload_csv_item", function (e) {
    e.preventDefault();
    $("#sub_btn1").prop('disabled', true);
    formSubmit('#loader-f1');
    $('.error-span').text('');
    const formData = new FormData(this);
    formData.append('data', 'upload_csv_item');
    $.ajax({
      url: path_set,
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      cache: false,
      success: function (res) {
        $("#sub_btn1").prop('disabled', false);
        formStop('#loader-f1');
        try {
          let json = JSON.parse(res);
          if ([200, 201].includes(json.status)) {
            setTimeout(() => {
              window.location.reload();
            }, 500);
            swaMsg("success", json.msg, "#0F843F");
          } else {
            json.key && $(`.${json.key}`).text();
            swaMsg("error", "An error occurred. Please try again.", "#FA5252");
          }
        } catch {
          swaMsg("error", "An error occurred. Please try again.", "#FA5252");
        }
      },
      error: function (jqXHR) {
        $("#sub_btn1").prop('disabled', false);
        formStop('#loader-f1');
        try {
          let json = JSON.parse(jqXHR.responseText);
          if ([400, 401, 500].includes(json.status)) {
            json.key && $(`.${json.key}`).text(json.msg);
            swaMsg("error", json.msg, "#FA5252");
          }
        } catch {
          swaMsg("error", "An error occurred while submitting the form. Please try again later.", "#FA5252");
        }
      }
    });
  });
  // ! ||--------------------------------------------------------------------------------||
  // ! ||                             PARTY ADD AND UPDATE                               ||
  // ! ||--------------------------------------------------------------------------------||
  $(document).on("submit", "#save_party", function (e) {
    e.preventDefault();
    $("#sub_btn").prop('disabled', true);
    formSubmit();
    $('.error-span').text('');
    const formData = new FormData(this);
    formData.append('data', 'save_party');
    $.ajax({
      url: path_set,
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      cache: false,
      success: function (res) {
        $("#sub_btn").prop('disabled', false);
        formStop();
        try {
          let json = JSON.parse(res);
          if ([200, 201].includes(json.status)) {
            if (json.status == 201) {
              $("#save_party").trigger('reset');
            }
            swaMsg("success", json.msg, "#0F843F");
          } else {
            json.key && $(`.${json.key}`).text();
            swaMsg("error", "An error occurred. Please try again.", "#FA5252");
          }
        } catch {
          swaMsg("error", "An error occurred. Please try again.", "#FA5252");
        }
      },
      error: function (jqXHR) {
        $("#sub_btn").prop('disabled', false);
        formStop();
        try {
          let json = JSON.parse(jqXHR.responseText);
          if ([400, 401, 500].includes(json.status)) {
            json.key && $(`.${json.key}`).text(json.msg);
            swaMsg("error", json.msg, "#FA5252");
          }
        } catch {
          swaMsg("error", "An error occurred while submitting the form. Please try again later.", "#FA5252");
        }
      }
    });
  });
  // ! ||--------------------------------------------------------------------------------||
  // ! ||                             End Of Jquery           	                         ||
  // ! ||--------------------------------------------------------------------------------||
});
