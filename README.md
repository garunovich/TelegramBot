# Предисловие
Оригинальные данных вынесены в БД, а таблицы regions разделена на две для упрощения работы с данными в коде.
[!]Работа с Телеграм, реализована через веб хук и требует хост с доменом и сертификатом.

# Разворачивание проекта
- собрать контейнер docker-compose up --build
- изменить поля в .env:
- APP_URL - указать домен проекта
- TELEGRAM_TOKEN - указать токен бота

# Описание проекта
## API
Бот имеет два метода api
- /api/webhook - регистрация веб хука для бота
- /api/entrypoint - входная точка для всех запросов от Телеграм

## Структура проекта
/app/Http/Controllers/

- TelegramBotController.php - основной контроллер обрабатывающий входящие запросы. Реализация методов /webhook и /entrypoint
  
- StartController.php - реализация команды /start
  
- HelpController.php - реализация команды /help
  
- WaterbasesController.php - реализация команды /waterbases {city}
  
- VolumesController.php - реализация команды /volumes {waterbase}
 
  
/app/Models/
- Areas.php - модель для таблицы areas
  
- Regions.php - модель для таблицы regions
  
- Waterbases.php - модель для таблицы waterbases
  
- Volumes.php - модель для таблицы volumes
  
/database/db.sqlite - база данных

/routes/TelegramBot.php - мархрутизация запросов от Телеграм
