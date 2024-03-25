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

Powered by https://github.com/Spoje-NET/php-hspdev-huaweiapi

See also https://github.com/Spoje-NET/smssend
