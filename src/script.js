$(document).ready(function () {


  // done
  $(".tampilCashOnModal").click(function (e) {
    e.preventDefault();
    var CashOnid = $(this).attr("CashOnid");
    $.ajax({
       type: "POST",
       url: "koneksi.php",
       data: {
          cashId: CashOnid,
          update_cashier: true,
       },
       dataType: "json",
       success: function (response) {
        console.log(response);
          $.each(response, function (key, value) {
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
          // console.log(response);
          // console.log(value["id"])
          $("#editCashOncatat").val(value["nominal"]); // input popup
          $("#catat_id").val(value["id"]);
        });
        $("#showpopupcatat").modal("show");
      },
    });
  });



 
  $(".buttonrugi").click(function (e) {
    e.preventDefault();
    var CatatOnid = $(this).attr("RugiOnid");

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
          // console.log(value["id"]);
          $("#editRugiOnModal").val(value["nominal"]);// input popup
          $("#rugi_id").val(value["id"]);// input popup
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
          console.log(response);
          $("#money_id").val(value["id"]);
          $("#editMoneyOnModal").val(value["nominal"]);// input popup
        });
        $("#tampilmoneyOnModal").modal("show");
      },
    });
  });



 
});
