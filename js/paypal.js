function initPayPalButton() {
  paypal
    .Buttons({
      style: {
        shape: "pill",
        color: "white",
        layout: "vertical",
        label: "paypal",
      },

      createOrder: function (data, actions) {
        return actions.order.create({
          purchase_units: [
            {
              description: "Alarma - OPSS, v1",
              amount: { currency_code: "MXN", value: 2000 },
            },
          ],
        });
      },

      onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
          alert(
            "Transaction completed by " + details.payer.name.given_name + "!"
          );
        });
      },

      onError: function (err) {
        console.log(err);
      },
    })
    .render("#paypal-button-container");
}
initPayPalButton();
