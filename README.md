# CRUD php system

Простая система стандартного CRUD взаимодействия на php.

![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.4-4479A1?logo=mysql&logoColor=white)
![Docker](https://img.shields.io/badge/Docker-2496ED?logo=docker&logoColor=white)

---
## 📖 О проекте

Это веб приложение демонстрирует связку технологий php, mysql и docker. Оно позволяет выполнять основные операции с данными на примере списка пользователей. После запуска приложение инициализирует mysql базу данных в отдельном контейнере, где надёжно хранятся данные пользователей. Взаимодействие с БД осуществляется через ORM систему PDO. Также присутствует валидация данных.

---
## 🛠 Стек технологий

- **Backend:** PHP 8.2
- **База данных:** MySQL 8.4
- **Веб-сервер:** Apache
- **Контейнеризация:** Docker, Docker Compose
---
## ✨ Функциональность

- Создание записи (Create)
- Просмотр списка записей (Read)
- Редактирование записи (Update)
- Удаление записи (Delete)
---
## ⚙️ Требования

Для запуска необходимы:

- [Docker](https://www.docker.com/)
- [Git](https://git-scm.com/)
- Свободные порты: 8080, 3306
---

## 🚀 Установка и запуск

### 1. Клонирование репозитория

```bash
git clone https://github.com/Kotik2280/Simple-php-CRUD
cd Simple-php-CRUD
```


### 2. Сборка и запуск контейнеров
```bash
docker compose up -d --build
```
### 3. Открытие приложения
Приложение доступно по адресу: http://localhost:8080

## Остановка
```bash
docker compose down
```
