1. Распаковать проект в корневую папку домена
2. Выполнить composer install
3. Настроить доступы к базе данных и т.д в файле .env предварительно перейменовав .env.example в .env
4. Сгенерировать ключ приложения командой php artisan key:generate
5. Выполнить миграции базы данных с помощю команды php artisan migrate
6. Добавить тестовых клиентов с одним менеджером командой php artisan db:seed --class=UsersSeeder
7. Добавить тестовые заявки в БД php artisan db:seed --class=FeedbackSeeder
7. Выполнить команду npm run dev
Логин менеджера: manager@example.com
Пароль менеджера: password