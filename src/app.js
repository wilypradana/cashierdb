$(document).ready(function () {

  


  $(".showpopupcatat").click(function (e) {
    e.preventDefault();
    var CatatOnid = $(this).attr("Catataid");
    
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
          $("#editCashOncatat").val( "Rp." +  value["nominal"]); // input popup
          $("#catat_id").val(value["id"]);
        });
        $("#showpopupcatat").modal("show");
      },
    });
  });


// done
 
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
          console.log(response);
          $("#editRugiOnModal").val("Rp." + value["nominal"]);// input popup
          $("#rugi_id").val(value["id"]);// input popup
        });
        $("#tampilrugiOnModal").modal("show");
      },
    });
  });
 











// done
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
       
          $("#money_id").val(value["id"]);
          $("#editMoneyOnModal").val( value["nominal"]);// input popup
        });
        $("#tampilmoneyOnModal").modal("show");
      },
    });
  });

  // done
  $(".tampilCashOnModal").click(function (e) {
    e.preventDefault();
    var cashOnid = $(this).attr("cashOnid");
    $.ajax({
      type: "POST",
      url: "koneksi.php",
      data: {
        cashOnid: cashOnid,
        update_cashier: true,
      },
      dataType: "json",
      success: function (response) {
        $.each(response, function (key, value) {
          console.log(response)
          $("#input_id").val(value["id"]);
          $("#editCashOnModal").val( "Rp." +value["nominal"]);// input popup
        });
        $("#editCashOncashier").modal("show");
      },
    });
});

  



 
});