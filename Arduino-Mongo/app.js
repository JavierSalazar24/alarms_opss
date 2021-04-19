//ejecutar el express
var bodyParser = require("body-parser"); //convertir todo a JSON
const express = require("express");
const app = express();

//cargar el body-parser para utilizar posteriormente
app.use(bodyParser.urlencoded({ extended: false }));

//asegurar que el body-parser ppueda convertir cualquier cosa en JSON
app.use(bodyParser.json());

//requerir MongoDB
const { MongoClient } = require("mongodb");
// URL de la BD
const uri =
  "mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority";

//Escuchar por el puerto que nos de el sitio
var port = process.env.PORT;
app.listen(port, () => {
  console.log(
    "Servidor corriendo y listo para escuchar peticiones en: http://localhost:" +
      port
  );
});

// Traer el board y el led
const { Board, Led } = require("johnny-five");
const board = new Board();

// Iniciar el board
board.on("ready", () => {
  var led = new Led(13);
  var buzzer = new Led(12);

  // Ruta de apagado
  app.post("/encendido", (req, res) => {
    var params = req.body;

    let id = parseInt(params.id_alarma) + 1;

    connect();
    async function connect() {
      const client = new MongoClient(uri, {
        useNewUrlParser: true,
        useUnifiedTopology: true,
      });
      await client.connect();
      const db = client.db("opss");
      // console.log("conectado a la BD", db.databaseName);
      const pruebas = db.collection("clientes");
      await pruebas.updateOne(
        { correo: params.correo },
        { $set: { [`alarmas.alarma ${id}`]: "encendida" } }
      );
      // console.log(actualizar.modifiedCount);
      client.close();
    }

    status = true;
    console.log(status);

    led.blink(200);
    buzzer.blink(200);

    return res.status(200).send({
      status,
    });
  });

  // Ruta de encendido
  app.post("/apagado", (req, res) => {
    var params = req.body;

    let id = parseInt(params.id_alarma) + 1;

    connect();
    async function connect() {
      const client = new MongoClient(uri, {
        useNewUrlParser: true,
        useUnifiedTopology: true,
      });
      await client.connect();
      const db = client.db("opss");
      // console.log("conectado a la BD", db.databaseName);
      const pruebas = db.collection("clientes");
      await pruebas.updateOne(
        { correo: params.correo },
        { $set: { [`alarmas.alarma ${id}`]: "apagada" } }
      );
      // console.log(actualizar.modifiedCount);
      client.close();
    }

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
