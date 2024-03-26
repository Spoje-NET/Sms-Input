![SMS Input](sms-input.svg?raw=true)

# Sms-Input
E5180s-22 message reader

Read SMS inbox and print messages to stdout a json

```json
[
    {
        "smstat": "0",
        "index": "40002",
        "phone": "+420739778202",
        "content": "Second SMS text",
        "date": "2024-01-13 15:07:18",
        "sca": [],
        "saveType": "4",
        "priority": "0",
        "smsType": "1"
    },
    {
        "smstat": "1",
        "index": "40001",
        "phone": "+420739778202",
        "content": "First SMS Text",
        "date": "2024-01-13 13:01:20",
        "sca": [],
        "saveType": "4",
        "priority": "0",
        "smsType": "1"
    }
]
```

Installation
------------

```shell
sudo apt install lsb-release wget apt-transport-https bzip2

wget -qO- https://repo.vitexsoftware.com/keyring.gpg | sudo tee /etc/apt/trusted.gpg.d/vitexsoftware.gpg
echo "deb [signed-by=/etc/apt/trusted.gpg.d/vitexsoftware.gpg]  https://repo.vitexsoftware.com  $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/vitexsoftware.list
sudo apt update

sudo apt install sms-input
```

Configuration
-------------

```env
MODEM_USERNAME=admin
MODEM_PASSWORD=******
MODEM_IP=192.168.8.1
```

Usage
-----

load config variables into environment or run with path to .env file as argument

```shell
sms-input /etc/sms.env
```

Powered by https://github.com/Spoje-NET/php-hspdev-huaweiapi

See also https://github.com/Spoje-NET/smssend
