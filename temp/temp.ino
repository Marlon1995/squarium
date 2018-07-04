#include <Ethernet.h>
#include <SPI.h>
#include <OneWire.h> //Se importan las librerías
#include <DallasTemperature.h>

int pinLed1 = 3;
int pinLed2 = 4;
int pinLDR = 0;
 
#define Pin 2 //Se declara el pin donde se conectará la DATA
 byte mac[] = {0xDE, 0xAD, 0xBE, 0xEF, 0xEE, 0xFF}; // Direccion MAC
byte ip[] = { 192,168,11,80 }; // Direccion IP del Arduino
byte server[] = { 192,168,11,73 };
EthernetClient client; 
OneWire ourWire(Pin); //Se establece el pin declarado como bus para la comunicación OneWire
int valorLDR = 0; 

DallasTemperature sensors(&ourWire); //Se instancia la librería DallasTemperature
 const int analogInPin = A0; 
int sensorValue = 0; 
unsigned long int avgValue; 
float b;
int buf[10],temp;

void setup() {
      // Configuramos como salidas los pines donde se conectan los led
  pinMode(pinLed1, OUTPUT);
  pinMode(pinLed2, OUTPUT);
   Ethernet.begin(mac, ip);
delay(1000);
Serial.begin(9600);
sensors.begin(); //Se inician los sensores
}
 
void loop() {
   ////////////////////////LUMI ////////////////////////
    digitalWrite(pinLed1, LOW);
    digitalWrite(pinLed2, LOW);
    valorLDR= analogRead(pinLDR);
    Serial.print(valorLDR); Serial.println("L");
// Encender los leds apropiados de acuerdo al valor de ADC
     if(valorLDR > 260){digitalWrite(pinLed1, HIGH); }
     
     
   ////////////////////////TEMP ////////////////////////
    sensors.requestTemperatures(); //Prepara el sensor para la lectura
    Serial.print(sensors.getTempCByIndex(0)); //Se lee e imprime la temperatura en grados Celsius
    Serial.println("T");
    if(sensors.getTempCByIndex(0) > 28){    digitalWrite(pinLed2, HIGH);  }
/////////////////////// PH ///////////////////////////////////
  for(int i=0;i<10;i++) { 
    buf[i]=analogRead(analogInPin);
    delay(10);
  }
    for(int i=0;i<9;i++){
      for(int j=i+1;j<10;j++){
        if(buf[i]>buf[j]) {
            temp=buf[i];
            buf[i]=buf[j];
            buf[j]=temp;
        }
      }
    }
            avgValue=0;
             for(int i=2;i<8;i++)
                avgValue+=buf[i];
                float pHVol=(float)avgValue*5.0/1024/6;
                float phValue = -5.70 * pHVol + 11.34;
                Serial.print(phValue); Serial.println("PH");

 //////////////////////////  ODA /////////////////////////////////////////    
        float valorSensor;
        float voltajeSensor; 
        float Valor_O2;
        valorSensor = analogRead(A1);
        voltajeSensor =(valorSensor/1024)*3.5;
        Valor_O2 = voltajeSensor*20.94/2.47;
        Serial.print(Valor_O2,1); Serial.println("OX");
    
        delay(1000); //Se provoca un lapso de 1 segundo antes de la próxima lectura

  Serial.println("Connecting...");
    if (client.connect(server, 80)>0) {  // Conexion con el servidor
        client.print("GET /arduino/models/servidor.php?t="); // Enviamos los datos por GET
        client.print(sensors.getTempCByIndex(0));
        client.print("&ph=");
        client.print(phValue);
        client.print("&ox=");
        client.print(Valor_O2,1);
        client.print("&lumi=");
        client.print(valorLDR);
        client.println(" HTTP/1.0");
        client.println("User-Agent: Arduino 1.0");
        client.println();
        Serial.println("Conectado");
    } else {
        Serial.println("Fallo en la conexion");
    }
        if (!client.connected()) {
            Serial.println("Disconnected!");
        }
    client.stop();
    client.flush();
    delay(3000); // Espero un minuto antes de tomar otra muestra
 }
