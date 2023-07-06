$(document).ready(function () {
  $(".tampilCashOnModal").click(function (e) { // ambil dari button(bukan pop up)
    e.preventDefault();
    var CashOnid = $(this).attr("CashOnid"); // ambil dari class(bukan popup)
    $.ajax({
      type: "POST",
      url: "koneksi.php",
      data: {
        cashId: CashOnid,
        update_cashier: true,
      },
      dataType: "json",
      success: function (response) {
        $.each(response, function (key, value) {
          // console.log(response);
          $("#editCashOnModal").val(value["nominal"]); 
          $("#input_id").val(value["id"]); 
        });
        $("#editCashOncashier").modal("show");
      },
    });
  });

  $(".showpopupcatat").click(function (e) {
    e.preventDefault();
    var CatatOnid = $(this).attr("Catataid");
    // console.log(CatatOnid);
    $.ajax({
      type: "POST",
      url: "koneksi.php",
      data: {
        catatId: CatatOnid,
        update_catat: true,
      },
      dataType: "json",
      success: function (response) {
        $.each(response, function (key, value) {
          // console.log(value["nominal"]);
          $("#editCashOncatat").val(value["nominal"]); // input popup
        });
        $("#showpopupcatat").modal("show");
      },
    });
  });



 
  $(".buttonrugi").click(function (e) {
    e.preventDefault();
    var CatatOnid = $(this).attr("RugiOnid");
    console.log(CatatOnid);
    $.ajax({
      type: "POST",
      url: "koneksi.php",
      data: {
        minesId: CatatOnid,
        update_rugi: true,
      },
      dataType: "json",
      success: function (response) {
        $.each(response, function (key, value) {
          console.log(value["nominal"]);
          $("#editRugiOnModal").val(value["nominal"]);// input popup
        });
        $("#tampilrugiOnModal").modal("show");
      },
    });
  });
 
  $(".buttonuang").click(function (e) {
    e.preventDefault();
    var Moneyid = $(this).attr("moneyOnid");
    
    $.ajax({
      type: "POST",
      url: "koneksi.php",
      data: {
        MoneyidId: Moneyid,
        update_money: true,
      },
      dataType: "json",
      success: function (response) {
        $.each(response, function (key, value) {
         
          $("#editMoneyOnModal").val(value["nominal"]);// input popup
        });
        $("#tampilmoneyOnModal").modal("show");
      },
    });
  });



 
});
