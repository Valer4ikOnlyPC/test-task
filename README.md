## Развертывание

Конфиг докер окружения
```shell
cp .env.default .env
```
```shell
cp test-task/.env.default test-task/.env
```

Конфиг nginx
```shell
cp docker/etc/web/conf.d/default.conf.dist docker/etc/web/conf.d/default.conf
```

Устанавливаем зависимости composer
```shell
make install
```

Миграции
```shell
make migrate
```
<br>

## Через терминал
### Загрузка desadv из файла

Файлы берутся из папки `files`. Поэтому нужно предварительно их в неё перенести

```shell
make create-desadv-from-xml ARGS="<файл>"
```

### Генерация набора цифр

```shell
make generate-number
```

## Методы API
### Получение desadv <br><br>```GET http://localhost/api/desadv/get```

id можно не указывать, тогда в response будут все записи из desadv <br>
<b>Request<b>
```
desadv_id: string
```
Response ```200 OK```
```
{
    "desadvs": [
        {
            "id": int,
            "date": date-time,
            "sender": string,
            "recipient": string,
            "body": {
                "DESADV": {
                    "NUMBER": int,
                    "DATE": date,
                    "DELIVERYDATE": date,
                    "DELIVERYTIME": time,
                    "ORDERNUMBER": string,
                    "ORDERDATE": date,
                    "HEAD": {
                        "SENDER": string,
                        "RECIPIENT": string,
                        "PACKINGSEQUENCE": {
                            "HIERARCHICALID": int,
                            "POSITIONS": [
                                {
                                    "POSITIONNUMBER": int,
                                    "PRODUCT": string,
                                    "PRODUCTIDSUPPLIER": string,
                                    "PRODUCTIDBUYER": string,
                                    "DELIVEREDQUANTITY": float,
                                    "DELIVEREDUNIT": string,
                                    "ORDEREDQUANTITY": float,
                                    "QUANTITYOFCUINTU": float,
                                    "ORDERUNIT": string,
                                    "PRICE": float,
                                    "TAXRATE": float,
                                    "DESCRIPTION": string,
                                    "PRICEWITHVAT": float
                                }
                            ]
                        }
                    }
                }
            }
        }
    ]
}
```

### Загрузка desadv из файла
```POST http://localhost/api/desadv/create-from-base64```

Файл принимается в `base64` формате. Онлай можно конвертировать <a href="https://base64.guru/converter/encode/file">здесь</a>
(формат: `Data URI`.<br>Т.е. `"data:@file/xml;base64,<данные>"`).


Request
```
{
    "fileBase64": string
}
```
Response ```200 OK```
```
{
}
```

### Генерация набора цифр 
```GET http://localhost/api/number/generate```

Response ```200 OK```
```
{
    "generated_number": string
}
```