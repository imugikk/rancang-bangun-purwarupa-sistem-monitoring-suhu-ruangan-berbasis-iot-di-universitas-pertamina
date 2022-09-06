#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <Firebase_ESP_Client.h>
#include <Adafruit_Sensor.h>
#include <NTPClient.h>
#include <WiFiUdp.h>
#include "DHT.h"


#define DHTPIN 2     // PIN D2 ON WEMOS D1
#define DHTTYPE    DHT11     // DHT 11
DHT dht(DHTPIN, DHTTYPE);

// Provide the token generation process info.
#include "addons/TokenHelper.h"
// Provide the RTDB payload printing info and other helper functions.
#include "addons/RTDBHelper.h"

//------------- FILL ALL OF THESE FIRST BEFORE ----------------- //


// Insert your network credentials
#define WIFI_SSID "your wifi"
#define WIFI_PASSWORD "your password"

// Insert Firebase project API Key
#define API_KEY "your api key"

// Insert Authorized Email and Corresponding Password
// Authenication -> Sign in method -> Add new provider -> email/password
// Differentiate per-device used, as it needs the unique ID per-account on every device you use.
#define USER_EMAIL "your email"
#define USER_PASSWORD "your password"

// Insert RTDB URLefine the RTDB URL */
#define DATABASE_URL "your url database" 

//------------- END OF WHAT TO FILL ----------------- //

// Define Firebase objects
FirebaseData fbdo;
FirebaseAuth auth;
FirebaseConfig config;

// Variable to save USER UID
String uid;

// Database main path (to be updated in setup with the user UID)
String databasePath;
// Database child nodes
String tempPath = "/temperature";
String humPath = "/humidity";
String timePath = "/timestamp";

// Parent Node (to be updated in every loop)
String parentPath;

FirebaseJson json;

// Define NTP Client to get time
WiFiUDP ntpUDP;
NTPClient timeClient(ntpUDP, "pool.ntp.org");

// Variable to save current epoch time
int timestamp;

// Timer variables
unsigned long sendDataPrevMillis = 0;

//Set delay on here. 10 sec = 100000, 1 min = 60000, etc.
unsigned long timerDelay = 60000;


// Initialize WiFi
void initWiFi() {
  WiFi.begin(WIFI_SSID, WIFI_PASSWORD);
  Serial.print("Connecting to WiFi ..");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print('.');
    delay(1000);
  }
  Serial.println(WiFi.localIP());
  Serial.println();
}

// Function that gets current epoch time
unsigned long getTime() {
  timeClient.update();
  unsigned long now = timeClient.getEpochTime();
  return now;
}

void setup(){
  Serial.begin(115200);
  dht.begin();
  initWiFi();

  Serial.print("Connected with IP: ");
  Serial.println(WiFi.localIP());
  Serial.println();

  timeClient.begin();

  // Assign the api key (required)
  config.api_key = API_KEY;

  // Assign the user sign in credentials
  auth.user.email = USER_EMAIL;
  auth.user.password = USER_PASSWORD;

  // Assign the RTDB URL (required)
  config.database_url = DATABASE_URL;

  Firebase.reconnectWiFi(true);
  fbdo.setResponseSize(4096);

  // Assign the callback function for the long running token generation task */
  config.token_status_callback = tokenStatusCallback; //see addons/TokenHelper.h

  // Assign the maximum retry of token generation
  config.max_token_generation_retry = 5;

  // Initialize the library with the Firebase authen and config
  Firebase.begin(&config, &auth);

  // Getting the user UID might take a few seconds
  Serial.println("Getting User UID");
  while ((auth.token.uid) == "") {
    Serial.print('.');
    delay(1000);
  }
  // Print user UID
  uid = auth.token.uid.c_str();
  Serial.print("User UID: ");
  Serial.println(uid);

  // Update database path
  databasePath = "/sensor3";
}

void loop(){
  
//  float h = dht.readHumidity();                                 // Read Humidity
  float t = dht.readTemperature();  

  if (isnan(t))                                     // Checking sensor working
  {                                   
    Serial.println(F("Failed to read from DHT sensor!"));
    return;
  } 

  // Send new readings to database
  if (Firebase.ready() && (millis() - sendDataPrevMillis > timerDelay || sendDataPrevMillis == 0)){
    sendDataPrevMillis = millis();

    //Get current timestamp
    timestamp = getTime();
    Serial.print ("time: ");
    Serial.println (timestamp);

    parentPath= databasePath + "/" + String(timestamp);

//    json.set(humPath.c_str(), dht.readHumidity());
    json.set(tempPath.c_str(), dht.readTemperature());
    json.set(timePath, timestamp);
    Serial.printf("Set json... %s\n", Firebase.RTDB.setJSON(&fbdo, parentPath.c_str(), &json) ? "Send ok" : fbdo.errorReason().c_str());
  }
}
