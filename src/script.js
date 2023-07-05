$(document).ready(function () {
  $(".tampilCashOnModal").click(function (e) { // ambil dari button(bukan pop up)
    e.preventDefault();
    var CashOnid = $("#CashOnid").text(); // ambil dari class(bukan popup)
    $.ajax({
      type: "POST",
      url: "koneksi.php",
      data: {
        cashId: CashOnid,
        update_cashier: true, // submit di popup
      },
      dataType: "json",
      success: function (response) {
        // $("#tampilCashOnModal").val(response.nominal);

        $.each(response, function (key, value) {
          // console.log(value["nominal"]);
          $("#editCashOnModal").val(value["nominal"]); // input popup
        });
        $("#editCashOncashier").modal("show"); // div show modal
      },
    });
  });

  $(".editCatatOncashier").click(function (e) {
    e.preventDefault();
    var CatatOnid = $("#catatOnid").text();
    $.ajax({
      type: "POST",
      url: "koneksi.php",
      data: {
        catatId: CatatOnid,
        update_catat: true,
      },
      dataType: "json",
      success: function (response) {
        // $("#tampilCashOnModal").val(response.nominal);
  
        $.each(response, function (key, value) {
          // console.log(value["nominal"]);
          $("#editCashOncatat").val(value["nominal"]);
        });
        $("#showpopupcatat").modal("show");
      },
    });
  });
  
  $(".editCatatOnmines").click(function (e) {
    e.preventDefault();
    var minesOnid = $("#catatOnid").text();
    $.ajax({
      type: "POST",
      url: "koneksi.php",
      data: {
        minesOnId: minesOnid,
        update_mines: true,
      },
      dataType: "json",
      success: function (response) {
        // $("#tampilCashOnModal").val(response.nominal);

        $.each(response, function (key, value) {
          // console.log(value["nominal"]);
          $("#editCashOnmines").val(value["nominal"]);
        });
        $("#editCashOnmines").modal("show");
      },
    });
  });
});
