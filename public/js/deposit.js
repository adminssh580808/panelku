
$(document).ready(function() {
    var csrf_token = $("meta[name='csrf-token']").attr('content');
    $('#type').change(function() {

      var type = $('#type').val();
      var method = $('#method');
      var newType = "AUTO";
      if(type == "Otomatis")
        newType = "AUTO"
      else if(type == "Manual")
        newType = "MANUAL"

      $.ajax({
        type: "POST",
        url: "/deposit/get_method",
        data: {
          "_token": csrf_token,
          "type": newType
        },
        success:function(result) {
          console.log(result);
          method.html(result);
        }
      });
    });
    $('#method').change(function() {
        get_deposit()
    });

    function get_deposit() {
        $.ajax({
            url: "/deposit/get_rate",
            method: 'POST',
            data: {
              "_token": csrf_token,
              "method": $('#method').val(),
              "quantity" : $("#quantity_deposit").val()
            },
            success:function(result) {
              $('#get_balance').val(result);
            }
          })
    }

    $('#quantity_deposit').keyup(function() {
        get_deposit()
    });
    // JIKA USER TABLE BAHASA = EN
//     $('#quantity_deposit_dolar').keyup(function() {
//         var quantity = $('#quantity_deposit_dolar').val();
//         var rate_rupiah = 15000;
//         var get_balance = $('#get_balance_rupiah');
//         var get_balance_dolar = $('#get_balance_dolar');
//         var final = quantity * rate_rupiah;
//         var rate = $('#rate_deposit').val();
//         var final_dolar = final * rate / rate_rupiah;
//         get_balance.val(final)
//         get_balance_dolar.val(final_dolar)
//   });
});
