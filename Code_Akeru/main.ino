#include <Akeru.h>
#include "TinyGPS.h"
#include <SoftwareSerial.h>
TinyGPS gps;

#define RXPIN 11
#define TXPIN 10

//#define TX 4
//#define RX 5

//Akeru akeru(RX,TX);

float lat, lon;


void setup() {
  Serial.begin(9600);
  delay(1000);
  Akeru.begin();
  delay(1000);
  //nss.begin(9600);
  Serial.println("Master 2 annee Systemes d'Information et Internet");
  Serial.println("Projet en 'Internet of Thing' réalise par Vincent Debain année 2016/2017");
  Serial.println("-------------------------------------------------------------------------------------------------------------------------------------");
  Serial.println("ANTIVOL CONNECTEE");
  Serial.println("-------------------------------------------------------------------------------------------------------------------------------------");
  Serial.print("Simple TinyGPS library v. "); Serial.println(TinyGPS::library_version());
  Serial.println("by Mikal Hart");
  Serial.println("-------------------------------------------------------------------------------------------------------------------------------------");
  Serial.println("");
  delay(3000);
}

typedef struct {
  float lat;
  float lon;
} GPS;

void loop() {
  
  while (Serial.available())
  {
    GPS p;
    //int c = Serial.read();
    char c1 = Serial.read();
    //Serial.println(c1);
    if (gps.encode(c1))
    {
      float vitesse;
      unsigned long fix_age, temps, date, course;
      unsigned short sentences, failed_checksum;
       
      // retrieves +/- lat/long in 100000ths of a degree
      gps.f_get_position(&p.lat, &p.lon, &fix_age);
       
      // time in hhmmsscc, date in ddmmyy
      gps.get_datetime(&date, &temps, &fix_age);
       
      // returns speed in 100ths of a knot
      vitesse = gps.f_speed_mps();
       
      // course in 100ths of a degree
      course = gps.course();
      
      Serial.print("Latitude : ");
      Serial.print(p.lat, DEC);
      Serial.print(" Longitude : ");
      Serial.print(p.lon, DEC);
      Serial.print(" Vitesse (mps): ");
      Serial.println(vitesse, DEC);
      p.lat = (float) p.lat;
      p.lon = (float) p.lon;
      float variable = 42.0;
      // Si la vitesse est supérieur à une vitesse de course on envoie les données
      if (vitesse > 0.1) {
        Akeru.send(&p, sizeof(p));
        Serial.println("Send....");
        //Attendre 2 minutes
        int j = 0;
        for(j=0;j<30;j++){
         delay(1000);
        }
      }
    }
  }
}
