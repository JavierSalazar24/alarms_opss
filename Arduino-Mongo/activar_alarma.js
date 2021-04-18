//cargar los modulos en Node para crear el servidor
var express = require("express"); //eschuchar peticiones en HTTP

//ejecutar el express
var app = express();
var port = 3900;
app.listen(port, () => {
  console.log(
    "Servidor corriendo y listo para escuchar peticiones en: http://localhost:" +
      port
  );
});

const { Board, Led } = require("johnny-five");
const board = new Board();

board.on("ready", () => {
  var led = new Led(13);
  var buzzer = new Led(12);

  app.get("/encendido", (req, res) => {
    status = true;
    console.log(status);

    led.blink(200);
    buzzer.blink(200);

    return res.status(200).send({
      status,
    });
  });

  app.get("/apagado", (req, res) => {
    status = false;
    console.log(status);

    led.stop();
    led.off();
    buzzer.off();
    buzzer.stop();

    return res.status(200).send({
      status,
    });
  });
});
