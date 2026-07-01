# ACMS Architecture

## Components

- Laravel 13
- MariaDB
- ESP32-S3
- RC522 RFID
- Relay
- OLED SSD1306
- Exit Button
- Door Sensor

---

## Modules

Authentication

Dashboard

Devices

People

Cards

Permissions

Access Logs

Reports

REST API

ESP32

---

## Flow

RFID

↓

ESP32

↓

REST API

↓

Laravel

↓

Permission Check

↓

JSON Response

↓

Relay
