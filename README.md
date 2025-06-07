# Project_template

Это шаблон для решения проектной работы. Структура этого файла повторяет структуру заданий. Заполняйте его по мере работы над решением.

# Задание 1. Анализ и планирование

<aside>

Чтобы составить документ с описанием текущей архитектуры приложения, можно часть информации взять из описания компании и условия задания. Это нормально.

</aside

### 1. Описание функциональности монолитного приложения

**Управление отоплением:**

- Пользователи могут удаленно включать и выключать отопление в своих домах;
- Система поддерживает синхронное взаимодействие с реле управления отполением по запросу пользователя;
- Устройства в системе регистрирует специалист;
- Система поддерживает только устройства компании.

**Мониторинг температуры:**

- Пользователи могут просматривать текущую температуру в своих домах через веб-интерфейс;
- Система поддерживает получение данных с датчиков температуры запросу;
- Система поддерживает только устройства компании.


### 2. Анализ архитектуры монолитного приложения

Перечислите здесь основные особенности текущего приложения: какой язык программирования используется, какая база данных, как организовано взаимодействие между компонентами и так далее.

- Язык программирования: Go;
- База данных: PostgreSQL;
- Архитектура: Монолит;
- Взаимодействие: Синхронное последовательное. Сервер сам опрашивает датчики;
- Масштабируемость: Ограниченная. Возможно масштабирование только всей системы целиком
- Развёртывание: Требует остановки всего приложения


### 3. Определение доменов и границы контекстов

Опишите здесь домены, которые вы выделили.

- Управление пользователями:
  Регистрация пользователя
  Авторизация пользователя
  
- Управление устройствами:
  Регистрация устройств
  Управление состояниями

- Управление сценариями
  Создание правил автоматизации
  Выполнение пользовательских сценариев

- Телеметрия
  Сбор данных с датчиков;
  Хранение и агрегация метрик


### **4. Проблемы монолитного решения**

Синхронное взаимодействие:
- Длительное ожидание ответа на запрос
- Высокая нагрузка при опросе устройств

Масштабируемость:
- Невозможность масштабирования отдельных компонентов

Развёртывание и разработка:
- Развертывание останавливает всю систему
- Добавление новых функций сложнее из-за высокой связности кода

Дополнительно:
- Подключение возможно только для устройств компании
- Подключение устройств через вызов специалиста


### 5. Визуализация контекста системы — диаграмма С4

Добавьте сюда диаграмму контекста в модели C4.

```markdown
[Уровень контекста](https://www.planttext.com?text=dLJHIkD057qlz1zcyrH1ySL74QNui6-Y7o111nJITacchBur5bIeM1H14TJLByX6WxMcyHVk_D6UEqbZK-CYKZgJtBbpphddNhBiATjLxOPJhVpORMuvxMqf5kiBy_M5pNghgUIUMgfMgXMrgnmfw9eI6ka3YcYeVUmZ2dHVq1CDAA17tS4QunS8BCZ4_vK6o0j4RSMR--dDCDQQTBrMizRsf3ihBBhZB7r2pzX3u34wtgt_d0dj0zOthx7k2Nh0mnjEUlJ2QXAAhPcSg65xAgMwHrAa3utQrnJ1-YGk44hC0hmXe4_r4KX6E3tzG9_WCM41MGOi6HQIAFfCuyO-n3LglsstiTE29Iod99F3j_3t4Gh1GC-w2yK70jiJYzPd2BFV4OVUJ2V2iHvcdvB8eWI56Jn5bkbCAcPpTK_LNEdO-ypwXoqlXUKoIs2DrlFSiu1rpbE8QWgXahllVXW9s7z9rrPjrxXomVt7xG5xcxhANUkOS5TtTCymNs5OOexhVkfGMMhtO-thqib6ij2BRnKoAunN2KOWDfmTHCCilLmGYs09us4jYBX1dczWWacWoIdC0IOkvZsyHLBUlB4lFZJ_rJqScG49fwQyNomr2vQmJBNf4Yo6Inz_gUXgPLasj_41-WS0)
```


# Задание 2. Проектирование микросервисной архитектуры

В этом задании вам нужно предоставить только диаграммы в модели C4. Мы не просим вас отдельно описывать получившиеся микросервисы и то, как вы определили взаимодействия между компонентами To-Be системы. Если вы правильно подготовите диаграммы C4, они и так это покажут.

**Диаграмма контейнеров (Containers)**

```markdown
[Уровень контейнеров](https://www.planttext.com?text=fLTBJnDH5Fu5_GzZLoNHi65f20h6XIw0wfeCxLKQsfbcEWKROzBIu2Cbe8P45YQAnBWjo6ZfO_eNxlr7ddFcTfvt2iKIojpNzttdSSyPbcgsRjdrIZbpfsGKolKYq-ulBymlBsmicuQjbmncBIgMAbNJO8QzcCdO9RlCD7uccjpb5zpX8t6WyJuCHc8FXbTyn1rlCPDPPLRDD7Br6hFkQbd-3MO7ue3_fQDTsW_Zx9GrJRHuJxHeE1GTZV-0Xp6iTFYLnYzXyp0xD-6fw3NROpg5FOvuotkyomSUG3PbNeCfbxu0hW_8X-8TcWMhXmbs5nvTv9SxZi3qo2Rkf4ZCv1iWhhBnqAmRHTrgv7Prgx9bWcjGb-g8zZgZmSUFIswNRMxerIhk_mpxp-_nCJYw1s9S_iSJn1qqSvtf1LlQ6oZhQg9D9xhWuC00c1n2x3fyA9cbu2WtXd03VdTA1HJy71wrl3T4eiScqPt5yT4TOsLaZu2ebw0fCaGC4QtGn0sfH1kDfUIx8hE1JabJAp13jqfcY2WlfsvArO8ima4NGv1YZStAhC9ign7YUJQPKn1X5WoyB28p05TYHe5NDhru53Vnr2T-dE9al8u8l6hMx9SMowyz9PgVPCqeYD0b3I47nFuqfBc42XckG4So0hFoAn2Il7xyGioHWC3JZPZLkNa0DxeFtjzNeIRL164EoTcBnnBoOrPNj6WCnz_18fPOP8_IhzLPdUMszHVREb6Ju_fOWR4ikV1pBZv8UCg51rMziCMq9tY297p4yWMC-tGKkE4RX5o0JxgmCAIwwFWN2alCNEQDNyyUlR9p5Ylh3SJwxXcTLcXIRYUU_4gTv0YTHS9fWmiJwJSRP8GqmDygitIxRb51FGxyfidwDwQ-XDDjqHGTeZq1Ap52pGcrQciRl36fZKwKTOSPHTEQLEGHRX9Dhvy1W4DZb4kUa1n1ZBs03x2Bz6Jx_4sysA1w67-5tRAThBEoxAkXjd02hlDJ6e90TAec8G7yex7o3jtOaVgx2iqf5HrG9we2h52X-WLfiES1pbDsZQaxTIWHPc69Qa_qZEdgKr898UD8GNIzjvCs99HAgOoXwXN2Uq58K8fs2cMaeixci1J3eixoAyKf9ZCMjiHrIxcgKh04I3hzje1n9B-OtAuaHCrLDFfhiYFMrwN894wi1SqOgYGBqKIAc1-gut2kkSeQHLSw51xLcyTCEBu7bKXVq40wzHvYeRw-rn0eSEDzTCPwCOKm9OR_THdWimJr0VwL-WS0)
```

**Диаграмма компонентов (Components)**

Добавьте диаграмму для каждого из выделенных микросервисов.

```markdown
[Уровень компонентов: User Service](https://www.planttext.com?text=fPHFQnD16CRlWNo7CQSMX5nw4f6sgOZYeIPw3jjai0kRtJ2xKOe8RJIAj90gdXKjuZKf2Vbdag_mpZVoUMUJxTHie-0Xcvq_x_FyvfcPtGuZHqMDcfVDt7BzYjUeId6ti9KlR9KBWHyvhY_LlRInMZtmfHzXB9k9tCYJWYxqCStealeqrMU2ncZyeZcUKzFLvC4xubaebIX9zSAjI2vERCgxGSElEkfeuwMZQeT18vItHOw-etXE4trA8q4zrinjYbVPZ119vGQcgd8OQwB6jiYX_I3W9rtG78GT44uOY8RK5uPleizeOD0xeEoZtGRvCBTvpMNl8FQf7h3OH_fyGp5-8_RR3yBekPAb9u-D-m_ZFRroxfdcL9_grZebGBo-bjC_h7OH4CClzYakSkhkic1d_o5FBjulFJLuNwXh0BiqW_cOEe8kTGiqFTtM7sZ8a0ECSuGpVSAOSJwsYTE83Y6sWp-JcmeyJofh2yxr6xCqFWr3_HP1m4c_mtixppl3XmG6GxQAk_yIpH_-bGhEKCG8yLiwHTf10DXxwaCS6yARlrWj44xiqx0IgPBr87IZG1qjaoqcFPRbLsWV8pQMMmOmvI1ra--ATHQMFl6pA3rhwnRvqYTCdm2xbwHau_DMfGYoL2om2Ww-6RFHs592ryYAuIg2LBGaUlg6mi620D7cqUmQjVIyRxGnm4lP56RuwDQQMxLwTVxZ2aChMR2DOUdz17uJzbXLtZezfwpBdHRScYyF-pxQsosmOpQpBVqgliw_0G00)
```

```markdown
[Уровень компонентов: Telemetry Service](https://www.planttext.com?text=bLHDQzj04BqR_1-sEjbGo2MdKaeIfvH-718xTwF8sqH4rfhLgiMKGkpWbf10MWZqraDBwTKn4VL7RF-5sN_KcPLiIuuToC6oTbVpthmtJzeAb2rLMFVokIUkxtXXZRFdfSsDqcQr97nbkpwNBrQTrHl2vxx2itnEkShZ37xhKvX03o8Owqi6GrpSmHIlOxFLfiDdx81xlCwLRB8AbnzSXnF2dAkw8qA_PijcuQCjwySY3FXJPi4lH9Z2I5_0WC4j0Lj5zYcVOsnUML0pu6eG0sFXFJ8BDry9QuOvmjyTHBgDhVVrbLNCGEuUfa1hXrJq7QuPAbcgX3uXxeb07KbUsNzdyF_WIJVMZaz4r3Sjn_f2TvXkcJMMVyL3igf7v9ypPZnAKk87jP_C9bLkDznCwVRUQoehlwmSc5v_metfzWOcg6u8NGOztS6kRlMLFaThEWp-uVcKHgnRitQpT0qf71u4hdz4PimNnayfF8_BbFih62ag8ts6ZaHpdzActMTS29Iy8G9N2TdCw2pFjrFKZnyCOpGNuYvpBwDpJGVmWyn2treOsHxUOr1IF13Dj2nGbuQr3lWlWhRN02xdPrr-M_gB4TyrsOrGOJQznHJ6ViX3NZYntv_OfjwyuqEaFsKc1nESutbYvO1mjXksSypPMwemTd_3v_hOPCUKOhjuHTDx9b1zV8amPGWmmBRQkDkFjP0b2MicLt2zqCnW4h-Cz9c9QAeujZFyZuZO4NuGrZ5q2TfgHvSDIlcx4KV-WIa-tC2RtPrIF9OjxjVm6_iV)
```

```markdown
[Уровень компонентов: Scenario Service](https://www.planttext.com?text=dLLTIzn057rVsFymtIU5WYy-bLBKjPIsFgZhkyJiL8FPP9aaBL8ATSL2gQ0jGjyALafVuzR5NMtYNvZvHprpayt76bih2zd99FUSSy-zSpFd-ORmWuvThpsm7DCEsfmzRixED6VNcwxZ6vR3nPEgPvskwt37nxDwpRTycpDvgjxBMFRbG4RgWCbBtFoMrxX6jDNJ3n-nbiaTGrWkQt7nsZAv1iYerXVSm6aROcVgZI4wMsxWyOUi8Ry3u5fUgKzonEIvncrCixVr6cDPv9INugvx2IxY9gaQs7lcwgiybTTG6qBjbHOdXtB0rAxwG3SX7WtL8TGF6zCbbiMDdAUzeO4-o-E9GApwccFPzVnDmLihIyJuW_YYZ8sSkL87ye9C2-7FGD-hNJWtLFjLg13phkJNVsIT6gQJIMkN1njTgnWul_nS1wq-RQsHz6_oZCIVoHWgBsN8P5_jG_QvEbGVIIoo2CdI6FhZH6gPp1JSy2tN0M0pNPAlmhLjBWgbEK7y1QeS9aRDuFOCo_WljHgRKsQqZS0njm2vH8jgjYzeAgf4eJHt0VU5jRd91I3MabKr_4thL8z0V-4tI0xCJV2iC89tNS_oNR5JhCzgjbjWckolgYGOqzsZkLQvFL7-GdtkKm9rE4v3G-TWrQd8hxfT4BKB-z7yiA9NOi7fmnPBDKHuwtR2d3OhoYsiFn7MIzZk1bq2pVefKQ_sz56z4Ke7UxBAePvOjpb_Pro2ZDGUf0_7uu8I6ELMbEV3FUVLT05Y9U01dzesNcqR54yzUwcpOdJKKJJCWAGfHXfdlckOMvozr17KcKTuJ-lUfz28IepvrwUPCSIKnI01m0YoUjY582r0-vIovcTD7XUAHZOZK7zao6IOleV_WMOrNSSBEZYBATJOv2oH4yIH1vG6SSVekeYyrZMW4iQPh52ZTeNR3imSjRBF9XmlDDrCCYRBVV-FJWJ4YyM5fcQir-QuqyR7-Wy0)
```

```markdown
[Уровень компонентов: Device Service](https://www.planttext.com?text=hLPTQnD157qFv3-CUMf1w4kVHAGsAQBqeJRYQzWcGrtOx8RTJJM8qAHKaHQ38kY3MBM8hsdDOjeqwL-uyu-yTsO_qzaIYo_P-M3EkNFkkNUoulc6wxURLh5moxJhLhl1sTtoyb9vkLPsRDymRUxUq-qrMuxDRH_tYWNVz2tEu5ZimXHE8O29E6HmZfCBkCJVYLpgqUOTLk4xPfspAdVfIyTZejggqxORXjjPU6wupMTEs-EtMGb-uF5B68i3E6Cm9DJI8djPB30MdrneIDIQfr3nL9QcX2iF7Fg5OxZ4E0SOvvZ2WX44JEo9hkZ9yCzeX9i3Z7rKMiomLBOYdiOMGRs7ZvgZnBBXUFwsowkFroNdJyauYVdm5ZITY0EnhqD0sbSPPUQyNoWBXHpc9pfejCpaqFsDXtHWSwtwH8Rt5KvaW2SmHVfp630u5ViOpr3qnLiOOP3m1_T9kAdeKXwLCcaYbs-RdkyQlkdO19wQIWLTnxAucqh4DvJZDuAhom_4QnptSzJ8Kbc8Z0Zh-D53VqU_Z6IWvnf09aqv5eTuAVBh01S3dFUlCjMTPjEm6uXPLYCzdqP0vNxAyl0gx0wt6uuR9kMfdEY1FykwGPtI2dLp_SfKzL6Hg5gyIXtwmUKjnpDzn-qajjYCrr8H744WTb5AcQUmZYVa0kG_p1WvubA_czpAU6_67dDd7mOHBY5cKJ8omb7KVl1BAL16HLa2YJJ2qLIDyX5rwi0dihuCzK0A7OXUwk8vxUDwDK87exfan3tn9cb5tT2xyWgvnK202aGRyY-4wCqNwlM19WMWP50TW24UUdo41NGX8qz5hpIUYZuj9JL5m35ODd7_4LWh1bOdMPOwFXwUEtlP3doZteyerOxdysPjxGLrICleHDuVI-RPjoYd1EHRH2U_o0fKbvYLv9ghf89GqXFMXwHLbABw2UIyAxsJ8nTES9roDDEQiFteMvDyi8i5IbGwyKaaIHLe71lnKSyUObMCnRkeN6XPr-35NloyQNZZDDn4p1bSZTyoBadLuP9wGl-vZo3CeyfgcHYBXHMy1_vP-mi0)
```

**Диаграмма кода (Code)**

Добавьте одну диаграмму или несколько.

# Задание 3. Разработка ER-диаграммы

Добавьте сюда ER-диаграмму. Она должна отражать ключевые сущности системы, их атрибуты и тип связей между ними.

# Задание 4. Создание и документирование API

### 1. Тип API

Укажите, какой тип API вы будете использовать для взаимодействия микросервисов. Объясните своё решение.

### 2. Документация API

Здесь приложите ссылки на документацию API для микросервисов, которые вы спроектировали в первой части проектной работы. Для документирования используйте Swagger/OpenAPI или AsyncAPI.

# Задание 5. Работа с docker и docker-compose

Перейдите в apps.

Там находится приложение-монолит для работы с датчиками температуры. В README.md описано как запустить решение.

Вам нужно:

1) сделать простое приложение temperature-api на любом удобном для вас языке программирования, которое при запросе /temperature?location= будет отдавать рандомное значение температуры.

Locations - название комнаты, sensorId - идентификатор названия комнаты

```
	// If no location is provided, use a default based on sensor ID
	if location == "" {
		switch sensorID {
		case "1":
			location = "Living Room"
		case "2":
			location = "Bedroom"
		case "3":
			location = "Kitchen"
		default:
			location = "Unknown"
		}
	}

	// If no sensor ID is provided, generate one based on location
	if sensorID == "" {
		switch location {
		case "Living Room":
			sensorID = "1"
		case "Bedroom":
			sensorID = "2"
		case "Kitchen":
			sensorID = "3"
		default:
			sensorID = "0"
		}
	}
```

2) Приложение следует упаковать в Docker и добавить в docker-compose. Порт по умолчанию должен быть 8081

3) Кроме того для smart_home приложения требуется база данных - добавьте в docker-compose файл настройки для запуска postgres с указанием скрипта инициализации ./smart_home/init.sql

Для проверки можно использовать Postman коллекцию smarthome-api.postman_collection.json и вызвать:

- Create Sensor
- Get All Sensors

Должно при каждом вызове отображаться разное значение температуры

Ревьюер будет проверять точно так же.


